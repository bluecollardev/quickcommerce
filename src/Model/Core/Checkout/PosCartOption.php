<?php

namespace QuickCommerce\Model\Core\Checkout;

use Doctrine\ORM\Mapping as ORM;

use QuickCommerce\Model\PosAbstractEntity;

/**
 * @ORM\Entity
 */
class PosCartOption extends PosAbstractEntity {
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", name="cart_option_id")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	protected $cartOptionId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="cart_id", type="integer", nullable=false)
	 */
	protected $cartId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", nullable=false, name="cart_product_id")
	 */
	protected $cartProductId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", nullable=false, name="product_option_id")
	 */
	protected $productOptionId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", nullable=false, name="product_option_value_id", options={"default":0})
	 */
	protected $productOptionValueId = '0';
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=255, nullable=false, name="name")
	 */
	protected $name;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="text", length=65535, nullable=false, name="value")
	 */
	protected $value;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=32, nullable=false, name="type")
	 */
	protected $type;
	
	public function getCartOptionId() {
		return $this->cartOptionId;
	}
	public function setCartOptionId($cartOptionId) {
		$this->cartOptionId = $cartOptionId;
		return $this;
	}
	public function getCartId() {
		return $this->cartId;
	}
	public function setCartId($cartId) {
		$this->cartId = $cartId;
		return $this;
	}
	public function getCartProductId() {
		return $this->cartProductId;
	}
	public function setCartProductId($cartProductId) {
		$this->cartProductId = $cartProductId;
		return $this;
	}
	public function getProductOptionId() {
		return $this->productOptionId;
	}
	public function setProductOptionId($productOptionId) {
		$this->productOptionId = $productOptionId;
		return $this;
	}
	public function getProductOptionValueId() {
		return $this->productOptionValueId;
	}
	public function setProductOptionValueId($productOptionValueId) {
		$this->productOptionValueId = $productOptionValueId;
		return $this;
	}
	public function getName() {
		return $this->name;
	}
	public function setName($name) {
		$this->name = $name;
		return $this;
	}
	public function getValue() {
		return $this->value;
	}
	public function setValue($value) {
		$this->value = $value;
		return $this;
	}
	public function getType() {
		return $this->type;
	}
	public function setType($type) {
		$this->type = $type;
		return $this;
	}
	
}

