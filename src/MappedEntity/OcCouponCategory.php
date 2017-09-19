<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * OcCouponCategory
 *
 * @ORM\Table(name="oc_coupon_category")
 * @ORM\Entity
 */
class OcCouponCategory
{
    /**
     * @var integer
     *
     * @ORM\Column(name="coupon_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $couponId;

    /**
     * @var integer
     *
     * @ORM\Column(name="category_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $categoryId;


}

