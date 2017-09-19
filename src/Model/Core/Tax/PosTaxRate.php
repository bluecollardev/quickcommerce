<?php

namespace QuickCommerce\Model\Core\Tax;

use Doctrine\ORM\Mapping as ORM;

use QuickCommerce\Model\PosAbstractEntity;

/**
 * @ORM\Entity
 */
class PosTaxRate extends PosAbstractEntity {
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", name="tax_rate_id")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	protected $taxRateId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", nullable=false, name="geo_zone_id", options={"default":0})
	 */
	protected $geoZoneId = '0';
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=32, nullable=false, name="name")
	 */
	protected $name;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="decimal", nullable=false, name="rate", precision=15, scale=4, options={"default":"0.0000"})
	 */
	protected $rate = '0.0000';
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=1, nullable=false, name="type")
	 */
	protected $type;
	
	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(type="datetime", nullable=false, name="date_added")
	 */
	protected $dateAdded;
	
	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(type="datetime", nullable=false, name="date_modified")
	 */
	protected $dateModified;
	
	public function getTaxRateId() {
		return $this->taxRateId;
	}
	public function setTaxRateId($taxRateId) {
		$this->taxRateId = $taxRateId;
		return $this;
	}
	public function getGeoZoneId() {
		return $this->geoZoneId;
	}
	public function setGeoZoneId($geoZoneId) {
		$this->geoZoneId = $geoZoneId;
		return $this;
	}
	public function getName() {
		return $this->name;
	}
	public function setName($name) {
		$this->name = $name;
		return $this;
	}
	public function getRate() {
		return $this->rate;
	}
	public function setRate($rate) {
		$this->rate = $rate;
		return $this;
	}
	public function getType() {
		return $this->type;
	}
	public function setType($type) {
		$this->type = $type;
		return $this;
	}
	public function getDateAdded() {
		return $this->dateAdded;
	}
	public function setDateAdded(\DateTime $dateAdded) {
		$this->dateAdded = $dateAdded;
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

