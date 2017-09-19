<?php

namespace QuickCommerce\Model\Core\Customer;

use Doctrine\ORM\Mapping as ORM;

use QuickCommerce\Model\PosAbstractEntity;

/**
 * @ORM\Entity
 */
class PosCustomerGroup extends PosAbstractEntity {
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", name="customer_group_id")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	protected $customerGroupId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", nullable=false, name="approval")
	 */
	protected $approval;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", nullable=false, name="sort_order")
	 */
	protected $sortOrder;
	
	public function getCustomerGroupId() {
		return $this->customerGroupId;
	}
	public function setCustomerGroupId($customerGroupId) {
		$this->customerGroupId = $customerGroupId;
		return $this;
	}
	public function getApproval() {
		return $this->approval;
	}
	public function setApproval($approval) {
		$this->approval = $approval;
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
