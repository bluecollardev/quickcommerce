<?php

namespace QuickCommerce\Model\Core\AppUser;

use Doctrine\ORM\Mapping as ORM;

use QuickCommerce\Model\PosAbstractEntity;

/**
 * @ORM\Entity
 */
class PosUser extends PosAbstractEntity {
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", name="user_id")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	protected $userId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", name="user_group_id")
	 */
	protected $userGroupId;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=20, nullable=false, name="username")
	 */
	protected $username;
	
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
	 * @ORM\Column(type="string", length=255, nullable=false, name="image")
	 */
	protected $image;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=40, nullable=false, name="code")
	 */
	protected $code;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=40, nullable=false, name="ip")
	 */
	protected $ip;
	
	/**
	 * @var boolean
	 *
	 * @ORM\Column(type="boolean", nullable=false, name="status")
	 */
	protected $status;
	
	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(type="datetime", nullable=false, name="date_added")
	 */
	protected $dateAdded;
	
	public function getUserId() {
		return $this->userId;
	}
	public function setUserId($userId) {
		$this->userId = $userId;
		return $this;
	}
	public function getUserGroupId() {
		return $this->userGroupId;
	}
	public function setUserGroupId($userGroupId) {
		$this->userGroupId = $userGroupId;
		return $this;
	}
	public function getUsername() {
		return $this->username;
	}
	public function setUsername($username) {
		$this->username = $username;
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
	public function getImage() {
		return $this->image;
	}
	public function setImage($image) {
		$this->image = $image;
		return $this;
	}
	public function getCode() {
		return $this->code;
	}
	public function setCode($code) {
		$this->code = $code;
		return $this;
	}
	public function getIp() {
		return $this->ip;
	}
	public function setIp($ip) {
		$this->ip = $ip;
		return $this;
	}
	public function getStatus() {
		return $this->status;
	}
	public function setStatus($status) {
		$this->status = $status;
		return $this;
	}
	public function getDateAdded() {
		return $this->dateAdded;
	}
	public function setDateAdded(\DateTime $dateAdded) {
		$this->dateAdded = $dateAdded;
		return $this;
	}
	
}

