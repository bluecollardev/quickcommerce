<?php

namespace QuickCommerce\Model\Core\Coupon;

use Doctrine\ORM\Mapping as ORM;

use QuickCommerce\Model\PosAbstractEntity;

/**
 * @ORM\Entity
 */
class PosCouponHistory extends PosAbstractEntity {
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", name="coupon_history_id")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	protected $couponHistoryId;

	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", name="coupon_id", nullable=false)
	 */
	protected $couponId;

	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", name="order_id")
	 */
	protected $orderId;

	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", name="customer_id")
	 */
	protected $customerId;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="decimal", nullable=false, name="amount", precision=15, scale=4)
	 */
	protected $amount;
	
	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(type="datetime", nullable=false, name="date_added")
	 */
	protected $dateAdded;
	
	public function getCouponHistoryId() {
		return $this->couponHistoryId;
	}
	public function setCouponHistoryId($couponHistoryId) {
		$this->couponHistoryId = $couponHistoryId;
		return $this;
	}
	public function getCouponId() {
		return $this->couponId;
	}
	public function setCouponId($couponId) {
		$this->couponId = $couponId;
		return $this;
	}
	public function getOrderId() {
		return $this->orderId;
	}
	public function setOrderId($orderId) {
		$this->orderId = $orderId;
		return $this;
	}
	public function getCustomerId() {
		return $this->customerId;
	}
	public function setCustomerId($customerId) {
		$this->customerId = $customerId;
		return $this;
	}
	public function getAmount() {
		return $this->amount;
	}
	public function setAmount($amount) {
		$this->amount = $amount;
		return $this;
	}
	public function getDateAdded() {
		return $this->dateAdded;
	}
	public function setDateAdded(\DateTime $dateAdded) {
		$this->dateAdded = $dateAdded;
		return $this;
	}
	
}

