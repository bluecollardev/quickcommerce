<?php


/**
 * OcProductToLayout
 *
 * @ORM\Table(name="oc2_product_to_layout",
 * indexes={@ORM\Index(name="IDX_4D62AF7B4584665A", columns={"product_id"}),
 * @ORM\Index(name="IDX_4D62AF7BB092A811", columns={"store_id"}),
 * @ORM\Index(name="IDX_4D62AF7B8C22AA1A", columns={"layout_id"})})
 * @ORM\Entity
 */
class OcProductToLayout
{

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
     * @var \OcStore
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="OcStore")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="store_id", referencedColumnName="store_id")
     * })
     */
    private $store = null;

    /**
     * @var \OcLayout
     *
     * @ORM\ManyToOne(targetEntity="OcLayout")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="layout_id", referencedColumnName="layout_id")
     * })
     */
    private $layout = null;

    /**
     * Set product
     *
     * @param \OcProduct $product
     *
     * @return OcProductToLayout
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

    /**
     * Set store
     *
     * @param \OcStore $store
     *
     * @return OcProductToLayout
     */
    public function setStore(\OcStore $store)
    {
        $this->store = $store;

        return $this;
    }

    /**
     * Get store
     *
     * @return \OcStore
     */
    public function getStore()
    {
        return $this->store;
    }

    /**
     * Set layout
     *
     * @param \OcLayout $layout
     *
     * @return OcProductToLayout
     */
    public function setLayout(\OcLayout $layout = null)
    {
        $this->layout = $layout;

        return $this;
    }

    /**
     * Get layout
     *
     * @return \OcLayout
     */
    public function getLayout()
    {
        return $this->layout;
    }


}
