<?php


/**
 * OcProductSpecial
 *
 * @ORM\Table(name="oc2_product_special", indexes={@ORM\Index(name="product_id",
 * columns={"product_id"}), @ORM\Index(name="IDX_5A022715D2919A68",
 * columns={"customer_group_id"})})
 * @ORM\Entity
 */
class OcProductSpecial
{

    /**
     * @var integer
     *
     * @ORM\Column(name="priority", type="integer", nullable=false)
     */
    private $priority = '1';

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="decimal", precision=15, scale=4, nullable=false)
     */
    private $price = '0.0000';

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
     * @ORM\Column(name="product_special_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $productSpecialId = null;

    /**
     * @var \OcCustomerGroup
     *
     * @ORM\ManyToOne(targetEntity="OcCustomerGroup")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="customer_group_id",
     * referencedColumnName="customer_group_id")
     * })
     */
    private $customerGroup = null;

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
     * Set priority
     *
     * @param integer $priority
     *
     * @return OcProductSpecial
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;

        return $this;
    }

    /**
     * Get priority
     *
     * @return integer
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * Set price
     *
     * @param string $price
     *
     * @return OcProductSpecial
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
     * Set dateStart
     *
     * @param \DateTime $dateStart
     *
     * @return OcProductSpecial
     */
    public function setDateStart($dateStart)
    {
        $this->dateStart = $dateStart;

        return $this;
    }

    /**
     * Get dateStart
     *
     * @return \DateTime
     */
    public function getDateStart()
    {
        return $this->dateStart;
    }

    /**
     * Set dateEnd
     *
     * @param \DateTime $dateEnd
     *
     * @return OcProductSpecial
     */
    public function setDateEnd($dateEnd)
    {
        $this->dateEnd = $dateEnd;

        return $this;
    }

    /**
     * Get dateEnd
     *
     * @return \DateTime
     */
    public function getDateEnd()
    {
        return $this->dateEnd;
    }

    /**
     * Get productSpecialId
     *
     * @return integer
     */
    public function getProductSpecialId()
    {
        return $this->productSpecialId;
    }

    /**
     * Set customerGroup
     *
     * @param \OcCustomerGroup $customerGroup
     *
     * @return OcProductSpecial
     */
    public function setCustomerGroup(\OcCustomerGroup $customerGroup = null)
    {
        $this->customerGroup = $customerGroup;

        return $this;
    }

    /**
     * Get customerGroup
     *
     * @return \OcCustomerGroup
     */
    public function getCustomerGroup()
    {
        return $this->customerGroup;
    }

    /**
     * Set product
     *
     * @param \OcProduct $product
     *
     * @return OcProductSpecial
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
