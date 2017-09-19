<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * OcOrderOption
 *
 * @ORM\Table(name="oc_order_option")
 * @ORM\Entity
 */
class OcOrderOption
{
    /**
     * @var integer
     *
     * @ORM\Column(name="order_option_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $orderOptionId;

    /**
     * @var integer
     *
     * @ORM\Column(name="order_id", type="integer", nullable=false)
     */
    private $orderId;

    /**
     * @var integer
     *
     * @ORM\Column(name="order_product_id", type="integer", nullable=false)
     */
    private $orderProductId;

    /**
     * @var integer
     *
     * @ORM\Column(name="product_option_id", type="integer", nullable=false)
     */
    private $productOptionId;

    /**
     * @var integer
     *
     * @ORM\Column(name="product_option_value_id", type="integer", nullable=false)
     */
    private $productOptionValueId = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="text", length=65535, nullable=false)
     */
    private $value;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=32, nullable=false)
     */
    private $type;


}

