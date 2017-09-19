<?php

namespace QuickCommerce\API\Service;

use Firebase\JWT\JWT;

/**
 * The abstract user services

 *
 */
abstract class AbstractUserService extends AbstractAPIService {
	/**
	 * The user serivce
	 * {@inheritDoc}
	 * @see \QuickCommerce\API\IAPIService::retrieve()
	 */
	public function retrieve($id, $filters) {
		// return the user from the token, $id is not required for this service
		$user = array();
		$log = $this->adapter->getLogger();
		
		try {
			if (isset($filters['token'])) {
				$secretyKey = $this->adapter->getService('JWT')->retrieve(0, null);
				$data = JWT::decode($filters['token'], $secretyKey['secretKey'], ['HS512']);
				$log->debug(print_r($data, true));
			
				if (!empty($data) && $data->exp > time()) {
					$user = array(
							'userName' => $data->data->userName,
							'userId' => $data->data->userId,
							'userGroupId' => $data->data->userGroupId
					);
				}
			}
		} catch (\Exception $exception) {
			$log->debug($exception->getMessage());
		}

		return $user;
	}
}