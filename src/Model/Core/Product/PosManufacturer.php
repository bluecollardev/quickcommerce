<?php

namespace QuickCommerce\Model\Core\Product;

use Doctrine\ORM\Mapping as ORM;

use QuickCommerce\Model\PosAbstractEntity;

/**
 * @ORM\Entity
 */
class PosManufacturer extends PosAbstractEntity {
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", name="manufacturer_id")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	protected $manufacturerId;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=64, nullable=false, name="name")
	 */
	protected $name;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=255, nullable=true, name="image")
	 */
	protected $image;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", nullable=false, name="sort_order")
	 */
	protected $sortOrder;
	
	public function getManufacturerId() {
		return $this->manufacturerId;
	}
	public function setManufacturerId($manufacturerId) {
		$this->manufacturerId = $manufacturerId;
		return $this;
	}
	public function getName() {
		return $this->name;
	}
	public function setName($name) {
		$this->name = $name;
		return $this;
	}
	public function getImage() {
		return $this->image;
	}
	public function setImage($image) {
		$this->image = $image;
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

