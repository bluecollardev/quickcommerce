<?php

namespace QuickCommerce\Model\Core\Tax;

use Doctrine\ORM\Mapping as ORM;

use QuickCommerce\Model\PosAbstractEntity;

/**
 * @ORM\Entity
 */
class PosTaxRule extends PosAbstractEntity {
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", name="tax_rule_id")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	protected $taxRuleId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", nullable=false, name="tax_class_id")
	 */
	protected $taxClassId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", nullable=false, name="tax_rate_id")
	 */
	protected $taxRateId;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=10, nullable=false, name="based")
	 */
	protected $based;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", nullable=false, name="priority", options={"default":1})
	 */
	protected $priority = '1';
	
	public function getTaxRuleId() {
		return $this->taxRuleId;
	}
	public function setTaxRuleId($taxRuleId) {
		$this->taxRuleId = $taxRuleId;
		return $this;
	}
	public function getTaxClassId() {
		return $this->taxClassId;
	}
	public function setTaxClassId($taxClassId) {
		$this->taxClassId = $taxClassId;
		return $this;
	}
	public function getTaxRateId() {
		return $this->taxRateId;
	}
	public function setTaxRateId($taxRateId) {
		$this->taxRateId = $taxRateId;
		return $this;
	}
	public function getBased() {
		return $this->based;
	}
	public function setBased($based) {
		$this->based = $based;
		return $this;
	}
	public function getPriority() {
		return $this->priority;
	}
	public function setPriority($priority) {
		$this->priority = $priority;
		return $this;
	}
	
}

