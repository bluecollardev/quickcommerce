<?php

namespace QuickCommerce\Model\Core\Checkout;

use Doctrine\ORM\Mapping as ORM;

use QuickCommerce\Model\PosAbstractEntity;

/**
 * @ORM\Entity
 */
class PosCartTotal extends PosAbstractEntity {
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", name="cart_total_id")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	protected $cartTotalId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="cart_id", type="integer", nullable=false)
	 */
	protected $cartId;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=32, nullable=false, name="code")
	 */
	protected $code;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=255, nullable=false, name="title")
	 */
	protected $title;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="decimal", nullable=false, name="value", precision=15, scale=4, options={"default":"0.0000"})
	 */
	protected $value = '0.0000';
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", nullable=false, name="sort_cart")
	 */
	protected $sortCart;
	
	public function getCartTotalId() {
		return $this->cartTotalId;
	}
	public function setCartTotalId($cartTotalId) {
		$this->cartTotalId = $cartTotalId;
		return $this;
	}
	public function getCartId() {
		return $this->cartId;
	}
	public function setCartId($cartId) {
		$this->cartId = $cartId;
		return $this;
	}
	public function getCode() {
		return $this->code;
	}
	public function setCode($code) {
		$this->code = $code;
		return $this;
	}
	public function getTitle() {
		return $this->title;
	}
	public function setTitle($title) {
		$this->title = $title;
		return $this;
	}
	public function getValue() {
		return $this->value;
	}
	public function setValue($value) {
		$this->value = $value;
		return $this;
	}
	public function getSortCart() {
		return $this->sortCart;
	}
	public function setSortCart($sortCart) {
		$this->sortCart = $sortCart;
		return $this;
	}
	
}

