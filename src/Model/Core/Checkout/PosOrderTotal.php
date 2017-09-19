<?php

namespace QuickCommerce\Model\Core\Checkout;

use Doctrine\ORM\Mapping as ORM;

use QuickCommerce\Model\PosAbstractEntity;

/**
 * @ORM\Entity
 */
class PosOrderTotal extends PosAbstractEntity {
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", name="order_total_id")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	protected $orderTotalId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="order_id", type="integer", nullable=false)
	 */
	protected $orderId;
	
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
	 * @ORM\Column(type="integer", nullable=false, name="sort_order")
	 */
	protected $sortOrder;
	
	public function getOrderTotalId() {
		return $this->orderTotalId;
	}
	public function setOrderTotalId($orderTotalId) {
		$this->orderTotalId = $orderTotalId;
		return $this;
	}
	public function getOrderId() {
		return $this->orderId;
	}
	public function setOrderId($orderId) {
		$this->orderId = $orderId;
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
	public function getSortOrder() {
		return $this->sortOrder;
	}
	public function setSortOrder($sortOrder) {
		$this->sortOrder = $sortOrder;
		return $this;
	}
	
}

