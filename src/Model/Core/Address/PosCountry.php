<?php

namespace QuickCommerce\Model\Core\Address;

use Doctrine\ORM\Mapping as ORM;

use QuickCommerce\Model\PosAbstractEntity;

/**
 * @ORM\Entity
 */
class PosCountry extends PosAbstractEntity {
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", name="country_id")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
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
	 * @ORM\Column(type="string", length=2, nullable=false, name="iso_code_2")
	 */
	protected $isoCode2;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=3, nullable=false, name="iso_code_3")
	 */
	protected $isoCode3;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="text", length=65535, nullable=false, name="address_format")
	 */
	protected $addressFormat;
	
	/**
	 * @var boolean
	 *
	 * @ORM\Column(type="boolean", nullable=false, name="postcode_required")
	 */
	protected $postcodeRequired;
	
	/**
	 * @var boolean
	 *
	 * @ORM\Column(type="boolean", nullable=false, name="status", options={"default":1})
	 */
	protected $status = '1';
	
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
	public function getIsoCode2() {
		return $this->isoCode2;
	}
	public function setIsoCode2($isoCode2) {
		$this->isoCode2 = $isoCode2;
		return $this;
	}
	public function getIsoCode3() {
		return $this->isoCode3;
	}
	public function setIsoCode3($isoCode3) {
		$this->isoCode3 = $isoCode3;
		return $this;
	}
	public function getAddressFormat() {
		return $this->addressFormat;
	}
	public function setAddressFormat($addressFormat) {
		$this->addressFormat = $addressFormat;
		return $this;
	}
	public function getPostcodeRequired() {
		return $this->postcodeRequired;
	}
	public function setPostcodeRequired($postcodeRequired) {
		$this->postcodeRequired = $postcodeRequired;
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
