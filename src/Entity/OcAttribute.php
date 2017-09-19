<?php


/**
 * OcAttribute
 *
 * @ORM\Table(name="oc2_attribute",
 * indexes={@ORM\Index(name="IDX_BC49E3BF62D643B7",
 * columns={"attribute_group_id"})})
 * @ORM\Entity
 */
class OcAttribute
{

    /**
     * @var integer
     *
     * @ORM\Column(name="sort_order", type="integer", nullable=false)
     */
    private $sortOrder = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="attribute_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $attributeId = null;
	
	/**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="OcAttributeDescription", mappedBy="attribute")
     */
    private $description = null;

    /**
     * @var \OcAttributeGroup
     *
     * @ORM\ManyToOne(targetEntity="OcAttributeGroup")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="attribute_group_id",
     * referencedColumnName="attribute_group_id")
     * })
     */
    private $attributeGroup = null;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="OcLanguage", inversedBy="attribute")
     * @ORM\JoinTable(name="oc2_attribute_description",
     *   joinColumns={
     *     @ORM\JoinColumn(name="attribute_id", referencedColumnName="attribute_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="language_id", referencedColumnName="language_id")
     *   }
     * )
     */
    private $language = null;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->description = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set sortOrder
     *
     * @param integer $sortOrder
     *
     * @return OcAttribute
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
     * Get attributeId
     *
     * @return integer
     */
    public function getAttributeId()
    {
        return $this->attributeId;
    }
	
	/**
     * Add description
     *
     * @param \OcAttributeDescription $description
     *
     * @return OcAttribute
     */
    public function addDescription(\OcAttributeDescription $description)
    {
        $this->description[] = $description;

        return $this;
    }

    /**
     * Remove description
     *
     * @param \OcAttributeDescription $description
     */
    public function removeDescription(\OcAttributeDescription $description)
    {
        $this->description->removeElement($description);
    }

    /**
     * Get description
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set attributeGroup
     *
     * @param \OcAttributeGroup $attributeGroup
     *
     * @return OcAttribute
     */
    public function setAttributeGroup(\OcAttributeGroup $attributeGroup = null)
    {
        $this->attributeGroup = $attributeGroup;

        return $this;
    }

    /**
     * Get attributeGroup
     *
     * @return \OcAttributeGroup
     */
    public function getAttributeGroup()
    {
        return $this->attributeGroup;
    }
}
