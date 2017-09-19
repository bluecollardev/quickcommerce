<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * OcOrderProduct
 *
 * @ORM\Table(name="oc_order_product")
 * @ORM\Entity
 */
class OcOrderProduct
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
     * @var integer
     *
     * @ORM\Column(name="order_id", type="integer", nullable=false)
     */
    private $orderId;

    /**
     * @var integer
     *
     * @ORM\Column(name="product_id", type="integer", nullable=false)
     */
    private $productId;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="model", type="string", length=64, nullable=false)
     */
    private $model;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantity", type="integer", nullable=false)
     */
    private $quantity;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="decimal", precision=15, scale=4, nullable=false)
     */
    private $price = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="total", type="decimal", precision=15, scale=4, nullable=false)
     */
    private $total = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="tax", type="decimal", precision=15, scale=4, nullable=false)
     */
    private $tax = '0.0000';

    /**
     * @var integer
     *
     * @ORM\Column(name="reward", type="integer", nullable=false)
     */
    private $reward;

    /**
     * @var string
     *
     * @ORM\Column(name="weight", type="decimal", precision=8, scale=2, nullable=true)
     */
    private $weight = '1.00';

    /**
     * @var integer
     *
     * @ORM\Column(name="location_id", type="integer", nullable=true)
     */
    private $locationId = '1';

    /**
     * @var boolean
     *
     * @ORM\Column(name="price_change", type="boolean", nullable=true)
     */
    private $priceChange = '0';


}

