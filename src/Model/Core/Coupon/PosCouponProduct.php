<?php

namespace QuickCommerce\Model\Core\Coupon;

use Doctrine\ORM\Mapping as ORM;

use QuickCommerce\Model\PosAbstractEntity;

/**
 * @ORM\Entity
 */
class PosCouponProduct extends PosAbstractEntity {
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", name="coupon_product_id")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	protected $couponProductId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="coupon_id", type="integer", nullable=false)
	 */
	protected $couponId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", nullable=false, name="product_id")
	 */
	protected $productId;
	
	public function getCouponProductId() {
		return $this->couponProductId;
	}
	public function setCouponProductId($couponProductId) {
		$this->couponProductId = $couponProductId;
		return $this;
	}
	public function getCouponId() {
		return $this->couponId;
	}
	public function setCouponId($couponId) {
		$this->couponId = $couponId;
		return $this;
	}
	public function getProductId() {
		return $this->productId;
	}
	public function setProductId($productId) {
		$this->productId = $productId;
		return $this;
	}
	
}

