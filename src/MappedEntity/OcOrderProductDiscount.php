<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * OcOrderProductDiscount
 *
 * @ORM\Table(name="oc_order_product_discount")
 * @ORM\Entity
 */
class OcOrderProductDiscount
{
    /**
     * @var integer
     *
     * @ORM\Column(name="order_product_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $orderProductId;

    /**
     * @var boolean
     *
     * @ORM\Column(name="discount_type", type="boolean", nullable=true)
     */
    private $discountType;

    /**
     * @var string
     *
     * @ORM\Column(name="discount_value", type="decimal", precision=15, scale=2, nullable=true)
     */
    private $discountValue = '0.00';

    /**
     * @var boolean
     *
     * @ORM\Column(name="include_tax", type="boolean", nullable=true)
     */
    private $includeTax;

    /**
     * @var string
     *
     * @ORM\Column(name="discounted_price", type="decimal", precision=15, scale=4, nullable=true)
     */
    private $discountedPrice = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="discounted_tax", type="decimal", precision=15, scale=4, nullable=true)
     */
    private $discountedTax = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="discounted_total", type="decimal", precision=15, scale=4, nullable=true)
     */
    private $discountedTotal = '0.0000';


}

