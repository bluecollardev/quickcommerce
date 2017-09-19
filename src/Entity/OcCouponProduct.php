<?php


/**
 * OcCouponProduct
 *
 * @ORM\Table(name="oc2_coupon_product",
 * indexes={@ORM\Index(name="IDX_5B89B54066C5951B", columns={"coupon_id"}),
 * @ORM\Index(name="IDX_5B89B5404584665A", columns={"product_id"})})
 * @ORM\Entity
 */
class OcCouponProduct
{

    /**
     * @var integer
     *
     * @ORM\Column(name="coupon_product_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $couponProductId = null;

    /**
     * @var \OcCoupon
     *
     * @ORM\ManyToOne(targetEntity="OcCoupon")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="coupon_id", referencedColumnName="coupon_id")
     * })
     */
    private $coupon = null;

    /**
     * @var \OcProduct
     *
     * @ORM\ManyToOne(targetEntity="OcProduct")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="product_id", referencedColumnName="product_id")
     * })
     */
    private $product = null;

    /**
     * Get couponProductId
     *
     * @return integer
     */
    public function getCouponProductId()
    {
        return $this->couponProductId;
    }

    /**
     * Set coupon
     *
     * @param \OcCoupon $coupon
     *
     * @return OcCouponProduct
     */
    public function setCoupon(\OcCoupon $coupon = null)
    {
        $this->coupon = $coupon;

        return $this;
    }

    /**
     * Get coupon
     *
     * @return \OcCoupon
     */
    public function getCoupon()
    {
        return $this->coupon;
    }

    /**
     * Set product
     *
     * @param \OcProduct $product
     *
     * @return OcCouponProduct
     */
    public function setProduct(\OcProduct $product = null)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return \OcProduct
     */
    public function getProduct()
    {
        return $this->product;
    }


}
