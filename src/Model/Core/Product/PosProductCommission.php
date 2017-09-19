<?php

namespace QuickCommerce\Model\Core\Product;

use Doctrine\ORM\Mapping as ORM;

use QuickCommerce\Model\PosAbstractEntity;

/**
 * @ORM\Entity
 */
class PosProductCommission extends PosAbstractEntity {
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", name="product_id")
	 * @ORM\Id
	 * 
	 */
	protected $productId;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=1, nullable=false, name="type")
	 */
	protected $type;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="decimal", nullable=true, name="value", precision=8, scale=2, options={"default":"0.00"})
	 */
	protected $value = '0.00';
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="decimal", nullable=true, name="base", precision=15, scale=2, options={"default":"0.00"})
	 */
	protected $base = '0.00';
	
	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(type="datetime", nullable=true, name="date_modified")
	 */
	protected $dateModified;
	
	public function getProductId() {
		return $this->productId;
	}
	public function setProductId($productId) {
		$this->productId = $productId;
		return $this;
	}
	public function getType() {
		return $this->type;
	}
	public function setType($type) {
		$this->type = $type;
		return $this;
	}
	public function getValue() {
		return $this->value;
	}
	public function setValue($value) {
		$this->value = $value;
		return $this;
	}
	public function getBase() {
		return $this->base;
	}
	public function setBase($base) {
		$this->base = $base;
		return $this;
	}
	public function getDateModified() {
		return $this->dateModified;
	}
	public function setDateModified(\DateTime $dateModified) {
		$this->dateModified = $dateModified;
		return $this;
	}
	
}

