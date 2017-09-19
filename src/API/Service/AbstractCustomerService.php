<?php

namespace QuickCommerce\API\Service;

/**
 * The abstract customer services

 *
 */
abstract class AbstractCustomerService extends AbstractAPIService {
	/**
	 * {@inheritDoc}
	 * @see \QuickCommerce\API\IAPIService::retrieve()
	 */
	public function retrieve($id, $filters) {
		// return customer details, only for pattern "GET /customer/customerId"
		return $this->getCustomerDetails($id);
	}
	
	public abstract function getCustomerDetails($customerId);
	
	/**
	 * {@inheritDoc}
	 * @see \QuickCommerce\API\IAPIService::create()
	 */
	public function create($data) {
		// return customer list, only for pattern "POST /customer" with filters
		$customersSearch = array('model' => 'Core\\Customer\\PosCustomer', 'page' => $data['page']);
		if (isset($data['filters'])) {
			$customersSearch['filters'] = $data['filters'];
		}
		$customers = $this->adapter->getService('searchList')->create($customersSearch);
		
		return $customers;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \QuickCommerce\API\Service\AbstractAPIService::patch()
	 */
	public function patch($data, $id, $attribute) {
		// create a new customer if $id is -1 (as 0 is used by the build in customer)
		// otherwise update the order
		// only for pattern "PATCH /customer/customerId"
		return $this->modifyCustomer($id, $data);
	}
	
	public abstract function modifyCustomer($customerId, $data);
}