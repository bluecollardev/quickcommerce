<?php

namespace QuickCommerce\Model\View;

use QuickCommerce\Model\PosAbstractEntity;
use QuickCommerce\Util\PosUtil;

class PosConfig extends PosAbstractEntity {
	/**
	 * The POS payment types
	 * @var array of PosPaymentType
	 */
	protected $paymentTypes;
	
	/**
	 * The default customer type
	 * Can be 0 - built-in customer
	 * 				1 - custom customer
	 * 				2 - existing customer
	 * @var integer
	 * 
	 */
	protected $defaultCustomerType;

	/**
	 * The default customer
	 * @var PosCustomerDetails
	 */
	protected $defaultCustomer;
	
	/**
	 * The built-in POS customer
	 * @var PosCustomerDetails
	 */
	protected $builtInCustomer;
	
	/**
	 * The rest of key-value pair configuration stored in PosSettings
	 * @var array of key-value pair
	 */
	protected $posSettings;
	
	public function getPaymentTypes() {
		return $this->paymentTypes;
	}
	public function setPaymentTypes(array $paymentTypes) {
		$isModel = false;
		
		if (!empty($paymentTypes) && is_object($paymentTypes[0])) {
			$isModel = true;
		}
		
		if ($isModel) {
			$this->paymentTypes = $paymentTypes;
		} elseif (!empty($paymentTypes)) {
			$array = array();
			foreach ($paymentTypes as $paymentType) {
				$paymentTypeModel = new PosPaymentType();
				PosUtil::array2Entity($paymentTypeModel, $paymentType);
				$array[] = $paymentTypeModel;
			}
			
			$this->paymentTypes = $array;
		}
		return $this;
	}
	public function getDefaultCustomer() {
		return $this->defaultCustomer;
	}
	public function setDefaultCustomer(PosCustomerDetails $defaultCustomer) {
		$this->defaultCustomer = $defaultCustomer;
		return $this;
	}
	public function getPosSettings() {
		return $this->posSettings;
	}
	public function setPosSettings(array $posSettings) {
		$this->posSettings = $posSettings;
		return $this;
	}
	public function getBuiltInCustomer() {
		return $this->builtInCustomer;
	}
	public function setBuiltInCustomer(PosCustomerDetails $builtInCustomer) {
		$this->builtInCustomer = $builtInCustomer;
		return $this;
	}
	public function getDefaultCustomerType() {
		return $this->defaultCustomerType;
	}
	public function setDefaultCustomerType($defaultCustomerType) {
		$this->defaultCustomerType = $defaultCustomerType;
		return $this;
	}
}