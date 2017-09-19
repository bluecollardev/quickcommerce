<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * OcCouponProduct
 *
 * @ORM\Table(name="oc_coupon_product")
 * @ORM\Entity
 */
class OcCouponProduct
{
    /**
     * @var integer
     *
     * @ORM\Column(name="coupon_product_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $couponProductId;

    /**
     * @var integer
     *
     * @ORM\Column(name="coupon_id", type="integer", nullable=false)
     */
    private $couponId;

    /**
     * @var integer
     *
     * @ORM\Column(name="product_id", type="integer", nullable=false)
     */
    private $productId;


}

