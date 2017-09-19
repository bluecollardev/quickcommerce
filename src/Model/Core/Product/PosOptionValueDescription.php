<?php

namespace QuickCommerce\Model\Core\Product;

use Doctrine\ORM\Mapping as ORM;

use QuickCommerce\Model\PosAbstractEntity;

/**
 * @ORM\Entity
 */
class PosOptionValueDescription extends PosAbstractEntity {
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", name="option_value_id")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="NONE")
	 */
	protected $optionValueId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", name="language_id")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="NONE")
	 */
	protected $languageId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", nullable=false, name="option_id")
	 */
	protected $optionId;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=128, nullable=false, name="name")
	 */
	protected $name;
	
	public function getOptionValueId() {
		return $this->optionValueId;
	}
	public function setOptionValueId($optionValueId) {
		$this->optionValueId = $optionValueId;
		return $this;
	}
	public function getLanguageId() {
		return $this->languageId;
	}
	public function setLanguageId($languageId) {
		$this->languageId = $languageId;
		return $this;
	}
	public function getOptionId() {
		return $this->optionId;
	}
	public function setOptionId($optionId) {
		$this->optionId = $optionId;
		return $this;
	}
	public function getName() {
		return $this->name;
	}
	public function setName($name) {
		$this->name = $name;
		return $this;
	}

	public function getLangInfo() {
		return array($this->optionValueId => $this->name);
	}
	
}

