<?php


/**
 * OcProductOptionValue
 *
 * @ORM\Table(name="oc2_product_option_value",
 * indexes={@ORM\Index(name="IDX_2DDB7AA9C964ABE2", columns={"product_option_id"}),
 * @ORM\Index(name="IDX_2DDB7AA94584665A", columns={"product_id"}),
 * @ORM\Index(name="IDX_2DDB7AA9A7C41D6F", columns={"option_id"}),
 * @ORM\Index(name="IDX_2DDB7AA9D957CA06", columns={"option_value_id"})})
 * @ORM\Entity
 */
class OcProductOptionValue
{

    /**
     * @var integer
     *
     * @ORM\Column(name="quantity", type="integer", nullable=false)
     */
    private $quantity = null;

    /**
     * @var boolean
     *
     * @ORM\Column(name="subtract", type="boolean", nullable=false)
     */
    private $subtract = null;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="decimal", precision=15, scale=4, nullable=false)
     */
    private $price = null;

    /**
     * @var string
     *
     * @ORM\Column(name="price_prefix", type="string", length=1, nullable=false)
     */
    private $pricePrefix = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="points", type="integer", nullable=false)
     */
    private $points = null;

    /**
     * @var string
     *
     * @ORM\Column(name="points_prefix", type="string", length=1, nullable=false)
     */
    private $pointsPrefix = null;

    /**
     * @var string
     *
     * @ORM\Column(name="weight", type="decimal", precision=15, scale=8,
     * nullable=false)
     */
    private $weight = null;

    /**
     * @var string
     *
     * @ORM\Column(name="weight_prefix", type="string", length=1, nullable=false)
     */
    private $weightPrefix = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="product_option_value_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $productOptionValueId = null;

    /**
     * @var \OcOptionValue
     *
     * @ORM\ManyToOne(targetEntity="OcOptionValue")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="option_value_id",
     * referencedColumnName="option_value_id")
     * })
     */
    private $optionValue = null;

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
     * @var \OcOption
     *
     * @ORM\ManyToOne(targetEntity="OcOption")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="option_id", referencedColumnName="option_id")
     * })
     */
    private $option = null;

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
     * Set quantity
     *
     * @param integer $quantity
     *
     * @return OcProductOptionValue
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set subtract
     *
     * @param boolean $subtract
     *
     * @return OcProductOptionValue
     */
    public function setSubtract($subtract)
    {
        $this->subtract = $subtract;

        return $this;
    }

    /**
     * Get subtract
     *
     * @return boolean
     */
    public function getSubtract()
    {
        return $this->subtract;
    }

    /**
     * Set price
     *
     * @param string $price
     *
     * @return OcProductOptionValue
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set pricePrefix
     *
     * @param string $pricePrefix
     *
     * @return OcProductOptionValue
     */
    public function setPricePrefix($pricePrefix)
    {
        $this->pricePrefix = $pricePrefix;

        return $this;
    }

    /**
     * Get pricePrefix
     *
     * @return string
     */
    public function getPricePrefix()
    {
        return $this->pricePrefix;
    }

    /**
     * Set points
     *
     * @param integer $points
     *
     * @return OcProductOptionValue
     */
    public function setPoints($points)
    {
        $this->points = $points;

        return $this;
    }

    /**
     * Get points
     *
     * @return integer
     */
    public function getPoints()
    {
        return $this->points;
    }

    /**
     * Set pointsPrefix
     *
     * @param string $pointsPrefix
     *
     * @return OcProductOptionValue
     */
    public function setPointsPrefix($pointsPrefix)
    {
        $this->pointsPrefix = $pointsPrefix;

        return $this;
    }

    /**
     * Get pointsPrefix
     *
     * @return string
     */
    public function getPointsPrefix()
    {
        return $this->pointsPrefix;
    }

    /**
     * Set weight
     *
     * @param string $weight
     *
     * @return OcProductOptionValue
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get weight
     *
     * @return string
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set weightPrefix
     *
     * @param string $weightPrefix
     *
     * @return OcProductOptionValue
     */
    public function setWeightPrefix($weightPrefix)
    {
        $this->weightPrefix = $weightPrefix;

        return $this;
    }

    /**
     * Get weightPrefix
     *
     * @return string
     */
    public function getWeightPrefix()
    {
        return $this->weightPrefix;
    }

    /**
     * Get productOptionValueId
     *
     * @return integer
     */
    public function getProductOptionValueId()
    {
        return $this->productOptionValueId;
    }

    /**
     * Set optionValue
     *
     * @param \OcOptionValue $optionValue
     *
     * @return OcProductOptionValue
     */
    public function setOptionValue(\OcOptionValue $optionValue = null)
    {
        $this->optionValue = $optionValue;

        return $this;
    }

    /**
     * Get optionValue
     *
     * @return \OcOptionValue
     */
    public function getOptionValue()
    {
        return $this->optionValue;
    }

    /**
     * Set productOption
     *
     * @param \OcProductOption $productOption
     *
     * @return OcProductOptionValue
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
     * Set option
     *
     * @param \OcOption $option
     *
     * @return OcProductOptionValue
     */
    public function setOption(\OcOption $option = null)
    {
        $this->option = $option;

        return $this;
    }

    /**
     * Get option
     *
     * @return \OcOption
     */
    public function getOption()
    {
        return $this->option;
    }

    /**
     * Set product
     *
     * @param \OcProduct $product
     *
     * @return OcProductOptionValue
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
