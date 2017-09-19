<?php


/**
 * OcProductAttribute
 *
 * @ORM\Table(name="oc2_product_attribute",
 * indexes={@ORM\Index(name="IDX_ABF027FF4584665A", columns={"product_id"}),
 * @ORM\Index(name="IDX_ABF027FFB6E62EFA", columns={"attribute_id"}),
 * @ORM\Index(name="IDX_ABF027FF82F1BAF4", columns={"language_id"})})
 * @ORM\Entity
 */
class OcProductAttribute
{

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="text", length=65535, nullable=false)
     */
    private $text = null;

    /**
     * @var \OcAttribute
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="OcAttribute")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="attribute_id", referencedColumnName="attribute_id")
     * })
     */
    private $attribute = null;

    /**
     * @var \OcLanguage
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="OcLanguage")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="language_id", referencedColumnName="language_id")
     * })
     */
    private $language = null;

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
     * Set text
     *
     * @param string $text
     *
     * @return OcProductAttribute
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set attribute
     *
     * @param \OcAttribute $attribute
     *
     * @return OcProductAttribute
     */
    public function setAttribute(\OcAttribute $attribute)
    {
        $this->attribute = $attribute;

        return $this;
    }

    /**
     * Get attribute
     *
     * @return \OcAttribute
     */
    public function getAttribute()
    {
        return $this->attribute;
    }

    /**
     * Set language
     *
     * @param \OcLanguage $language
     *
     * @return OcProductAttribute
     */
    public function setLanguage(\OcLanguage $language)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language
     *
     * @return \OcLanguage
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set product
     *
     * @param \OcProduct $product
     *
     * @return OcProductAttribute
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
