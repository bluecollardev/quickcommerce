<?php

namespace QuickCommerce\Model\Core\Customer;

use Doctrine\ORM\Mapping as ORM;

use QuickCommerce\Model\PosAbstractEntity;

/**
 * @ORM\Entity
 */
class PosCustomerHistory extends PosAbstractEntity {
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", name="customer_history_id")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	protected $customerHistoryId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", name="customer_id")
	 */
	protected $customerId;
	
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
	
	public function getCustomerHistoryId() {
		return $this->customerHistoryId;
	}
	public function setCustomerHistoryId($customerHistoryId) {
		$this->customerHistoryId = $customerHistoryId;
		return $this;
	}
	public function getCustomerId() {
		return $this->customerId;
	}
	public function setCustomerId($customerId) {
		$this->customerId = $customerId;
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

