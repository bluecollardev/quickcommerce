<?php

namespace QuickCommerce\Model\Core\Coupon;

use Doctrine\ORM\Mapping as ORM;

use QuickCommerce\Model\PosAbstractEntity;


/**
 * @ORM\Entity
 */
class PosCouponCategory extends PosAbstractEntity {
	/**
	 * @var integer
	 * 
	 * @ORM\Column(name="coupon_id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="NONE")
	 */
	protected $couponId;

	/**
	 * @var integer
	 * 
	 * @ORM\Column(name="category_id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="NONE")
	 */
	protected $categoryId;
	
	public function getCouponId() {
		return $this->couponId;
	}
	public function setCouponId($couponId) {
		$this->couponId = $couponId;
		return $this;
	}
	public function getCategoryId() {
		return $this->categoryId;
	}
	public function setCategoryId($categoryId) {
		$this->categoryId = $categoryId;
		return $this;
	}
}

