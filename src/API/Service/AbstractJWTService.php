<?php

namespace QuickCommerce\API\Service;

use Firebase\JWT\JWT;
use QuickCommerce\Model\PosSetting;

/**
 * The abstract installation services

 *
 */
abstract class AbstractJWTService extends AbstractAPIService {
	/**
	 * {@inheritDoc}
	 * @see \QuickCommerce\API\Service\AbstractAPIService::create()
	 */
	public function create($data) {
		// login with username and password, and return a JWT token
		$secretKey = $this->retrieve(0, null);
		
		// create a JWT token
		$tokenId    = base64_encode(mcrypt_create_iv(32));
		$issuedAt   = time();
		$notBefore  = $issuedAt;
		$expire     = $notBefore + 43200;		// 12 hours
		
		$storeName = (isset($data['storeName']) ? $data['storeName'] : 'pos_store');
		$userId = (isset($data['userId']) ? $data['userId'] : 0);
		$userGroupId = (isset($data['userGroupId']) ? $data['userGroupId'] : 0);
		$userName = (isset($data['userName']) ? $data['userName'] : '');
		
		$data = [
				'iat'  => $issuedAt,         // Issued at: time when the token was generated
				'jti'  => $tokenId,          // Json Token Id: an unique identifier for the token
				'iss'  => $storeName,        // Issuer
				'nbf'  => $notBefore,        // Not before
				'exp'  => $expire,           // Expire
				'data' => [                  // Data related to the signer user
						'userId' => $userId,     // userId
						'userName' => $userName, // userName
						'userGroupId' => $userGroupId // userGroupId
				]
		];
		
		$jwt = JWT::encode($data, $secretKey['secretKey'], 'HS512');
		
		return array(
				'token' => $jwt,
				'user' => array(
						'userId' => $userId,     // userId
						'userName' => $userName, // userName
						'userGroupId' => $userGroupId
						)
		);
	}
	
	public function retrieve($id, $filters) {
		$em = $this->adapter->getEntityManager();
		
		$sql = "SELECT model.value FROM " . PosSetting::class . " model WHERE model.key = 'POS_JWT_Key'";
		$query = $em->createQuery($sql);
		$result = $query->getArrayResult();
		
		$secretKey = '';
		
		if (!empty($result)) {
			$secretKey = $result[0]['value'];
		}
		
		if (!$secretKey) {
			// secret key was not generated yet
			$secretKey = base64_encode(openssl_random_pseudo_bytes(64));
			
			$jwtKey = new PosSetting();
			$jwtKey->setCode('POS');
			$jwtKey->setKey('POS_JWT_Key');
			$jwtKey->setSerialized(0);
			$jwtKey->setStoreId(0);
			$jwtKey->setValue($secretKey);
			$em->persist($jwtKey);
			$em->flush();
		}
		
		return array('secretKey' => $secretKey);
	}
}