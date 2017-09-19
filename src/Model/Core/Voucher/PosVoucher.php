<?php

namespace QuickCommerce\Model\Core\Voucher;

use Doctrine\ORM\Mapping as ORM;

use QuickCommerce\Model\PosAbstractEntity;

/**
 * @ORM\Entity
 */
class PosVoucher extends PosAbstractEntity {
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", name="voucher_id")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	protected $voucherId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", nullable=false, name="order_id")
	 */
	protected $orderId;
	
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
	
	/**
	 * @var boolean
	 *
	 * @ORM\Column(type="boolean", nullable=false, name="status")
	 */
	protected $status;
	
	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(type="datetime", nullable=false, name="date_added")
	 */
	protected $dateAdded;
	
	public function getVoucherId() {
		return $this->voucherId;
	}
	public function setVoucherId($voucherId) {
		$this->voucherId = $voucherId;
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
	public function getStatus() {
		return $this->status;
	}
	public function setStatus($status) {
		$this->status = $status;
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

