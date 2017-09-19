<?php

namespace QuickCommerce\Model\Core\Address;

use Doctrine\ORM\Mapping as ORM;

use QuickCommerce\Model\PosAbstractEntity;

/**
 * @ORM\Entity
 */
class PosAddress extends PosAbstractEntity {
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", name="address_id")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	protected $addressId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", name="customer_id")
	 */
	protected $customerId;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=32, nullable=false, name="firstname")
	 */
	protected $firstname = '';
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=32, nullable=false, name="lastname")
	 */
	protected $lastname = '';
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=40, nullable=false, name="company")
	 */
	protected $company = '';
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=128, nullable=false, name="address_1")
	 */
	protected $address1 = '';
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=128, nullable=false, name="address_2")
	 */
	protected $address2 = '';
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=128, nullable=false, name="city")
	 */
	protected $city = '';
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=10, nullable=false, name="postcode")
	 */
	protected $postcode = '';
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", name="country_id")
	 */
	protected $countryId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", name="zone_id")
	 */
	protected $zoneId;
	
	public function getAddressId() {
		return $this->addressId;
	}
	public function setAddressId($addressId) {
		$this->addressId = $addressId;
		return $this;
	}
	public function getCustomerId() {
		return $this->customerId;
	}
	public function setCustomerId($customerId) {
		$this->customerId = $customerId;
		return $this;
	}
	public function getFirstname() {
		return $this->firstname;
	}
	public function setFirstname($firstname) {
		$this->firstname = $firstname;
		return $this;
	}
	public function getLastname() {
		return $this->lastname;
	}
	public function setLastname($lastname) {
		$this->lastname = $lastname;
		return $this;
	}
	public function getCompany() {
		return $this->company;
	}
	public function setCompany($company) {
		$this->company = $company;
		return $this;
	}
	public function getAddress1() {
		return $this->address1;
	}
	public function setAddress1($address1) {
		$this->address1 = $address1;
		return $this;
	}
	public function getAddress2() {
		return $this->address2;
	}
	public function setAddress2($address2) {
		$this->address2 = $address2;
		return $this;
	}
	public function getCity() {
		return $this->city;
	}
	public function setCity($city) {
		$this->city = $city;
		return $this;
	}
	public function getPostcode() {
		return $this->postcode;
	}
	public function setPostcode($postcode) {
		$this->postcode = $postcode;
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
}
