<?php


/**
 * OcAttributeGroup
 *
 * @ORM\Table(name="oc2_attribute_group")
 * @ORM\Entity
 */
class OcAttributeGroup
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
     * @ORM\Column(name="attribute_group_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $attributeGroupId = null;
	
	/**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="OcAttributeGroupDescription", mappedBy="attributeGroup")
     */
    private $description = null;

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
     * @return OcAttributeGroup
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
     * Get attributeGroupId
     *
     * @return integer
     */
    public function getAttributeGroupId()
    {
        return $this->attributeGroupId;
    }
	
	/**
     * Add description
     *
     * @param \OcAttributeGroupDescription $description
     *
     * @return OcProduct
     */
    public function addDescription(\OcAttributeGroupDescription $description)
    {
        $this->description[] = $description;

        return $this;
    }

    /**
     * Remove description
     *
     * @param \OcAttributeGroupDescription $description
     */
    public function removeDescription(\OcAttributeGroupDescription $description)
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
}
