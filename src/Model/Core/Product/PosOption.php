<?php

namespace QuickCommerce\Model\Core\Product;

use Doctrine\ORM\Mapping as ORM;

use QuickCommerce\Model\PosAbstractEntity;

/**
 * @ORM\Entity
 */
class PosOption extends PosAbstractEntity {
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", name="option_id")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	protected $optionId;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=32, nullable=false, name="type")
	 */
	protected $type;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", nullable=false, name="sort_order")
	 */
	protected $sortOrder;
	
	public function getOptionId() {
		return $this->optionId;
	}
	public function setOptionId($optionId) {
		$this->optionId = $optionId;
		return $this;
	}
	public function getType() {
		return $this->type;
	}
	public function setType($type) {
		$this->type = $type;
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

