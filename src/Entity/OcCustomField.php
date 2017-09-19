<?php


/**
 * OcCustomField
 *
 * @ORM\Table(name="oc2_custom_field")
 * @ORM\Entity
 */
class OcCustomField
{

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=32, nullable=false)
     */
    private $type = null;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="text", length=65535, nullable=false)
     */
    private $value = null;

    /**
     * @var string
     *
     * @ORM\Column(name="location", type="string", length=7, nullable=false)
     */
    private $location = null;

    /**
     * @var boolean
     *
     * @ORM\Column(name="status", type="boolean", nullable=false)
     */
    private $status = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="sort_order", type="integer", nullable=false)
     */
    private $sortOrder = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="custom_field_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $customFieldId = null;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="OcLanguage", inversedBy="customField")
     * @ORM\JoinTable(name="oc2_custom_field_description",
     *   joinColumns={
     *     @ORM\JoinColumn(name="custom_field_id",
     * referencedColumnName="custom_field_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="language_id", referencedColumnName="language_id")
     *   }
     * )
     */
    private $language = null;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="OcCustomerGroup", inversedBy="customField")
     * @ORM\JoinTable(name="oc2_custom_field_customer_group",
     *   joinColumns={
     *     @ORM\JoinColumn(name="custom_field_id",
     * referencedColumnName="custom_field_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="customer_group_id",
     * referencedColumnName="customer_group_id")
     *   }
     * )
     */
    private $customerGroup = null;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->language = new \Doctrine\Common\Collections\ArrayCollection();
        $this->customerGroup = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return OcCustomField
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set value
     *
     * @param string $value
     *
     * @return OcCustomField
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set location
     *
     * @param string $location
     *
     * @return OcCustomField
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set status
     *
     * @param boolean $status
     *
     * @return OcCustomField
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return boolean
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set sortOrder
     *
     * @param integer $sortOrder
     *
     * @return OcCustomField
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
     * Get customFieldId
     *
     * @return integer
     */
    public function getCustomFieldId()
    {
        return $this->customFieldId;
    }

    /**
     * Add language
     *
     * @param \OcLanguage $language
     *
     * @return OcCustomField
     */
    public function addLanguage(\OcLanguage $language)
    {
        $this->language[] = $language;

        return $this;
    }

    /**
     * Remove language
     *
     * @param \OcLanguage $language
     */
    public function removeLanguage(\OcLanguage $language)
    {
        $this->language->removeElement($language);
    }

    /**
     * Get language
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Add customerGroup
     *
     * @param \OcCustomerGroup $customerGroup
     *
     * @return OcCustomField
     */
    public function addCustomerGroup(\OcCustomerGroup $customerGroup)
    {
        $this->customerGroup[] = $customerGroup;

        return $this;
    }

    /**
     * Remove customerGroup
     *
     * @param \OcCustomerGroup $customerGroup
     */
    public function removeCustomerGroup(\OcCustomerGroup $customerGroup)
    {
        $this->customerGroup->removeElement($customerGroup);
    }

    /**
     * Get customerGroup
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCustomerGroup()
    {
        return $this->customerGroup;
    }


}
