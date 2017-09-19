<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * OcCoupon
 *
 * @ORM\Table(name="oc_coupon")
 * @ORM\Entity
 */
class OcCoupon
{
    /**
     * @var integer
     *
     * @ORM\Column(name="coupon_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $couponId;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=128, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=10, nullable=false)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=1, nullable=false)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="discount", type="decimal", precision=15, scale=4, nullable=false)
     */
    private $discount;

    /**
     * @var boolean
     *
     * @ORM\Column(name="logged", type="boolean", nullable=false)
     */
    private $logged;

    /**
     * @var boolean
     *
     * @ORM\Column(name="shipping", type="boolean", nullable=false)
     */
    private $shipping;

    /**
     * @var string
     *
     * @ORM\Column(name="total", type="decimal", precision=15, scale=4, nullable=false)
     */
    private $total;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_start", type="date", nullable=false)
     */
    private $dateStart = '0000-00-00';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_end", type="date", nullable=false)
     */
    private $dateEnd = '0000-00-00';

    /**
     * @var integer
     *
     * @ORM\Column(name="uses_total", type="integer", nullable=false)
     */
    private $usesTotal;

    /**
     * @var string
     *
     * @ORM\Column(name="uses_customer", type="string", length=11, nullable=false)
     */
    private $usesCustomer;

    /**
     * @var boolean
     *
     * @ORM\Column(name="status", type="boolean", nullable=false)
     */
    private $status;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_added", type="datetime", nullable=false)
     */
    private $dateAdded;


}

