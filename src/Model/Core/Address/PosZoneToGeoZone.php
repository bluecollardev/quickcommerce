<?php

namespace QuickCommerce\Model\Core\Address;

use Doctrine\ORM\Mapping as ORM;

use QuickCommerce\Model\PosAbstractEntity;

/**
 * @ORM\Entity
 */
class PosZoneToGeoZone extends PosAbstractEntity {
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", name="zone_to_geo_zone_id")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	protected $zoneToGeoZoneId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", nullable=false, name="country_id")
	 */
	protected $countryId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", nullable=false, name="zone_id", options={"default":0})
	 */
	protected $zoneId = '0';
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", nullable=false, name="geo_zone_id")
	 */
	protected $geoZoneId;
	
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
	
	public function getZoneToGeoZoneId() {
		return $this->zoneToGeoZoneId;
	}
	public function setZoneToGeoZoneId($zoneToGeoZoneId) {
		$this->zoneToGeoZoneId = $zoneToGeoZoneId;
		return $this;
	}
	public function getCountryId() {
		return $this->countryId;
	}
	public function setCountryId($countryId) {
		$this->countryId = $countryId;
		return $this;
	}
	public function getZoneId() {
		return $this->zoneId;
	}
	public function setZoneId($zoneId) {
		$this->zoneId = $zoneId;
		return $this;
	}
	public function getGeoZoneId() {
		return $this->geoZoneId;
	}
	public function setGeoZoneId($geoZoneId) {
		$this->geoZoneId = $geoZoneId;
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

