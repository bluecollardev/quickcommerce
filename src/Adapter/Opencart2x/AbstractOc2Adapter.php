<?php

namespace QuickCommerce\Adapter;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;
use QuickCommerce\Adapter\IAdapter;
use QuickCommerce\API\Exception\APIException;
use QuickCommerce\API\Application;
use QuickCommerce\Model\Core\AppUser\PosUser;
use Doctrine\Common\Proxy\AbstractProxyFactory;

use Doctrine\ORM\Configuration;
use Doctrine\ORM\Mapping\NamingStrategy;
use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\ORM\Tools;
use Doctrine\ORM\Tools\EntityGenerator;
use Doctrine\ORM\Tools\DisconnectedClassMetadataFactory;
use Doctrine\Common\Util\Inflector;
use Doctrine\Common\Util\Debug;

class AbstractOc2Adapter implements IAdapter {
	/**
	 * @var Application
	 */
	protected $app = null;

	public function __construct(Application $app) {
		$this->app = $app;
	}

	/**
	 * @param $class
	 * @return bool
	 */
	/*public static function autoload($class) {
		$file = DIR_SYSTEM . 'library/quickcommerce/vendor/' . str_replace('\\', '/', $class) . '.php';
		//var_dump($file);

		if (is_file($file)) {
			//var_dump(true);
			include_once($file);
			return true;
		}

		return false;
	}*/

	public function getAdapterId() {
		return 'Opencart 2.x';
	}

	public function getAdapterType() {
		return 'Opencart';
	}

	public function getAdapterServiceClassPrefix() {
		return 'QuickCommerce\Adapter\OC2\Service\Oc2';
	}

	public function getEntityManager() {
		return $this->app->getEntityManager();
	}

	public function getService($model) {
		return $this->app->getService($model);
	}

	public function getUrls() {
		return $this->app->getApiUrls();
	}

	public function formatOcTableName($posTableName) {
		$ocTableName = substr($posTableName, 3);
		$ocTableName = DB_PREFIX . strtolower(preg_replace('/\B([A-Z])/', '_$1', $ocTableName));
		return $ocTableName;
	}

	public function searchConfig($dir) {
		// search the config from the given directory
		// for opencart just search where the config.php and index.php from the first level of sub directory
		$cdir = scandir($dir);
		$config = array();
		$hasConfig = false;
		$hasIndex = true;

		foreach ($cdir as $value) {
			/*if ($subvalue == 'index.php') {
				$hasIndex = true;
				include_once $filename . DIRECTORY_SEPARATOR . $subvalue;
				$config['ver'] = VERSION;
			}*/

			if ($value == 'config.php') {
				$hasConfig = true;
				include_once ($dir . DIRECTORY_SEPARATOR . $value);

				$config['DIR_QC'] = DIR_QC;
				$config['DB_DRIVER'] = DB_DRIVER;
				$config['DB_HOSTNAME'] = DB_HOSTNAME;
				$config['DB_USERNAME'] = DB_USERNAME;
				$config['DB_DATABASE'] = DB_DATABASE;
				$config['DB_PORT'] = DB_PORT;
				$config['DB_PREFIX'] = DB_PREFIX;
				$config['HTTP_SERVER'] = HTTP_SERVER;

				break;
			}
		}

		if ($hasIndex && $hasConfig) {
			return $config;
		}

		return null;
	}

	/**
	 * {@inheritDoc}
	 * @see \QuickCommerce\Adapter\IAdapter::beforeQuery()
	 */
	public function beforeQuery() {
		$oc2Entity = new Oc2Entity();

		$em = $this->getEntityManager();

		$evm = $em->getEventManager();

		$evm->addEventListener(\Doctrine\ORM\Events::loadClassMetadata, $oc2Entity);

		return $oc2Entity;
	}

	/**
	 * {@inheritDoc}
	 * @see \QuickCommerce\Adapter\IAdapter::afterQuery()
	 */
	public function afterQuery($oc2Entity) {
		$this->getEntityManager()->getEventManager()->removeEventListener(\Doctrine\ORM\Events::loadClassMetadata, $oc2Entity);
	}

