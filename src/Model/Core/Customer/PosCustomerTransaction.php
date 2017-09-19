<?php

namespace QuickCommerce\Model\Core\Customer;

use Doctrine\ORM\Mapping as ORM;

use QuickCommerce\Model\PosAbstractEntity;

/**
 * @ORM\Entity
 */
class PosCustomerTransaction extends PosAbstractEntity {
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", name="customer_transaction_id")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	protected $customerTransactionId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", name="customer_id")
	 */
	protected $customerId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", nullable=false, name="order_id")
	 */
	protected $orderId;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="text", length=65535, nullable=false, name="description")
	 */
	protected $description;
	
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
	
	public function getCustomerTransactionId() {
		return $this->customerTransactionId;
	}
	public function setCustomerTransactionId($customerTransactionId) {
		$this->customerTransactionId = $customerTransactionId;
		return $this;
	}
	public function getCustomerId() {
		return $this->customerId;
	}
	public function setCustomerId($customerId) {
		$this->customerId = $customerId;
		return $this;
	}
	public function getOrderId() {
		return $this->orderId;
	}
	public function setOrderId($orderId) {
		$this->orderId = $orderId;
		return $this;
	}
	public function getDescription() {
		return $this->description;
	}
	public function setDescription($description) {
		$this->description = $description;
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

