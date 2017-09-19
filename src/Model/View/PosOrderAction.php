<?php

namespace QuickCommerce\Model\View;

use QuickCommerce\Model\PosAbstractEntity;
use QuickCommerce\Util\PosUtil;

use QuickCommerce\Model\Core\Checkout\PosOrderOption;
class PosOrderAction extends PosAbstractEntity {
	/**
	 * The action, can be one of the following:
	 * insert - create a new order product
	 * modifyQantity - modify quantity for the existing order product
	 * delete - delete an existing order product
	 * 
	 * @var string
	 */
	protected $action;
	
	/**
	 * The order product Id
	 * if action is insert, the orderProductId will be 0
	 * otherwise, the orderProductId macthes the orderProductId in the database
	 * 
	 * @var integer
	 */
	protected $orderProductId;
	
	/**
	 * In case a new order product is to be created
	 * @var PosOrderProductDetails
	 */
	protected $orderProduct;
	
	/**
	 * The productId will be used to update the stock for modify quantity case
	 * to avoid another lookup productId from the orderProductId
	 * @var integer
	 */
	protected $productId;
	
	/**
	 * In case a new order product with option is to be created
	 * @var array of PosOrderOption
	 */
	protected $orderOptions = array();
	
	/**
	 * Pass in the calculated order tax for getting totals
	 * @var array
	 */
	protected $orderTaxRates = array();
	
	/**
	 * In case an order is to be created, the default setting will be used
	 * @var array
	 */
	protected $defaultSettings = array();
	
	/**
	 * In case the action was a modify quantity
	 * @var integer
	 */
	protected $quantityBefore;

	/**
	 * In case the action was a modify quantity
	 * @var integer
	 */
	protected $quantityAfter;
	
	/**
	 * If this order requires shipping
	 * @var boolean
	 */
	protected $shipping;
	
	public function getAction() {
		return $this->action;
	}
	public function setAction($action) {
		$this->action = $action;
		return $this;
	}
	public function getOrderProductId() {
		return $this->orderProductId;
	}
	public function setOrderProductId($orderProductId) {
		$this->orderProductId = $orderProductId;
		return $this;
	}
	/**
	 * @return \QuickCommerce\Entity\PosOrderProductDetails
	 */
	public function getOrderProduct() {
		return $this->orderProduct;
	}
	public function setOrderProduct($postData) {
		$this->orderProduct = new PosOrderProductDetails();
		PosUtil::array2Entity($this->orderProduct, $postData);
		return $this;
	}
	public function getDefaultSettings() {
		return $this->defaultSettings;
	}
	public function setDefaultSettings(array $defaultSettings) {
		$this->defaultSettings = $defaultSettings;
		return $this;
	}
	public function getOrderOptions() {
		return $this->orderOptions;
	}
	public function setOrderOptions($postData) {
		if (!empty($postData)) {
			$this->orderOptions = array();
			
			foreach ($postData as $data) {
				$orderOption = new PosOrderOption();
				PosUtil::array2Entity($orderOption, $data);
				$this->orderOptions[] = $orderOption;
			}
		}
		return $this;
	}
	public function getQuantityBefore() {
		return $this->quantityBefore;
	}
	public function setQuantityBefore($quantityBefore) {
		$this->quantityBefore = $quantityBefore;
		return $this;
	}
	public function getQuantityAfter() {
		return $this->quantityAfter;
	}
	public function setQuantityAfter($quantityAfter) {
		$this->quantityAfter = $quantityAfter;
		return $this;
	}
	public function getProductId() {
		return $this->productId;
	}
	public function setProductId($productId) {
		$this->productId = $productId;
		return $this;
	}
	public function getOrderTaxRates() {
		return $this->orderTaxRates;
	}
	public function setOrderTaxRates(array $orderTaxRates) {
		$this->orderTaxRates = $orderTaxRates;
		return $this;
	}
	public function getShipping() {
		return $this->shipping;
	}
	public function setShipping($shipping) {
		$this->shipping = $shipping;
		return $this;
	}
	
	
}

