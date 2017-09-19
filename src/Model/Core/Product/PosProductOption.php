<?php

namespace QuickCommerce\Model\Core\Product;

use Doctrine\ORM\Mapping as ORM;

use QuickCommerce\Model\PosAbstractEntity;

/**
 * @ORM\Entity
 */
class PosProductOption extends PosAbstractEntity {
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", name="product_option_id")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	protected $productOptionId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", name="product_id")
	 */
	protected $productId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", name="option_id")
	 */
	protected $optionId;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="text", length=65535, nullable=false, name="value")
	 */
	protected $value;
	
	/**
	 * @var boolean
	 *
	 * @ORM\Column(type="boolean", nullable=false, name="required")
	 */
	protected $required;
	
	public function getProductOptionId() {
		return $this->productOptionId;
	}
	public function setProductOptionId($productOptionId) {
		$this->productOptionId = $productOptionId;
		return $this;
	}
	public function getProductId() {
		return $this->productId;
	}
	public function setProductId($productId) {
		$this->productId = $productId;
		return $this;
	}
	public function getOptionId() {
		return $this->optionId;
	}
	public function setOptionId($optionId) {
		$this->optionId = $optionId;
		return $this;
	}
	public function getValue() {
		return $this->value;
	}
	public function setValue($value) {
		$this->value = $value;
		return $this;
	}
	public function getRequired() {
		return $this->required;
	}
	public function setRequired($required) {
		$this->required = $required;
		return $this;
	}
	
}

