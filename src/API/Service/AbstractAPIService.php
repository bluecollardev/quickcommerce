<?php

namespace QuickCommerce\API\Service;

use QuickCommerce\Adapter\IAdapter;
use QuickCommerce\API\Exception\APIException;

/**
 * The API abstract service to be called by POS server application

 *
 */
abstract class AbstractAPIService {
	/**
	 * The adapter to implement the API Service
	 * @var IAdapter
	 */
	protected $adapter;
	
	/**
	 * Set the adapter to the API service
	 * @param IAdapter $adapter
	 */
	public function setAdapter(IAdapter $adapter) {
		$this->adapter = $adapter;
	}

	/**
	 * The retrive operation to retrieve the entity
	 * 
	 * @param array $filters
	 * @param int $id
	 * @param string $attribute (attribute of the current model)
	 * 
	 * @return Array
	 * 
	 */
	public function retrieve($id, $filters) {
		throw APIException::notSupported('GET', '');
	}
	
	/**
	 * create an entity using the given data
	 * 
	 * @param array $data
	 * 
	 * @return int entityId
	 * 
	 */
	public function create($data) {
		throw APIException::notSupported('POST', '');
	}
	
	/**
	 * Override the entity with the given data
	 * 
	 * @param array $data
	 * @param int $id
	 * 
	 * @return boolean
	 * 
	 */
	public function update($data, $id) {
		throw APIException::notSupported('PUT', '');
	}
	
	/**
	 * Partially update the entity in the given data
	 * 
	 * @param array $data
	 * @param int $id
	 * 
	 * @return boolean
	 * 
	 */
	public function patch($data, $id, $attribute) {
		throw APIException::notSupported('PATCH', '');
	}
	
	/**
	 * Delete the entity record
	 * 
	 * @param array $filters
	 * @param int $id
	 * 
	 * 
	 */
	public function delete($filters, $id) {
		throw APIException::notSupported('DELETE', '');
	}
}