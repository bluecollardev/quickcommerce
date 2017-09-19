<?php

namespace QuickCommerce\API;

use QuickCommerce\Adapter\AbstractOc2Adapter;
use Slim\App;

use QuickCommerce\Adapter\IAdapter;
use QuickCommerce\API\Exception\APIException;
use QuickCommerce\API\Service\AbstractAPIService;
use QuickCommerce\Util\PosUtil;
use Doctrine\ORM\EntityManager;
use Monolog\Logger;


use Doctrine\ORM\Tools\Setup;
use Doctrine\Common\Proxy\AbstractProxyFactory;


class Application extends App {
	const ANNOTATION_DRIVER = 'annotation';
	const METADATA_DRIVER = 'metadata';
	/**
	 * @var IAdapter
	 */
	private $activeAdapter = null;

	private $driverType = null;

	/**
	 * @var EntityManager
	 */
	private $entityManager = null;
	
	/**
	 * @var array
	 */
	private $apiUrls;
	
	/**
	 * @var Logger
	 */
	private $log;
	
	public function __construct($apiUrls, Logger $logger) {
		parent::__construct();
		
		$this->apiUrls = $apiUrls;

		$this->log = $logger;
		
		$this->findActiveAdapter();
		
		if ($this->activeAdapter == null) {
			throw APIException::noAdapterFound();
		}
	}

	public function getDriverType() {
		return $this->driverType;
	}

	public function setDriverType($driverType) {
		if (in_array($driverType, array(
			self::ANNOTATION_DRIVER,
			self::METADATA_DRIVER))) {
			$this->driverType = $driverType;

			$this->initialize();

		} else {
			throw APIException::invalidDriverType($driverType);
		}
	}

	/**
	 * @param $class
	 * @return bool
	 */
	public static function autoloadEntities($class) {
		$file = DIR_QC . 'vendor/quickcommerce/src/Entity/' . str_replace('\\', '/', $class) . '.php';
		if (is_file($file)) {
			//var_dump(true);
			include_once($file);
			return true;
		}

		return false;
	}

	private function initialize() {
		$dir = __DIR__;
		$path = realpath($dir . '/../../../../upload/');
		$this->activeAdapter->searchConfig($path);

		if ($this->driverType == self::METADATA_DRIVER) {
			$this->setEntityManager($this->initializeMetadataDriver());
		} elseif ($this->driverType == self::ANNOTATION_DRIVER) {
			$this->setEntityManager($this->initializeAnnotationDriver());
		} else {
			throw APIException::invalidDriverType($this->driverType);
		}
	}

	private function getDbParams() {
		return array(
			'driver'   => DB_DRIVER,
			'user'     => DB_USERNAME,
			'password' => DB_PASSWORD,
			'dbname'   => DB_DATABASE,
			'host'     => DB_HOSTNAME,
			'charset'	 => 'utf8',
			'port'     => DB_PORT
		);
	}

	private function initializeMetadataDriver() {
		$isDevMode = false;

		//spl_autoload_register('self::autoload');
		spl_autoload_register('self::autoloadEntities');
		//spl_autoload_extensions('.php');

		$paths = array(DIR_QC . 'vendor/quickcommerce/doctrine/orm/mappings/');
		$isDevMode = false;

		$config = Setup::createXMLMetadataConfiguration($paths, $isDevMode);
		$config->setAutoGenerateProxyClasses(true);

		//$namingStrategy = new OpenCartNamingStrategy();
		//$namingStrategy->setPrefix('oc2_');
		//$config->setNamingStrategy($namingStrategy);

		$entityManager = EntityManager::create($this->getDbParams(), $config);

		if ($entityManager == null) {
			throw APIException::noEntityManagerCreated();
		}

		$entityManager->getConnection()->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');

		return $entityManager;
	}

	private function initializeAnnotationDriver() {
		$paths = array(
			realpath(DIR_QC . '/vendor/quickcommerce/src/Model/'),
			realpath(DIR_QC . '/vendor/quickcommerce/src/Adapter/Opencart2x/Entity'));

		$isDevMode = false;

		$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode, null, null, false);
		$config->setAutoGenerateProxyClasses(AbstractProxyFactory::AUTOGENERATE_NEVER);
		$entityManager = EntityManager::create($this->getDbParams(), $config);

		if ($entityManager == null) {
			throw APIException::noEntityManagerCreated();
		}

