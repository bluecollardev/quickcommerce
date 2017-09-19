<?php


/**
 * OcAttributeDescription
 *
 * @ORM\Table(name="oc2_attribute_description")
 * @ORM\Entity
 */
class OcAttributeDescription
{

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="text", length=255, nullable=false)
     */
    private $name = null;

    /**
     * @var \OcLanguage
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\ManyToOne(targetEntity="OcLanguage")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="language_id", referencedColumnName="language_id")
     * })
     */
    private $language = null;

    /**
     * @var \OcAttribute
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\ManyToOne(targetEntity="OcAttribute", inversedBy="description")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="attribute_id", referencedColumnName="attribute_id")
     * })
     */
    private $attribute = null;

    /**
     * Set name
     *
     * @param string $name
     *
     * @return OcAttributeDescription
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
     * Set language
     *
     * @param \OcLanguage $language
     *
     * @return OcAttributeDescription
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
     * Set attribute
     *
     * @param \OcAttribute $attribute
     *
     * @return OcAttributeDescription
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


}
