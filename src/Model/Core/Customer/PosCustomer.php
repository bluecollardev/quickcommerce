<?php

namespace QuickCommerce\Model\Core\Customer;

use Doctrine\ORM\Mapping as ORM;

use QuickCommerce\Model\PosAbstractEntity;

/**
 * @ORM\Entity
 */
class PosCustomer extends PosAbstractEntity {
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", name="customer_id")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	protected $customerId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", nullable=false, name="customer_group_id")
	 */
	protected $customerGroupId;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=32, nullable=false, name="firstname")
	 */
	protected $firstname;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=32, nullable=false, name="lastname")
	 */
	protected $lastname;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=96, nullable=false, name="email")
	 */
	protected $email;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=32, nullable=false, name="telephone")
	 */
	protected $telephone;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=32, nullable=false, name="fax")
	 */
	protected $fax;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=40, nullable=false, name="password")
	 */
	protected $password;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=9, nullable=false, name="salt")
	 */
	protected $salt;
	
	/**
	 * @var boolean
	 *
	 * @ORM\Column(type="boolean", nullable=false, name="newsletter", options={"default":0})
	 */
	protected $newsletter = '0';
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", nullable=false, name="address_id", options={"default":0})
	 */
	protected $addressId = '0';
	
	/**
	 * @var boolean
	 *
	 * @ORM\Column(type="boolean", nullable=false, name="status")
	 */
	protected $status;
	
	/**
	 * @var boolean
	 *
	 * @ORM\Column(type="boolean", nullable=false, name="approved")
	 */
	protected $approved;
	
	/**
	 * @var boolean
	 *
	 * @ORM\Column(type="boolean", nullable=false, name="safe")
	 */
	protected $safe;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="text", length=65535, nullable=false, name="token")
	 */
	protected $token;
	
	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(type="datetime", nullable=false, name="date_added")
	 */
	protected $dateAdded;
	
	public function getCustomerId() {
		return $this->customerId;
	}
	public function setCustomerId($customerId) {
		$this->customerId = $customerId;
		return $this;
	}
	public function getCustomerGroupId() {
		return $this->customerGroupId;
	}
	public function setCustomerGroupId($customerGroupId) {
		$this->customerGroupId = $customerGroupId;
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
	public function getEmail() {
		return $this->email;
	}
	public function setEmail($email) {
		$this->email = $email;
		return $this;
	}
	public function getTelephone() {
		return $this->telephone;
	}
	public function setTelephone($telephone) {
		$this->telephone = $telephone;
		return $this;
	}
	public function getFax() {
		return $this->fax;
	}
	public function setFax($fax) {
		$this->fax = $fax;
		return $this;
	}
	public function getPassword() {
		return $this->password;
	}
	public function setPassword($password) {
		$this->password = $password;
		return $this;
	}
	public function getSalt() {
		return $this->salt;
	}
	public function setSalt($salt) {
		$this->salt = $salt;
		return $this;
	}
	public function getNewsletter() {
		return $this->newsletter;
	}
	public function setNewsletter($newsletter) {
		$this->newsletter = $newsletter;
		return $this;
	}
	public function getAddressId() {
		return $this->addressId;
	}
	public function setAddressId($addressId) {
		$this->addressId = $addressId;
		return $this;
	}
	public function getStatus() {
		return $this->status;
	}
	public function setStatus($status) {
		$this->status = $status;
		return $this;
	}
	public function getApproved() {
		return $this->approved;
	}
	public function setApproved($approved) {
		$this->approved = $approved;
		return $this;
	}
	public function getSafe() {
		return $this->safe;
	}
	public function setSafe($safe) {
		$this->safe = $safe;
		return $this;
	}
	public function getToken() {
		return $this->token;
	}
	public function setToken($token) {
		$this->token = $token;
		return $this;
	}
	public function getDateAdded() {
		return $this->dateAdded;
	}
	public function setDateAdded($dateAdded) {
		$this->dateAdded = $dateAdded;
		return $this;
	}
}
