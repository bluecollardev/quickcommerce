<?php


/**
 * OcAttributeGroupDescription
 *
 * @ORM\Table(name="oc2_attribute_group_description")
 * @ORM\Entity
 */
class OcAttributeGroupDescription
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
     * @var \OcAttributeGroup
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\ManyToOne(targetEntity="OcAttributeGroup", inversedBy="description")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="attribute_group_id", referencedColumnName="attribute_group_id")
     * })
     */
    private $attributeGroup = null;

    /**
     * Set name
     *
     * @param string $name
     *
     * @return OcAttributeGroupDescription
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
     * @return OcAttributeGroupDescription
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
     * @param \OcAttributeGroup $attributeGroup
     *
     * @return OcAttributeGroupDescription
     */
    public function setAttributeGroup(\OcAttributeGroup $attributeGroup)
    {
        $this->attributeGroup = $attributeGroup;

        return $this;
    }

    /**
     * Get attribute
     *
     * @return \OcAttributeGroup
     */
    public function getAttributeGroup()
    {
        return $this->attributeGroup;
    }


}
