<?php

namespace QuickCommerce\Model\View;

use QuickCommerce\Model\PosAbstractEntity;
use QuickCommerce\Model\Core\Product\PosProduct;

class PosProductDetails extends PosAbstractEntity {
	/**
	 * @var PosProduct
	 */
	protected $product;
	
	/**
	 * The product name
	 * @var string
	 */
	protected $name;
	
	/**
	 * The manufacturer name
	 * @var string
	 */
	protected $manufacturer;
	
	/**
	 * @var array
	 */
	protected $options;
	
	public function getProduct() {
		return $this->product;
	}
	public function setProduct(PosProduct $product) {
		$this->product = $product;
		return $this;
	}
	public function getOptions() {
		return $this->options;
	}
	public function setOptions(array $options) {
		$this->options = $options;
		return $this;
	}
	public function getName() {
		return $this->name;
	}
	public function setName($name) {
		$this->name = $name;
		return $this;
	}
	public function getManufacturer() {
		return $this->manufacturer;
	}
	public function setManufacturer($manufacturer) {
		$this->manufacturer = $manufacturer;
		return $this;
	}
}