<?php

namespace QuickCommerce\Model\View;

use QuickCommerce\Model\PosAbstractEntity;
use QuickCommerce\Util\PosUtil;

class PosCartAction extends PosAbstractEntity {
	/**
	 * The action, can be one of the following:
	 * insert - create a new cart product
	 * modifyQantity - modify quantity for the existing cart product
	 * delete - delete an existing cart product
	 * 
	 * @var string
	 */
	protected $action;
	
	/**
	 * The cart product Id
	 * if action is insert, the cartProductId will be 0
	 * otherwise, the cartProductId macthes the cartProductId in the database
	 * 
	 * @var integer
	 */
	protected $cartProductId;
	
	/**
	 * In case a new cart product is to be created
	 * @var PosCartProductDetails
	 */
	protected $cartProduct;
	
	/**
	 * The productId will be used to update the stock for modify quantity case
	 * to avoid another lookup productId from the cartProductId
	 * @var integer
	 */
	protected $productId;
	
	/**
	 * In case a new cart product with option is to be created
	 * @var array of PosCartOption
	 */
	protected $cartOptions = array();
	
	/**
	 * Pass in the calculated cart tax for getting totals
	 * @var array
	 */
	protected $cartTaxRates = array();
	
	/**
	 * In case an cart is to be created, the default setting will be used
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
	 * If this cart requires shipping
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
	public function getCartProductId() {
		return $this->cartProductId;
	}
	public function setCartProductId($cartProductId) {
		$this->cartProductId = $cartProductId;
		return $this;
	}
	/**
	 * @return \QuickCommerce\Entity\PosCartProductDetails
	 */
	public function getCartProduct() {
		return $this->cartProduct;
	}
	public function setCartProduct($postData) {
		$this->cartProduct = new PosCartProductDetails();
		PosUtil::array2Entity($this->cartProduct, $postData);
		return $this;
	}
	public function getDefaultSettings() {
		return $this->defaultSettings;
	}
	public function setDefaultSettings(array $defaultSettings) {
		$this->defaultSettings = $defaultSettings;
		return $this;
	}
	public function getCartOptions() {
		return $this->cartOptions;
	}
	public function setCartOptions($postData) {
		if (!empty($postData)) {
			$this->cartOptions = array();
			
			foreach ($postData as $data) {
				$cartOption = new PosCartOption();
				PosUtil::array2Entity($cartOption, $data);
				$this->cartOptions[] = $cartOption;
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
	public function getCartTaxRates() {
		return $this->cartTaxRates;
	}
	public function setCartTaxRates(array $cartTaxRates) {
		$this->cartTaxRates = $cartTaxRates;
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

