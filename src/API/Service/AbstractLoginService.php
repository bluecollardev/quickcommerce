<?php

namespace QuickCommerce\API\Service;

use Firebase\JWT\JWT;
use QuickCommerce\Model\Core\Setting\PosSetting;
use QuickCommerce\Model\Core\AppUser\PosUser;

/**
 * The abstract installation services

 *
 */
abstract class AbstractLoginService extends AbstractAPIService {
	/**
	 * {@inheritDoc}
	 * @see \QuickCommerce\API\Service\AbstractAPIService::create()
	 */
	public function create($data) {
		// login with username and password, and return a JWT token
		if (isset($data['username']) && isset($data['password'])) {
			$em = $this->adapter->getEntityManager();
			
			$sql = "SELECT model.value FROM " . PosSetting::class . " model WHERE model.key = 'config_name'";
			$query = $em->createQuery($sql);
			$result = $query->getArrayResult();
			
			$storeName = '';
			if (!empty($result)) {
				$storeName = $result[0]['value'];
			}
			
			/** @var $user PosUser */
			$user = $this->adapter->login($data['username'], $data['password']);
			
			if ($user) {
				$data = array(
						'storeName' => $storeName,
						'userId' => $user->getUserId(),
						'userName' => $user->getUsername(),
						'userGroupId' => $user->getUserGroupId()
				);
				
				return $this->adapter->getService('JWT')->create($data);
			}
		}
		
		return array();
	}
}