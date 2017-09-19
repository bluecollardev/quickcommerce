<?php


/**
 * OcProductOption
 *
 * @ORM\Table(name="oc2_product_option",
 * indexes={@ORM\Index(name="IDX_5F51B36F4584665A", columns={"product_id"}),
 * @ORM\Index(name="IDX_5F51B36FA7C41D6F", columns={"option_id"})})
 * @ORM\Entity
 */
class OcProductOption
{

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="text", length=65535, nullable=false)
     */
    private $value = null;

    /**
     * @var boolean
     *
     * @ORM\Column(name="required", type="boolean", nullable=false)
     */
    private $required = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="product_option_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $productOptionId = null;

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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="OcProductOptionValue", mappedBy="productOption")
     */
    private $productOptionValues = null;

    /**
     * Constructor
     */
    public function __construct()
    {
		$this->productOptionValues = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set value
     *
     * @param string $value
     *
     * @return OcProductOption
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
     * Set required
     *
     * @param boolean $required
     *
     * @return OcProductOption
     */
    public function setRequired($required)
    {
        $this->required = $required;

        return $this;
    }

    /**
     * Get required
     *
     * @return boolean
     */
    public function getRequired()
    {
        return $this->required;
    }

    /**
     * Get productOptionId
     *
     * @return integer
     */
    public function getProductOptionId()
    {
        return $this->productOptionId;
    }

    /**
     * Set option
     *
     * @param \OcOption $option
     *
     * @return OcProductOption
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
     * @return OcProductOption
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

	/**
     * Add productOptionValue
     *
     * @param \OcProductOptionValue $productOptionValue
     *
     * @return OcProductOption
     */
    public function addProductOptionValue(\OcProductOptionValue $productOptionValue)
    {
        $this->productOptionValues[] = $productOptionValue;

        return $this;
    }

    /**
     * Remove productOptionValue
     *
     * @param \OcOptionValue $productOptionValue
     */
    public function removeProductOptionValue(\OcProductOptionValue $productOptionValue)
    {
        $this->productOptionValues->removeElement($productOptionValue);
    }

    /**
     * Get productOptionValue
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProductOptionValues()
    {
        return $this->productOptionValues;
    }
}
