<?php

namespace QuickCommerce\Model\Core\Product;

use Doctrine\ORM\Mapping as ORM;

use QuickCommerce\Model\PosAbstractEntity;

/**
 * @ORM\Entity
 */
class PosManufacturerToStore extends PosAbstractEntity {
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", name="manufacturer_id")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="NONE")
	 */
	protected $manufacturerId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", name="store_id")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="NONE")
	 */
	protected $storeId;
	
	public function getManufacturerId() {
		return $this->manufacturerId;
	}
	public function setManufacturerId($manufacturerId) {
		$this->manufacturerId = $manufacturerId;
		return $this;
	}
	public function getStoreId() {
		return $this->storeId;
	}
	public function setStoreId($storeId) {
		$this->storeId = $storeId;
		return $this;
	}
	
}

