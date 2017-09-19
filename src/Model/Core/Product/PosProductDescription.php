<?php

namespace QuickCommerce\Model\Core\Product;

use Doctrine\ORM\Mapping as ORM;

use QuickCommerce\Model\PosAbstractEntity;

/**
 * @ORM\Entity
 */
class PosProductDescription extends PosAbstractEntity {
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", name="product_id")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="NONE")
	 */
	protected $productId;
	
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
	 * @ORM\Column(type="string", length=255, nullable=false, name="name")
	 */
	protected $name;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="text", length=65535, nullable=true, name="description")
	 */
	protected $description;
	
	public function getProductId() {
		return $this->productId;
	}
	public function setProductId($productId) {
		$this->productId = $productId;
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
	public function getDescription() {
		return $this->description;
	}
	public function setDescription($description) {
		$this->description = $description;
		return $this;
	}

	public function getLangInfo() {
		return array($this->productId => $this->name);
	}
	
}

