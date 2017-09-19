<?php


/**
 * OcOrderOption
 *
 * @ORM\Table(name="oc2_order_option",
 * indexes={@ORM\Index(name="IDX_FDFF1B258D9F6D38", columns={"order_id"}),
 * @ORM\Index(name="IDX_FDFF1B25F65E9B0F", columns={"order_product_id"}),
 * @ORM\Index(name="IDX_FDFF1B25C964ABE2", columns={"product_option_id"}),
 * @ORM\Index(name="IDX_FDFF1B25EBDCCF9B", columns={"product_option_value_id"})})
 * @ORM\Entity
 */
class OcOrderOption
{

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name = null;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="text", length=65535, nullable=false)
     */
    private $value = null;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=32, nullable=false)
     */
    private $type = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="order_option_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $orderOptionId = null;

    /**
     * @var \OcOrderProduct
     *
     * @ORM\ManyToOne(targetEntity="OcOrderProduct")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="order_product_id",
     * referencedColumnName="order_product_id")
     * })
     */
    private $orderProduct = null;

    /**
     * @var \OcProductOptionValue
     *
     * @ORM\ManyToOne(targetEntity="OcProductOptionValue")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="product_option_value_id",
     * referencedColumnName="product_option_value_id")
     * })
     */
    private $productOptionValue = null;

    /**
     * @var \OcProductOption
     *
     * @ORM\ManyToOne(targetEntity="OcProductOption")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="product_option_id",
     * referencedColumnName="product_option_id")
     * })
     */
    private $productOption = null;

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
     * Set name
     *
     * @param string $name
     *
     * @return OcOrderOption
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set value
     *
     * @param string $value
     *
     * @return OcOrderOption
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return OcOrderOption
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Get orderOptionId
     *
     * @return integer
     */
    public function getOrderOptionId()
    {
        return $this->orderOptionId;
    }

    /**
     * Set orderProduct
     *
     * @param \OcOrderProduct $orderProduct
     *
     * @return OcOrderOption
     */
    public function setOrderProduct(\OcOrderProduct $orderProduct = null)
    {
        $this->orderProduct = $orderProduct;

        return $this;
    }

    /**
     * Get orderProduct
     *
     * @return \OcOrderProduct
     */
    public function getOrderProduct()
    {
        return $this->orderProduct;
    }

    /**
     * Set productOptionValue
     *
     * @param \OcProductOptionValue $productOptionValue
     *
     * @return OcOrderOption
     */
    public function setProductOptionValue(\OcProductOptionValue $productOptionValue = null)
    {
        $this->productOptionValue = $productOptionValue;

        return $this;
    }

    /**
     * Get productOptionValue
     *
     * @return \OcProductOptionValue
     */
    public function getProductOptionValue()
    {
        return $this->productOptionValue;
    }

    /**
     * Set productOption
     *
     * @param \OcProductOption $productOption
     *
     * @return OcOrderOption
     */
    public function setProductOption(\OcProductOption $productOption = null)
    {
        $this->productOption = $productOption;

        return $this;
    }

    /**
     * Get productOption
     *
     * @return \OcProductOption
     */
    public function getProductOption()
    {
        return $this->productOption;
    }

    /**
     * Set order
     *
     * @param \OcOrder $order
     *
     * @return OcOrderOption
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


}
