<?php

namespace QuickCommerce\Model\Core\Address;

use Doctrine\ORM\Mapping as ORM;

use QuickCommerce\Model\PosAbstractEntity;

/**
 * @ORM\Entity
 */
class PosZone extends PosAbstractEntity {
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", name="zone_id")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	protected $zoneId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", nullable=false, name="country_id")
	 */
	protected $countryId;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=128, nullable=false, name="name")
	 */
	protected $name;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=32, nullable=false, name="code")
	 */
	protected $code;
	
	/**
	 * @var boolean
	 *
	 * @ORM\Column(type="boolean", nullable=false, name="status", options={"default":1})
	 */
	protected $status = '1';
	
	public function getZoneId() {
		return $this->zoneId;
	}
	public function setZoneId($zoneId) {
		$this->zoneId = $zoneId;
		return $this;
	}
	public function getCountryId() {
		return $this->countryId;
	}
	public function setCountryId($countryId) {
		$this->countryId = $countryId;
		return $this;
	}
	public function getName() {
		return $this->name;
	}
	public function setName($name) {
		$this->name = $name;
		return $this;
	}
	public function getCode() {
		return $this->code;
	}
	public function setCode($code) {
		$this->code = $code;
		return $this;
	}
	public function getStatus() {
		return $this->status;
	}
	public function setStatus($status) {
		$this->status = $status;
		return $this;
	}
	
}