	/**
	 * {@inheritDoc}
	 * @see \QuickCommerce\Adapter\IAdapter::getTotalsDriver()
	 */
	public function getOrderDriver() {
		$ocId = $this->getOcVersion();
		$registry = $this->loadOcContext($ocId);

		$driverClassname = 'QuickCommerce\\Adapter\\' . $ocId . '\\' . $ocId . 'OrderDriver';
		if (class_exists($driverClassname)) {
			$class = new \ReflectionClass($driverClassname);
			$instance = $class->newInstanceArgs(array($registry));

			return $instance;
		}

		throw APIException::orderDriverNotFound($driverClassname);
	}

	protected function getOcVersion() {
		$dir = __DIR__;
		$indexContent = file_get_contents(realpath($dir . '/../../../../../upload') . '/index.php');

		$search = "define('VERSION'";
		$pos = strpos($indexContent, $search) + strlen($search);
		$version = '';
		while ($pos < strlen($indexContent)) {
			if ($indexContent{$pos} == "'") {
				if ($version) {
					// the second quote we found, exit
					break;
				} else {
					$pos ++;
					$version .= $indexContent{$pos};
				}
			} elseif ($version) {
				$version .= $indexContent{$pos};
			}

			$pos ++;
		}

		if (version_compare($version, '2.3', '>=')) {
			$ocId = 'Oc23';
		} elseif (version_compare($version, '2.2', '>=')) {
			$ocId = 'Oc22';
		} else {
			$ocId = 'Oc21';
		}

		return $ocId;
	}

	protected function loadOcContext($ocId) {
		if ($ocId == 'Oc21' || $ocId == 'Oc22' || $ocId == 'Oc23') {
			require_once(DIR_SYSTEM . 'startup.php');
		}
		require_once(DIR_SYSTEM . 'library/db.php');

		// Registry
		$registry = new \Registry();

		// Loader
		$loader = new \Loader($registry);
		$registry->set('load', $loader);

		// Config
		$config = new \Config();
		if ($ocId == 'Oc22' || $ocId == 'Oc23') {
			$config->load('default');
			$config->load('catalog');
		}
		$registry->set('config', $config);

		// Database
		$registry->set('db', new \DB(DB_DRIVER, DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE));

		// Session
		if ($config->get('session_autostart')) {
			$session = new \Session();
			$session->start();
			$registry->set('session', $session);
		}

		$request = new \Request();
		$registry->set('request', $request);

		// Language
		$language = new \Language($config->get('language_default'));
		$language->load($config->get('language_default'));
		$registry->set('language', $language);

		// Event
		$event = new \Event($registry);
		$registry->set('event', $event);

		// Library Autoload
		if ($config->has('library_autoload')) {
			foreach ($config->get('library_autoload') as $value) {
				$loader->library($value);
			}
		}

		// Model Autoload
		if ($config->has('model_autoload')) {
			foreach ($config->get('model_autoload') as $value) {
				$loader->model($value);
			}
		}

		// Cart
		$classname = 'QuickCommerce\\Adapter\\Oc2Cart';
		$class = new \ReflectionClass($classname);
		$instance = $class->newInstanceArgs(array($registry));
		$registry->set('cart', $instance);

		// Tax
		$classname = 'QuickCommerce\\Adapter\\Oc2Tax';
		$class = new \ReflectionClass($classname);
		$instance = $class->newInstanceArgs(array($registry));
		$registry->set('tax', $instance);

		// Customer
		if ($ocId == 'Oc22' || $ocId == 'Oc23') {
			$customer = new \Cart\Customer($registry);
		} else {
			$customer = new \Customer($registry);
		}
		$registry->set('customer', $customer);

		// Currency
		if ($ocId == 'Oc22' || $ocId == 'Oc23') {
			$currency = new \Cart\Currency($registry);
		} else {
			$currency = new \Currency($registry);
		}
		$registry->set('currency', $currency);

		return $registry;
	}

	/**
	 * {@inheritDoc}
	 * @see \QuickCommerce\Adapter\IAdapter::getLogger()
	 */
	public function getLogger() {
		return $this->app->getLogger();
	}
}