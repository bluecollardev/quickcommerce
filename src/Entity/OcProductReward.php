<?php


/**
 * OcProductReward
 *
 * @ORM\Table(name="oc2_product_reward",
 * indexes={@ORM\Index(name="IDX_4B06C18C4584665A", columns={"product_id"}),
 * @ORM\Index(name="IDX_4B06C18CD2919A68", columns={"customer_group_id"})})
 * @ORM\Entity
 */
class OcProductReward
{

    /**
     * @var integer
     *
     * @ORM\Column(name="points", type="integer", nullable=false)
     */
    private $points = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="product_reward_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $productRewardId = null;

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
     * Set points
     *
     * @param integer $points
     *
     * @return OcProductReward
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
     * Get productRewardId
     *
     * @return integer
     */
    public function getProductRewardId()
    {
        return $this->productRewardId;
    }

    /**
     * Set customerGroup
     *
     * @param \OcCustomerGroup $customerGroup
     *
     * @return OcProductReward
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
     * @return OcProductReward
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
