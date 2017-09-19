<?php

namespace QuickCommerce\Model\Core\Voucher;

use Doctrine\ORM\Mapping as ORM;

use QuickCommerce\Model\PosAbstractEntity;

/**
 * @ORM\Entity
 */
class PosVoucherHistory extends PosAbstractEntity {
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", name="voucher_history_id")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	protected $voucherHistoryId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", name="voucher_id")
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
	 * @ORM\Column(type="decimal", nullable=false, name="amount", precision=15, scale=4)
	 */
	protected $amount;
	
	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(type="datetime", nullable=false, name="date_added")
	 */
	protected $dateAdded;
	
	public function getVoucherHistoryId() {
		return $this->voucherHistoryId;
	}
	public function setVoucherHistoryId($voucherHistoryId) {
		$this->voucherHistoryId = $voucherHistoryId;
		return $this;
	}
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

