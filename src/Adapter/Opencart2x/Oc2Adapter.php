<?php

namespace QuickCommerce\Adapter;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;
use QuickCommerce\Adapter\IAdapter;
use QuickCommerce\API\Exception\APIException;
use QuickCommerce\API\Application;
use QuickCommerce\Entity\PosUser;
use Doctrine\Common\Proxy\AbstractProxyFactory;

use Doctrine\ORM\Configuration;
use Doctrine\ORM\Mapping\NamingStrategy;
use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\ORM\Tools;
use Doctrine\ORM\Tools\EntityGenerator;
use Doctrine\ORM\Tools\DisconnectedClassMetadataFactory;
use Doctrine\Common\Util\Inflector;
use Doctrine\Common\Util\Debug;

class Oc2Adapter extends AbstractOc2Adapter implements IAdapter {

	
	/**
	 * {@inheritDoc}
	 * @see \QuickCommerce\Adapter\IAdapter::login()
	 */
	public function login($username, $password) {
		$log = $this->app->getLogger();
		
		$ocId = $this->getOcVersion();
		$log->debug('logging for ' . $ocId);
		if ($ocId == 'Oc21' || $ocId == 'Oc22' || $ocId == 'Oc23') {
			require_once(DIR_SYSTEM . 'startup.php');
		}
		require_once(DIR_SYSTEM . 'library/db.php');
		
		// Database
		$db = new \DB(DB_DRIVER, DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
		$sql = "SELECT * FROM " . DB_PREFIX . "user WHERE username = '" . $db->escape($username) . "' AND (password = SHA1(CONCAT(salt, SHA1(CONCAT(salt, SHA1('" . $db->escape($password) . "'))))) OR password = '" . $db->escape(md5($password)) . "') AND status = '1'";
		$log->debug('Running SQL: ' . $sql);
		$query = $db->query($sql);
		if ($query->num_rows) {
			$user = new PosUser();
			
			$user->setUserId($query->row['user_id']);
			$user->setUsername($query->row['username']);
			$user->setUserGroupId($query->row['user_group_id']);
			
			return $user;
		}
		
		return null;
	}
	

}