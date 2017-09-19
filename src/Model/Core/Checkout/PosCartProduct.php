<?php

namespace QuickCommerce\Model\Core\Checkout;

use Doctrine\ORM\Mapping as ORM;

use QuickCommerce\Model\PosAbstractEntity;

/**
 * @ORM\Entity
 */
class PosCartProduct extends PosAbstractEntity {
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", name="cart_product_id")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	protected $cartProductId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="cart_id", type="integer", nullable=false)
	 */
	protected $cartId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", nullable=false, name="product_id")
	 */
	protected $productId;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=255, nullable=false, name="name")
	 */
	protected $name;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=64, nullable=false, name="model")
	 */
	protected $model;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", nullable=false, name="quantity")
	 */
	protected $quantity;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="decimal", nullable=false, name="price", precision=15, scale=4, options={"default":"0.0000"})
	 */
	protected $price = '0.0000';
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="decimal", nullable=false, name="total", precision=15, scale=4, options={"default":"0.0000"})
	 */
	protected $total = '0.0000';
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="decimal", nullable=false, name="tax", precision=15, scale=4, options={"default":"0.0000"})
	 */
	protected $tax = '0.0000';
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", nullable=false, name="reward")
	 */
	protected $reward;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="decimal", nullable=true, name="weight", precision=8, scale=2, options={"default":"1.00"})
	 */
	//protected $weight = '1.00';
	
	/**
	 * @var boolean
	 *
	 * @ORM\Column(type="boolean", nullable=true, name="price_change", options={"default":0})
	 */
	//protected $priceChange = '0';
	
	public function getCartProductId() {
		return $this->cartProductId;
	}
	public function setCartProductId($cartProductId) {
		$this->cartProductId = $cartProductId;
		return $this;
	}
	public function getCartId() {
		return $this->cartId;
	}
	public function setCartId($cartId) {
		$this->cartId = $cartId;
		return $this;
	}
	public function getProductId() {
		return $this->productId;
	}
	public function setProductId($productId) {
		$this->productId = $productId;
		return $this;
	}
	public function getName() {
		return $this->name;
	}
	public function setName($name) {
		$this->name = $name;
		return $this;
	}
	public function getModel() {
		return $this->model;
	}
	public function setModel($model) {
		$this->model = $model;
		return $this;
	}
	public function getQuantity() {
		return $this->quantity;
	}
	public function setQuantity($quantity) {
		$this->quantity = $quantity;
		return $this;
	}
	public function getPrice() {
		return $this->price;
	}
	public function setPrice($price) {
		$this->price = $price;
		return $this;
	}
	public function getTotal() {
		return $this->total;
	}
	public function setTotal($total) {
		$this->total = $total;
		return $this;
	}
	public function getTax() {
		return $this->tax;
	}
	public function setTax($tax) {
		$this->tax = $tax;
		return $this;
	}
	public function getReward() {
		return $this->reward;
	}
	public function setReward($reward) {
		$this->reward = $reward;
		return $this;
	}
	public function getWeight() {
		return $this->weight;
	}
	public function setWeight($weight) {
		$this->weight = $weight;
		return $this;
	}
	public function getPriceChange() {
		return $this->priceChange;
	}
	public function setPriceChange($priceChange) {
		$this->priceChange = $priceChange;
		return $this;
	}
}