		// support enum type
		$entityManager->getConnection()->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');

		//spl_autoload_register('self::autoload');
		spl_autoload_register('self::autoloadEntities');
		//spl_autoload_extensions('.php');

		return $entityManager;

	}

	/**
	 * @return array
	 */
	public function getApiUrls() {
		return $this->apiUrls;
	}
	
	public function retrieve($model, $filters, $id = null, $attribute = null) {
		$entity = $this->activeAdapter->beforeQuery();

		// retrieve a single model, either with an id and/or with FIELD filters
		// if no id is provided, then assume the model does not have an id
		// in case serach a list of models - by MODEL fileters, the /POST/searchList model should be used
		$service = $attribute == null ? $this->getService($model) : $this->getService($attribute);
		$result = $service->retrieve($id, $filters);
		
		$this->activeAdapter->afterQuery($entity);
		
		return PosUtil::entityToArray($result);
	}
	
	public function create($model, $data) {
		$entity = $this->activeAdapter->beforeQuery();
		
		// create the model with the given data
		$service = $this->getService($model);
		$result = $service->create($data);

		$this->activeAdapter->afterQuery($entity);
		
		return PosUtil::entityToArray($result);
	}

	public function update($model, $data, $id) {
		$entity = $this->activeAdapter->beforeQuery();
		
		// update the model with the given data
		$service = $this->getService($model);
		$result = $service->update($data, $id);

		$this->activeAdapter->afterQuery($entity);
		
		return PosUtil::entityToArray($result);
	}

	public function partialUpdate($model, $data, $id, $attribute = null) {
		$entity = $this->activeAdapter->beforeQuery();
		
		// update the model with the given data
		$service = $this->getService($model);
		$result = $service->patch($data, $id, $attribute);

		$this->activeAdapter->afterQuery($entity);
		
		return PosUtil::entityToArray($result);
	}
	
	public function remove($model, $data, $id) {
		$entity = $this->activeAdapter->beforeQuery();
		// delete the model with the given data
		$service = $this->getService($model);
		$result = $service->delete($data, $id);

		$this->activeAdapter->afterQuery($entity);
		
		return PosUtil::entityToArray($result);
	}
	
	/**
	 * Find the service class for the
	 * @param string $model
	 * 
	 * @return AbstractAPIService
	 * 
	 */
	public function getService($model) {
		$classname = $this->activeAdapter->getAdapterServiceClassPrefix() . ucfirst($model) . 'Service';
		$this->log->debug("checking $classname");
		if (class_exists($classname)) {
			$this->log->debug('class found');
			$class = new \ReflectionClass($classname);
			$instance = $class->newInstanceWithoutConstructor();
			$instance->setAdapter($this->activeAdapter);
			
			return $instance;
		}
		
		throw APIException::serviceNotImplemented($classname);
	}
	
	private function findActiveAdapter() {
		$adapterDir = realpath(__DIR__ . '/../Adapter');

		$cdir = scandir($adapterDir);
		foreach ($cdir as $value) {
			$filename = $adapterDir . DIRECTORY_SEPARATOR . $value;
			if (!in_array($value,array(".", "..")) && is_dir($filename)) {
				$subdir = scandir($filename);
				foreach ($subdir as $subvalue) {
					if (strlen($subvalue) > 4 && strstr($subvalue, '__') !== 0 && substr($subvalue, -4) == '.php') {
						$classname = 'QuickCommerce\\Adapter\\' . substr($subvalue, 0, -4);
						//$this->log->debug('checking class ' . $classname);
						//echo "<pre>" . 'checking class ' . $classname . "</pre>";
						//if (class_exists($classname)) {
                            //$this->log->debug('found!');
							if (in_array(IAdapter::class, class_implements($classname))) {
								$class = new \ReflectionClass($classname);
								$instance = $class->newInstanceArgs(array($this));
								$this->activeAdapter = $instance;
								break 2;
							}
						//}
					}
				}
			}
		}
	}
	
	/**
	 * @return \Doctrine\ORM\EntityManager
	 */
	public function getEntityManager() {
		return $this->entityManager;
	}
	
	public function setEntityManager($entityManager) {
		$this->entityManager = $entityManager;
		return $this;
	}
	
	/**
	 * @return \Monolog\Logger
	 */
	public function getLogger() {
		return $this->log;
	}
}
