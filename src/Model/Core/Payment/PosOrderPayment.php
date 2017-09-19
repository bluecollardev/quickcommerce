<?php

namespace QuickCommerce\Model\Core\Payment;

use Doctrine\ORM\Mapping as ORM;

use QuickCommerce\Model\PosAbstractEntity;

/**
 * @ORM\Entity
 */
class PosOrderPayment extends PosAbstractEntity {
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", name="order_payment_id")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	//protected $orderPaymentId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="order_id", type="integer", nullable=false)
	 */
	protected $orderId = '0';
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", nullable=false, name="pos_return_id", options={"default":0})
	 */
	protected $posReturnId = '0';
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", nullable=false, name="user_id")
	 */
	//protected $userId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="payment_type_id", type="integer", nullable=false)
	 */
	protected $paymentTypeId;
	
	/**
	 * @var float
	 *
	 * @ORM\Column(type="float", nullable=false, name="tendered_amount", precision=10, scale=0)
	 */
	protected $tenderedAmount;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=256, nullable=true, name="payment_note")
	 */
	protected $paymentNote;
	
	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(type="datetime", nullable=true, name="payment_time")
	 */
	protected $paymentTime;
	
	public function getOrderPaymentId() {
		return $this->orderPaymentId;
	}
	public function setOrderPaymentId($orderPaymentId) {
		$this->orderPaymentId = $orderPaymentId;
		return $this;
	}
	public function getOrderId() {
		return $this->orderId;
	}
	public function setOrderId($orderId) {
		$this->orderId = $orderId;
		return $this;
	}
	public function getPosReturnId() {
		return $this->posReturnId;
	}
	public function setPosReturnId($posReturnId) {
		$this->posReturnId = $posReturnId;
		return $this;
	}
	public function getUserId() {
		return $this->userId;
	}
	public function setUserId($userId) {
		$this->userId = $userId;
		return $this;
	}
	public function getPaymentTypeId() {
		return $this->paymentTypeId;
	}
	public function setPaymentTypeId($paymentTypeId) {
		$this->paymentTypeId = $paymentTypeId;
		return $this;
	}
	public function getTenderedAmount() {
		return $this->tenderedAmount;
	}
	public function setTenderedAmount($tenderedAmount) {
		$this->tenderedAmount = $tenderedAmount;
		return $this;
	}
	public function getPaymentNote() {
		return $this->paymentNote;
	}
	public function setPaymentNote($paymentNote) {
		$this->paymentNote = $paymentNote;
		return $this;
	}
	public function getPaymentTime() {
		return $this->paymentTime;
	}
	public function setPaymentTime(\DateTime $paymentTime) {
		$this->paymentTime = $paymentTime;
		return $this;
	}
	
}

