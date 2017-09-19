<?php

namespace QuickCommerce\Model\Core\Product;

use Doctrine\ORM\Mapping as ORM;

use QuickCommerce\Model\PosAbstractEntity;

/**
 * @ORM\Entity
 */
class PosProductOptionValue extends PosAbstractEntity {
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", name="product_option_value_id")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	protected $productOptionValueId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", name="product_option_id")
	 */
	protected $productOptionId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", nullable=false, name="product_id")
	 */
	protected $productId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", nullable=false, name="option_id")
	 */
	protected $optionId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", nullable=false, name="option_value_id")
	 */
	protected $optionValueId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", nullable=false, name="quantity")
	 */
	protected $quantity;
	
	/**
	 * @var boolean
	 *
	 * @ORM\Column(type="boolean", nullable=false, name="subtract")
	 */
	protected $subtract;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="decimal", nullable=false, name="price", precision=15, scale=4)
	 */
	protected $price;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=1, nullable=false, name="price_prefix")
	 */
	protected $pricePrefix;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", nullable=false, name="points")
	 */
	protected $points;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=1, nullable=false, name="points_prefix")
	 */
	protected $pointsPrefix;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="decimal", nullable=false, name="weight", precision=15, scale=8)
	 */
	protected $weight;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=1, nullable=false, name="weight_prefix")
	 */
	protected $weightPrefix;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", nullable=true, name="low_stock", options={"default":3})
	 */
	//protected $lowStock = '3';
	
	public function getProductOptionValueId() {
		return $this->productOptionValueId;
	}
	public function setProductOptionValueId($productOptionValueId) {
		$this->productOptionValueId = $productOptionValueId;
		return $this;
	}
	public function getProductOptionId() {
		return $this->productOptionId;
	}
	public function setProductOptionId($productOptionId) {
		$this->productOptionId = $productOptionId;
		return $this;
	}
	public function getProductId() {
		return $this->productId;
	}
	public function setProductId($productId) {
		$this->productId = $productId;
		return $this;
	}
	public function getOptionId() {
		return $this->optionId;
	}
	public function setOptionId($optionId) {
		$this->optionId = $optionId;
		return $this;
	}
	public function getOptionValueId() {
		return $this->optionValueId;
	}
	public function setOptionValueId($optionValueId) {
		$this->optionValueId = $optionValueId;
		return $this;
	}
	public function getQuantity() {
		return $this->quantity;
	}
	public function setQuantity($quantity) {
		$this->quantity = $quantity;
		return $this;
	}
	public function getSubtract() {
		return $this->subtract;
	}
	public function setSubtract($subtract) {
		$this->subtract = $subtract;
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
	public function getPoints() {
		return $this->points;
	}
	public function setPoints($points) {
		$this->points = $points;
		return $this;
	}
	public function getPointsPrefix() {
		return $this->pointsPrefix;
	}
	public function setPointsPrefix($pointsPrefix) {
		$this->pointsPrefix = $pointsPrefix;
		return $this;
	}
	public function getWeight() {
		return $this->weight;
	}
	public function setWeight($weight) {
		$this->weight = $weight;
		return $this;
	}
	public function getWeightPrefix() {
		return $this->weightPrefix;
	}
	public function setWeightPrefix($weightPrefix) {
		$this->weightPrefix = $weightPrefix;
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

