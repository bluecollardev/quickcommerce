<?php

namespace QuickCommerce\Model\Core\Tax;

use Doctrine\ORM\Mapping as ORM;

use QuickCommerce\Model\PosAbstractEntity;

/**
 * @ORM\Entity
 */
class PosTaxRateToCustomerGroup extends PosAbstractEntity {
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", name="tax_rate_id")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="NONE")
	 */
	protected $taxRateId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", name="customer_group_id")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="NONE")
	 */
	protected $customerGroupId;
	
	public function getTaxRateId() {
		return $this->taxRateId;
	}
	public function setTaxRateId($taxRateId) {
		$this->taxRateId = $taxRateId;
		return $this;
	}
	public function getCustomerGroupId() {
		return $this->customerGroupId;
	}
	public function setCustomerGroupId($customerGroupId) {
		$this->customerGroupId = $customerGroupId;
		return $this;
	}
	
}

