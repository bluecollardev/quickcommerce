<?php

namespace QuickCommerce\Model\View;

use QuickCommerce\Model\PosAbstractEntity;

class PosOrderProductOptionValue extends PosAbstractEntity {
	/**
	 * @var integer
	 */
	protected $productOptionValueId;
	
	/**
	 * @var integer
	 */
	protected $optionValueId;

	/**
	 * @var float
	 */
	protected $price;

	/**
	 * @var string
	 */
	protected $pricePrefix;
	
	/**
	 * The option value name in the given language
	 * @var string
	 */
	protected $name;
	
	public function getProductOptionValueId() {
		return $this->productOptionValueId;
	}
	public function setProductOptionValueId($productOptionValueId) {
		$this->productOptionValueId = $productOptionValueId;
		return $this;
	}
	public function getPrice() {
		return $this->price;
	}
	public function setPrice($price) {
		$this->price = $price;
		return $this;
	}
	public function getPricePrefix() {
		return $this->pricePrefix;
	}
	public function setPricePrefix($pricePrefix) {
		$this->pricePrefix = $pricePrefix;
		return $this;
	}
	public function getOptionValueId() {
		return $this->optionValueId;
	}
	public function setOptionValueId($optionValueId) {
		$this->optionValueId = $optionValueId;
		return $this;
	}
	public function getName() {
		return $this->name;
	}
	public function setName($name) {
		$this->name = $name;
		return $this;
	}
	
	
}