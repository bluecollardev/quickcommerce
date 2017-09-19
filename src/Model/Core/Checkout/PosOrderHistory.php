<?php

namespace QuickCommerce\Model\Core\Checkout;

use Doctrine\ORM\Mapping as ORM;

use QuickCommerce\Model\PosAbstractEntity;

/**
 * @ORM\Entity
 */
class PosOrderHistory extends PosAbstractEntity {
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", name="order_history_id")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	protected $orderHistoryId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="order_id", type="integer", nullable=false)
	 */
	protected $orderId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", nullable=false, name="order_status_id")
	 */
	protected $orderStatusId;
	
	/**
	 * @var boolean
	 *
	 * @ORM\Column(type="boolean", nullable=false, name="notify", options={"default":0})
	 */
	protected $notify = '0';
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="text", length=65535, nullable=false, name="comment")
	 */
	protected $comment;
	
	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(type="datetime", nullable=false, name="date_added")
	 */
	protected $dateAdded;
	
	public function getOrderHistoryId() {
		return $this->orderHistoryId;
	}
	public function setOrderHistoryId($orderHistoryId) {
		$this->orderHistoryId = $orderHistoryId;
		return $this;
	}
	public function getOrderId() {
		return $this->orderId;
	}
	public function setOrderId($orderId) {
		$this->orderId = $orderId;
		return $this;
	}
	public function getOrderStatusId() {
		return $this->orderStatusId;
	}
	public function setOrderStatusId($orderStatusId) {
		$this->orderStatusId = $orderStatusId;
		return $this;
	}
	public function getNotify() {
		return $this->notify;
	}
	public function setNotify($notify) {
		$this->notify = $notify;
		return $this;
	}
	public function getComment() {
		return $this->comment;
	}
	public function setComment($comment) {
		$this->comment = $comment;
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

