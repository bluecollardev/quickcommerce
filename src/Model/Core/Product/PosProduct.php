<?php

namespace QuickCommerce\Model\Core\Product;

use Doctrine\ORM\Mapping as ORM;

use QuickCommerce\Model\PosAbstractEntity;

/**
 * @ORM\Entity
 */
class PosProduct extends PosAbstractEntity {
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", name="product_id")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	protected $productId;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=64, nullable=false, name="model")
	 */
	protected $model;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=64, nullable=false, name="sku")
	 */
	protected $sku;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=12, nullable=false, name="upc")
	 */
	protected $upc;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=14, nullable=false, name="ean")
	 */
	protected $ean;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=13, nullable=false, name="jan")
	 */
	protected $jan;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=17, nullable=false, name="isbn")
	 */
	protected $isbn;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=64, nullable=false, name="mpn")
	 */
	protected $mpn;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=128, nullable=false, name="location")
	 */
	protected $location;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", nullable=false, name="quantity", options={"default":0})
	 */
	protected $quantity = '0';
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", nullable=false, name="stock_status_id")
	 */
	protected $stockStatusId;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=255, nullable=true, name="image")
	 */
	protected $image;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", nullable=false, name="manufacturer_id")
	 */
	protected $manufacturerId;
	
	/**
	 * @var boolean
	 *
	 * @ORM\Column(type="boolean", nullable=false, name="shipping", options={"default":1})
	 */
	protected $shipping = '1';
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="decimal", nullable=false, name="price", precision=15, scale=4, options={"default":"0.0000"})
	 */
	protected $price = '0.0000';
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", nullable=false, name="points", options={"default":0})
	 */
	protected $points = '0';
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", nullable=false, name="tax_class_id")
	 */
	protected $taxClassId;
	
	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(type="date", nullable=false, name="date_available", options={"default":"0000-00-00"})
	 */
	protected $dateAvailable = '0000-00-00';
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="decimal", nullable=false, name="weight", precision=15, scale=8, options={"default":"0.00000000"})
	 */
	protected $weight = '0.00000000';
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", nullable=false, name="weight_class_id", options={"default":0})
	 */
	protected $weightClassId = '0';
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="decimal", nullable=false, name="length", precision=15, scale=8, options={"default":"0.00000000"})
	 */
	protected $length = '0.00000000';
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="decimal", nullable=false, name="width", precision=15, scale=8, options={"default":"0.00000000"})
	 */
	protected $width = '0.00000000';
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="decimal", nullable=false, name="height", precision=15, scale=8, options={"default":"0.00000000"})
	 */
	protected $height = '0.00000000';
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", nullable=false, name="length_class_id", options={"default":0})
	 */
	protected $lengthClassId = '0';
	
	/**
	 * @var boolean
	 *
	 * @ORM\Column(type="boolean", nullable=false, name="subtract", options={"default":1})
	 */
	protected $subtract = '1';
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", nullable=false, name="minimum", options={"default":1})
	 */
	protected $minimum = '1';
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", nullable=false, name="sort_order", options={"default":0})
	 */
	protected $sortOrder = '0';
	
	/**
	 * @var boolean
	 *
	 * @ORM\Column(type="boolean", nullable=false, name="status", options={"default":0})
	 */
	protected $status = '0';
	
	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(type="datetime", nullable=false, name="date_added")
	 */
	protected $dateAdded;
	
	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(type="datetime", nullable=false, name="date_modified")
	 */
	protected $dateModified;
	
	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(type="date", nullable=true, name="best_before", options={"default":"0000-00-00"})
	 */
	//protected $bestBefore = '0000-00-00';
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", nullable=true, name="low_stock", options={"default":3})
	 */
	//protected $lowStock = '3';
	
	public function getProductId() {
		return $this->productId;
	}
	public function setProductId($productId) {
		$this->productId = $productId;
		return $this;
	}
	public function getModel() {
		return $this->model;
	}
	public function setModel($model) {
		$this->model = $model;
		return $this;
	}
	public function getSku() {
		return $this->sku;
	}
	public function setSku($sku) {
		$this->sku = $sku;
		return $this;
	}
	public function getUpc() {
		return $this->upc;
	}
	public function setUpc($upc) {
		$this->upc = $upc;
		return $this;
	}
	public function getEan() {
		return $this->ean;
	}
	public function setEan($ean) {
		$this->ean = $ean;
		return $this;
	}
	public function getJan() {
		return $this->jan;
	}
	public function setJan($jan) {
		$this->jan = $jan;
		return $this;
	}
	public function getIsbn() {
		return $this->isbn;
	}
	public function setIsbn($isbn) {
		$this->isbn = $isbn;
		return $this;
	}
	public function getMpn() {
		return $this->mpn;
	}
	public function setMpn($mpn) {
		$this->mpn = $mpn;
		return $this;
	}
	public function getLocation() {
		return $this->location;
	}
	public function setLocation($location) {
		$this->location = $location;
		return $this;
	}
	public function getQuantity() {
		return $this->quantity;
	}
	public function setQuantity($quantity) {
		$this->quantity = $quantity;
		return $this;
	}
	public function getStockStatusId() {
		return $this->stockStatusId;
	}
	public function setStockStatusId($stockStatusId) {
		$this->stockStatusId = $stockStatusId;
		return $this;
	}
	public function getImage() {
		return $this->image;
	}
	public function setImage($image) {
		$this->image = $image;
		return $this;
	}
	public function getManufacturerId() {
		return $this->manufacturerId;
	}
	public function setManufacturerId($manufacturerId) {
		$this->manufacturerId = $manufacturerId;
		return $this;
	}
	public function getShipping() {
		return $this->shipping;
	}
	public function setShipping($shipping) {
		$this->shipping = $shipping;
		return $this;
	}
	public function getPrice() {
		return $this->price;
	}
	public function setPrice($price) {
		$this->price = $price;
		return $this;
	}
	public function getPoints() {
		return $this->points;
	}
	public function setPoints($points) {
		$this->points = $points;
		return $this;
	}
	public function getTaxClassId() {
		return $this->taxClassId;
	}
	public function setTaxClassId($taxClassId) {
		$this->taxClassId = $taxClassId;
		return $this;
	}
	public function getDateAvailable() {
		return $this->dateAvailable;
	}
	public function setDateAvailable(\DateTime $dateAvailable) {
		$this->dateAvailable = $dateAvailable;
		return $this;
	}
	public function getWeight() {
		return $this->weight;
	}
	public function setWeight($weight) {
		$this->weight = $weight;
		return $this;
	}
	public function getWeightClassId() {
		return $this->weightClassId;
	}
	public function setWeightClassId($weightClassId) {
		$this->weightClassId = $weightClassId;
		return $this;
	}
	public function getLength() {
		return $this->length;
	}
	public function setLength($length) {
		$this->length = $length;
		return $this;
	}
	public function getWidth() {
		return $this->width;
	}
	public function setWidth($width) {
		$this->width = $width;
		return $this;
	}
	public function getHeight() {
		return $this->height;
	}
	public function setHeight($height) {
		$this->height = $height;
		return $this;
	}
	public function getLengthClassId() {
		return $this->lengthClassId;
	}
	public function setLengthClassId($lengthClassId) {
		$this->lengthClassId = $lengthClassId;
		return $this;
	}
	public function getSubtract() {
		return $this->subtract;
	}
	public function setSubtract($subtract) {
		$this->subtract = $subtract;
		return $this;
	}
	public function getMinimum() {
		return $this->minimum;
	}
	public function setMinimum($minimum) {
		$this->minimum = $minimum;
		return $this;
	}
	public function getSortOrder() {
		return $this->sortOrder;
	}
	public function setSortOrder($sortOrder) {
		$this->sortOrder = $sortOrder;
		return $this;
	}
	public function getStatus() {
		return $this->status;
	}
	public function setStatus($status) {
		$this->status = $status;
		return $this;
	}
	public function getDateAdded() {
		return $this->dateAdded;
	}
	public function setDateAdded(\DateTime $dateAdded) {
		$this->dateAdded = $dateAdded;
		return $this;
	}
	public function getDateModified() {
		return $this->dateModified;
	}
	public function setDateModified(\DateTime $dateModified) {
		$this->dateModified = $dateModified;
		return $this;
	}
	public function getBestBefore() {
		return $this->bestBefore;
	}
	public function setBestBefore(\DateTime $bestBefore) {
		$this->bestBefore = $bestBefore;
		return $this;
	}
	public function getLowStock() {
		return $this->lowStock;
	}
	public function setLowStock($lowStock) {
		$this->lowStock = $lowStock;
		return $this;
	}
	

}

