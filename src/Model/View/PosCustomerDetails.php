<?php

namespace QuickCommerce\Model\View;

use QuickCommerce\Model\PosAbstractEntity;
use QuickCommerce\Model\Core\Customer\PosCustomer;
use QuickCommerce\Util\PosUtil;

class PosCustomerDetails extends PosAbstractEntity {
	/**
	 * The customer information
	 * @var PosCustomer
	 */
	protected $customer;
	
	/**
	 * The customer addresses
	 * @var array of PosAddress
	 */
	protected $addresses;
	
	public function getCustomer() {
		return $this->customer;
	}
	public function setCustomer(PosCustomer $customer) {
		$this->customer = $customer;
		return $this;
	}
	public function getAddresses() {
		return $this->addresses;
	}
	public function setAddresses(array $addresses) {
		$isModel = false;
		
		if (!empty($addresses) && is_object($addresses[0])) {
			$isModel = true;
		}
		
		if ($isModel) {
			$this->addresses = $addresses;
		} elseif (!empty($addresses)) {
			$array = array();
			foreach ($addresses as $address) {
				$addressModel = new PosAddress();
				PosUtil::array2Entity($addressModel, $address);
				$array[] = $addressModel;
			}
			
			$this->addresses = $array;
		}
		return $this;
	}
}