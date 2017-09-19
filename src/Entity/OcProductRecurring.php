<?php


/**
 * OcProductRecurring
 *
 * @ORM\Table(name="oc2_product_recurring",
 * indexes={@ORM\Index(name="IDX_3DE6CAE94584665A", columns={"product_id"}),
 * @ORM\Index(name="IDX_3DE6CAE9B149C95E", columns={"recurring_id"}),
 * @ORM\Index(name="IDX_3DE6CAE9D2919A68", columns={"customer_group_id"})})
 * @ORM\Entity
 */
class OcProductRecurring
{

    /**
     * @var \OcCustomerGroup
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="OcCustomerGroup")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="customer_group_id",
     * referencedColumnName="customer_group_id")
     * })
     */
    private $customerGroup = null;

    /**
     * @var \OcRecurring
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="OcRecurring")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="recurring_id", referencedColumnName="recurring_id")
     * })
     */
    private $recurring = null;

    /**
     * @var \OcProduct
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="OcProduct")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="product_id", referencedColumnName="product_id")
     * })
     */
    private $product = null;

    /**
     * Set customerGroup
     *
     * @param \OcCustomerGroup $customerGroup
     *
     * @return OcProductRecurring
     */
    public function setCustomerGroup(\OcCustomerGroup $customerGroup)
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
     * Set recurring
     *
     * @param \OcRecurring $recurring
     *
     * @return OcProductRecurring
     */
    public function setRecurring(\OcRecurring $recurring)
    {
        $this->recurring = $recurring;

        return $this;
    }

    /**
     * Get recurring
     *
     * @return \OcRecurring
     */
    public function getRecurring()
    {
        return $this->recurring;
    }

    /**
     * Set product
     *
     * @param \OcProduct $product
     *
     * @return OcProductRecurring
     */
    public function setProduct(\OcProduct $product)
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
