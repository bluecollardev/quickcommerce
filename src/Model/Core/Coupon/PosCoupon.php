<?php

namespace QuickCommerce\Model\Core\Coupon;

use Doctrine\ORM\Mapping as ORM;

use QuickCommerce\Model\PosAbstractEntity;


/**
 * @ORM\Entity
 */
class PosCoupon extends PosAbstractEntity {
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", name="coupon_id")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	protected $couponId;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=128, nullable=false, name="name")
	 */
	protected $name;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=10, nullable=false, name="code")
	 */
	protected $code;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=1, nullable=false, name="type")
	 */
	protected $type;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="decimal", nullable=false, name="discount", precision=15, scale=4)
	 */
	protected $discount;
	
	/**
	 * @var boolean
	 *
	 * @ORM\Column(type="boolean", nullable=false, name="logged")
	 */
	protected $logged;
	
	/**
	 * @var boolean
	 *
	 * @ORM\Column(type="boolean", nullable=false, name="shipping")
	 */
	protected $shipping;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="decimal", nullable=false, name="total", precision=15, scale=4)
	 */
	protected $total;
	
	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(type="date", nullable=false, name="date_start", options={"default":"0000-00-00"})
	 */
	protected $dateStart = '0000-00-00';
	
	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(type="date", nullable=false, name="date_end", options={"default":"0000-00-00"})
	 */
	protected $dateEnd = '0000-00-00';
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", nullable=false, name="uses_total")
	 */
	protected $usesTotal;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=11, nullable=false, name="uses_customer")
	 */
	protected $usesCustomer;
	
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
	
	public function getCouponId() {
		return $this->couponId;
	}
	public function setCouponId($couponId) {
		$this->couponId = $couponId;
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
	public function getType() {
		return $this->type;
	}
	public function setType($type) {
		$this->type = $type;
		return $this;
	}
	public function getDiscount() {
		return $this->discount;
	}
	public function setDiscount($discount) {
		$this->discount = $discount;
		return $this;
	}
	public function getLogged() {
		return $this->logged;
	}
	public function setLogged($logged) {
		$this->logged = $logged;
		return $this;
	}
	public function getShipping() {
		return $this->shipping;
	}
	public function setShipping($shipping) {
		$this->shipping = $shipping;
		return $this;
	}
	public function getTotal() {
		return $this->total;
	}
	public function setTotal($total) {
		$this->total = $total;
		return $this;
	}
	public function getDateStart() {
		return $this->dateStart;
	}
	public function setDateStart(\DateTime $dateStart) {
		$this->dateStart = $dateStart;
		return $this;
	}
	public function getDateEnd() {
		return $this->dateEnd;
	}
	public function setDateEnd(\DateTime $dateEnd) {
		$this->dateEnd = $dateEnd;
		return $this;
	}
	public function getUsesTotal() {
		return $this->usesTotal;
	}
	public function setUsesTotal($usesTotal) {
		$this->usesTotal = $usesTotal;
		return $this;
	}
	public function getUsesCustomer() {
		return $this->usesCustomer;
	}
	public function setUsesCustomer($usesCustomer) {
		$this->usesCustomer = $usesCustomer;
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
