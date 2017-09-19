<?php

namespace QuickCommerce\Model\Core\Product;

use Doctrine\ORM\Mapping as ORM;

use QuickCommerce\Model\PosAbstractEntity;

/**
 * @ORM\Entity
 */
class PosOptionDescription extends PosAbstractEntity {
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", name="option_id")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="NONE")
	 */
	protected $optionId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", name="language_id")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="NONE")
	 */
	protected $languageId;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=128, nullable=false, name="name")
	 */
	protected $name;
	
	public function getOptionId() {
		return $this->optionId;
	}
	public function setOptionId($optionId) {
		$this->optionId = $optionId;
		return $this;
	}
	public function getLanguageId() {
		return $this->languageId;
	}
	public function setLanguageId($languageId) {
		$this->languageId = $languageId;
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
		return array($this->optionId => $this->name);
	}
	
}

