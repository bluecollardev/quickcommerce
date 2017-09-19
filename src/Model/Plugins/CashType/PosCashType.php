<?php

namespace QuickCommerce\Model\Plugin;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class PosCashType extends PosAbstractEntity {
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="cash_type_id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	protected $cashTypeId;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="type", type="string", length=30, nullable=false)
	 */
	protected $type;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="image", type="string", length=128, nullable=false)
	 */
	protected $image;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="value", type="decimal", precision=10, scale=2, nullable=false)
	 */
	protected $value;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="display", type="string", length=30, nullable=true)
	 */
	protected $display;
	
	public function getCashTypeId() {
		return $this->cashTypeId;
	}
	public function setCashTypeId($cashTypeId) {
		$this->cashTypeId = $cashTypeId;
		return $this;
	}
	public function getType() {
		return $this->type;
	}
	public function setType($type) {
		$this->type = $type;
		return $this;
	}
	public function getImage() {
		return $this->image;
	}
	public function setImage($image) {
		$this->image = $image;
		return $this;
	}
	public function getValue() {
		return $this->value;
	}
	public function setValue($value) {
		$this->value = $value;
		return $this;
	}
	public function getDisplay() {
		return $this->display;
	}
	public function setDisplay($display) {
		$this->display = $display;
		return $this;
	}
	
}