<?php

namespace QuickCommerce\Model\View;

use QuickCommerce\Model\PosAbstractEntity;

class PosOrderCategory extends PosAbstractEntity {
	/**
	 * The category id
	 * @var integer
	 */
	protected $categoryId;
	
	/**
	 * The total number of items including sub categories and products
	 * @var integer
	 */
	protected $totalItems;
	
	/**
	 * The sub categories
	 * @var array of PosOrderCategory
	 */
	protected $subCategories;

	/**
	 * The products belong to this category
	 * @var array of PosOrderCategoryProduct
	 */
	protected $products;
	
	/**
	 * All paths for this category
	 * @var array of pathId in order of level
	 */
	protected $paths;
	
	/**
	 * The image path on the server for the category
	 */
	protected $image;
	
	/**
	 * If this instance of PosOrderCategory is the last page for the category in the database
	 * @var boolean
	 */
	protected $fullyLoaded;
	
	/**
	 * The name of the category, in the given language
	 * @var string
	 */
	protected $name;
	
	public function getCategoryId() {
		return $this->categoryId;
	}
	public function setCategoryId($categoryId) {
		$this->categoryId = $categoryId;
		return $this;
	}
	public function getSubCategories() {
		return $this->subCategories;
	}
	public function setSubCategories(array $subCategories) {
		$this->subCategories = $subCategories;
		return $this;
	}
	public function getProducts() {
		return $this->products;
	}
	public function setProducts(array $products) {
		$this->products = $products;
		return $this;
	}
	public function getPaths() {
		return $this->paths;
	}
	public function setPaths(array $paths) {
		$this->paths = $paths;
		return $this;
	}
	public function getFullyLoaded() {
		return $this->fullyLoaded;
	}
	public function setFullyLoaded($fullyLoaded) {
		$this->fullyLoaded = $fullyLoaded;
		return $this;
	}
	public function getTotalItems() {
		return $this->totalItems;
	}
	public function setTotalItems($totalItems) {
		$this->totalItems = $totalItems;
		return $this;
	}
	public function getImage() {
		return $this->image;
	}
	public function setImage($image) {
		$this->image = $image;
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

