<?php

namespace QuickCommerce\Model\Core\Checkout;

use Doctrine\ORM\Mapping as ORM;

use QuickCommerce\Model\PosAbstractEntity;

/**
 * @ORM\Entity
 */
class PosOrderOption extends PosAbstractEntity {
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", name="order_option_id")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	protected $orderOptionId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="order_id", type="integer", nullable=false)
	 */
	protected $orderId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", nullable=false, name="order_product_id")
	 */
	protected $orderProductId;
	
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
	
	public function getOrderOptionId() {
		return $this->orderOptionId;
	}
	public function setOrderOptionId($orderOptionId) {
		$this->orderOptionId = $orderOptionId;
		return $this;
	}
	public function getOrderId() {
		return $this->orderId;
	}
	public function setOrderId($orderId) {
		$this->orderId = $orderId;
		return $this;
	}
	public function getOrderProductId() {
		return $this->orderProductId;
	}
	public function setOrderProductId($orderProductId) {
		$this->orderProductId = $orderProductId;
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

