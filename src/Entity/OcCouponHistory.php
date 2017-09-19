<?php


/**
 * OcCouponHistory
 *
 * @ORM\Table(name="oc2_coupon_history",
 * indexes={@ORM\Index(name="IDX_AF79C1A666C5951B", columns={"coupon_id"}),
 * @ORM\Index(name="IDX_AF79C1A68D9F6D38", columns={"order_id"}),
 * @ORM\Index(name="IDX_AF79C1A69395C3F3", columns={"customer_id"})})
 * @ORM\Entity
 */
class OcCouponHistory
{

    /**
     * @var string
     *
     * @ORM\Column(name="amount", type="decimal", precision=15, scale=4,
     * nullable=false)
     */
    private $amount = null;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_added", type="datetime", nullable=false)
     */
    private $dateAdded = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="coupon_history_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $couponHistoryId = null;

    /**
     * @var \OcCustomer
     *
     * @ORM\ManyToOne(targetEntity="OcCustomer")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="customer_id", referencedColumnName="customer_id")
     * })
     */
    private $customer = null;

    /**
     * @var \OcOrder
     *
     * @ORM\ManyToOne(targetEntity="OcOrder")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="order_id", referencedColumnName="order_id")
     * })
     */
    private $order = null;

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
     * Set amount
     *
     * @param string $amount
     *
     * @return OcCouponHistory
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return string
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set dateAdded
     *
     * @param \DateTime $dateAdded
     *
     * @return OcCouponHistory
     */
    public function setDateAdded($dateAdded)
    {
        $this->dateAdded = $dateAdded;

        return $this;
    }

    /**
     * Get dateAdded
     *
     * @return \DateTime
     */
    public function getDateAdded()
    {
        return $this->dateAdded;
    }

    /**
     * Get couponHistoryId
     *
     * @return integer
     */
    public function getCouponHistoryId()
    {
        return $this->couponHistoryId;
    }

    /**
     * Set customer
     *
     * @param \OcCustomer $customer
     *
     * @return OcCouponHistory
     */
    public function setCustomer(\OcCustomer $customer = null)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * Get customer
     *
     * @return \OcCustomer
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Set order
     *
     * @param \OcOrder $order
     *
     * @return OcCouponHistory
     */
    public function setOrder(\OcOrder $order = null)
    {
        $this->order = $order;

        return $this;
    }

    /**
     * Get order
     *
     * @return \OcOrder
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * Set coupon
     *
     * @param \OcCoupon $coupon
     *
     * @return OcCouponHistory
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


}
