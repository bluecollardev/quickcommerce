<?php

namespace QuickCommerce\Model\View;

use QuickCommerce\Model\PosAbstractEntity;

class PosOrderCategoryProduct extends PosAbstractEntity {
	/**
	 * The product id
	 * @var integer
	 */
	protected $productId;
	
	/**
	 * The original price
	 * @var decimal
	 */
	protected $price;

	/**
	 * The special price
	 * @var number
	 */
	protected $specialPrice;
	
	/**
	 * The image path on server
	 * @var string
	 */
	protected $image;
	
	/**
	 * The quantity of the product available
	 * @var integer
	 */
	protected $quantity;
	
	/**
	 * The product points
	 * @var integer
	 */
	protected $points;
	
	/**
	 * The product model
	 * @var string
	 */
	protected $model;
	
	/**
	 * The product tax class id
	 * @var integer
	 */
	protected $taxClassId;
	
	/**
	 * Wether the product requires shipping
	 * @var boolean
	 */
	protected $shipping;
	
	/**
	 * If the product has option
	 * @var boolean
	 */
	protected $hasOption;
	
	/**
	 * Indicates if the product requires stock updates
	 * @var boolean
	 */
	protected $updateStock;
	
	/**
	 * The product name in the given language
	 * @var string
	 */
	protected $name;
	
	public function getProductId() {
		return $this->productId;
	}
	public function setProductId($productId) {
		$this->productId = $productId;
		return $this;
	}
	public function getPrice() {
		return $this->price;
	}
	public function setPrice($price) {
		$this->price = $price;
		return $this;
	}
	public function getSpecialPrice() {
		return $this->specialPrice;
	}
	public function setSpecialPrice($specialPrice) {
		$this->specialPrice = $specialPrice;
		return $this;
	}
	public function getImage() {
		return $this->image;
	}
	public function setImage($image) {
		$this->image = $image;
		return $this;
	}
	public function getQuantity() {
		return $this->quantity;
	}
	public function setQuantity($quantity) {
		$this->quantity = $quantity;
		return $this;
	}
	public function getHasOption() {
		return $this->hasOption;
	}
	public function setHasOption($hasOption) {
		$this->hasOption = $hasOption;
		return $this;
	}
	public function getPoints() {
		return $this->points;
	}
	public function setPoints($points) {
		$this->points = $points;
		return $this;
	}
	public function getModel() {
		return $this->model;
	}
	public function setModel($model) {
		$this->model = $model;
		return $this;
	}
	public function getTaxClassId() {
		return $this->taxClassId;
	}
	public function setTaxClassId($taxClassId) {
		$this->taxClassId = $taxClassId;
		return $this;
	}
	public function getShipping() {
		return $this->shipping;
	}
	public function setShipping($shipping) {
		$this->shipping = $shipping;
		return $this;
	}
	public function getUpdateStock() {
		return $this->updateStock;
	}
	public function setUpdateStock($updateStock) {
		$this->updateStock = $updateStock;
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

