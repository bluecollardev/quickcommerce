<?php

namespace QuickCommerce\Model\Core\Customer;

use Doctrine\ORM\Mapping as ORM;

use QuickCommerce\Model\PosAbstractEntity;

/**
 * @ORM\Entity
 */
class PosCustomerActivity extends PosAbstractEntity {
	/**
	 * @var integer
	 * 
	 * @ORM\Column(type="integer", name="customer_activity_id")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	protected $customerActivityId;

	/**
	 * @var integer
	 * 
	 * @ORM\Column(type="integer", name="customer_id")
	 */
	protected $customerId;

	/**
	 * @var string
	 * 
	 * @ORM\Column(type="string", length=64, nullable=false, name="key")
	 */
	protected $key;

	/**
	 * @var string
	 * 
	 * @ORM\Column(type="text", length=65535, nullable=false, name="data")
	 */
	protected $data;

	/**
	 * @var \DateTime
	 * 
	 * @ORM\Column(type="datetime", nullable=false, name="date_added")
	 */
	protected $dateAdded;
    
	public function getCustomerActivityId() {
		return $this->customerActivityId;
	}
	public function setCustomerActivityId($customerActivityId) {
		$this->customerActivityId = $customerActivityId;
		return $this;
	}
	public function getCustomerId() {
		return $this->customerId;
	}
	public function setCustomerId($customerId) {
		$this->customerId = $customerId;
		return $this;
	}
	public function getKey() {
		return $this->key;
	}
	public function setKey($key) {
		$this->key = $key;
		return $this;
	}
	public function getData() {
		return $this->data;
	}
	public function setData($data) {
		$this->data = $data;
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

