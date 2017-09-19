<?php


/**
 * OcProductImage
 *
 * @ORM\Table(name="oc2_product_image", indexes={@ORM\Index(name="product_id",
 * columns={"product_id"})})
 * @ORM\Entity
 */
class OcProductImage
{

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=true)
     */
    private $image = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="sort_order", type="integer", nullable=false)
     */
    private $sortOrder = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="product_image_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $productImageId = null;

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
     * Set image
     *
     * @param string $image
     *
     * @return OcProductImage
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set sortOrder
     *
     * @param integer $sortOrder
     *
     * @return OcProductImage
     */
    public function setSortOrder($sortOrder)
    {
        $this->sortOrder = $sortOrder;

        return $this;
    }

    /**
     * Get sortOrder
     *
     * @return integer
     */
    public function getSortOrder()
    {
        return $this->sortOrder;
    }

    /**
     * Get productImageId
     *
     * @return integer
     */
    public function getProductImageId()
    {
        return $this->productImageId;
    }

    /**
     * Set product
     *
     * @param \OcProduct $product
     *
     * @return OcProductImage
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
