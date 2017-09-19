<?php


/**
 * OcProductRelated
 *
 * @ORM\Table(name="oc2_product_related",
 * indexes={@ORM\Index(name="IDX_763E68664584665A", columns={"product_id"})})
 * @ORM\Entity
 */
class OcProductRelated
{

    /**
     * @var integer
     *
     * @ORM\Column(name="related_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $relatedId = null;

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
     * Set relatedId
     *
     * @param integer $relatedId
     *
     * @return OcProductRelated
     */
    public function setRelatedId($relatedId)
    {
        $this->relatedId = $relatedId;

        return $this;
    }

    /**
     * Get relatedId
     *
     * @return integer
     */
    public function getRelatedId()
    {
        return $this->relatedId;
    }

    /**
     * Set product
     *
     * @param \OcProduct $product
     *
     * @return OcProductRelated
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
