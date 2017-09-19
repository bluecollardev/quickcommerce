<?php

namespace QuickCommerce\Model\Core\Checkout;

use Doctrine\ORM\Mapping as ORM;

use QuickCommerce\Model\PosAbstractEntity;

/**
 * @ORM\Entity
 */
class PosOrderVoucher extends PosAbstractEntity {
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", name="order_voucher_id")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	protected $orderVoucherId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="order_id", type="integer", nullable=false)
	 */
	protected $orderId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", nullable=false, name="voucher_id")
	 */
	protected $voucherId;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=255, nullable=false, name="description")
	 */
	protected $description;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=10, nullable=false, name="code")
	 */
	protected $code;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=64, nullable=false, name="from_name")
	 */
	protected $fromName;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=96, nullable=false, name="from_email")
	 */
	protected $fromEmail;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=64, nullable=false, name="to_name")
	 */
	protected $toName;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=96, nullable=false, name="to_email")
	 */
	protected $toEmail;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", nullable=false, name="voucher_theme_id")
	 */
	protected $voucherThemeId;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="text", length=65535, nullable=false, name="message")
	 */
	protected $message;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="decimal", nullable=false, name="amount", precision=15, scale=4)
	 */
	protected $amount;
	
	public function getOrderVoucherId() {
		return $this->orderVoucherId;
	}
	public function setOrderVoucherId($orderVoucherId) {
		$this->orderVoucherId = $orderVoucherId;
		return $this;
	}
	public function getOrderId() {
		return $this->orderId;
	}
	public function setOrderId($orderId) {
		$this->orderId = $orderId;
		return $this;
	}
	public function getVoucherId() {
		return $this->voucherId;
	}
	public function setVoucherId($voucherId) {
		$this->voucherId = $voucherId;
		return $this;
	}
	public function getDescription() {
		return $this->description;
	}
	public function setDescription($description) {
		$this->description = $description;
		return $this;
	}
	public function getCode() {
		return $this->code;
	}
	public function setCode($code) {
		$this->code = $code;
		return $this;
	}
	public function getFromName() {
		return $this->fromName;
	}
	public function setFromName($fromName) {
		$this->fromName = $fromName;
		return $this;
	}
	public function getFromEmail() {
		return $this->fromEmail;
	}
	public function setFromEmail($fromEmail) {
		$this->fromEmail = $fromEmail;
		return $this;
	}
	public function getToName() {
		return $this->toName;
	}
	public function setToName($toName) {
		$this->toName = $toName;
		return $this;
	}
	public function getToEmail() {
		return $this->toEmail;
	}
	public function setToEmail($toEmail) {
		$this->toEmail = $toEmail;
		return $this;
	}
	public function getVoucherThemeId() {
		return $this->voucherThemeId;
	}
	public function setVoucherThemeId($voucherThemeId) {
		$this->voucherThemeId = $voucherThemeId;
		return $this;
	}
	public function getMessage() {
		return $this->message;
	}
	public function setMessage($message) {
		$this->message = $message;
		return $this;
	}
	public function getAmount() {
		return $this->amount;
	}
	public function setAmount($amount) {
		$this->amount = $amount;
		return $this;
	}
	
}

