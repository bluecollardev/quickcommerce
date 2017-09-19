<?php


/**
 * OcCustomerGroup
 *
 * @ORM\Table(name="oc2_customer_group")
 * @ORM\Entity
 */
class OcCustomerGroup
{

    /**
     * @var integer
     *
     * @ORM\Column(name="approval", type="integer", nullable=false)
     */
    private $approval = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="sort_order", type="integer", nullable=false)
     */
    private $sortOrder = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="customer_group_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $customerGroupId = null;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="OcTaxRate", mappedBy="customerGroup")
     */
    private $taxRate = null;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="OcLanguage", inversedBy="customerGroup")
     * @ORM\JoinTable(name="oc2_customer_group_description",
     *   joinColumns={
     *     @ORM\JoinColumn(name="customer_group_id",
     * referencedColumnName="customer_group_id")
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
     * @ORM\ManyToMany(targetEntity="OcCustomField", mappedBy="customerGroup")
     */
    private $customField = null;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->taxRate = new \Doctrine\Common\Collections\ArrayCollection();
        $this->language = new \Doctrine\Common\Collections\ArrayCollection();
        $this->customField = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set approval
     *
     * @param integer $approval
     *
     * @return OcCustomerGroup
     */
    public function setApproval($approval)
    {
        $this->approval = $approval;

        return $this;
    }

    /**
     * Get approval
     *
     * @return integer
     */
    public function getApproval()
    {
        return $this->approval;
    }

    /**
     * Set sortOrder
     *
     * @param integer $sortOrder
     *
     * @return OcCustomerGroup
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
     * Get customerGroupId
     *
     * @return integer
     */
    public function getCustomerGroupId()
    {
        return $this->customerGroupId;
    }

    /**
     * Add taxRate
     *
     * @param \OcTaxRate $taxRate
     *
     * @return OcCustomerGroup
     */
    public function addTaxRate(\OcTaxRate $taxRate)
    {
        $this->taxRate[] = $taxRate;

        return $this;
    }

    /**
     * Remove taxRate
     *
     * @param \OcTaxRate $taxRate
     */
    public function removeTaxRate(\OcTaxRate $taxRate)
    {
        $this->taxRate->removeElement($taxRate);
    }

    /**
     * Get taxRate
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTaxRate()
    {
        return $this->taxRate;
    }

    /**
     * Add language
     *
     * @param \OcLanguage $language
     *
     * @return OcCustomerGroup
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
     * Add customField
     *
     * @param \OcCustomField $customField
     *
     * @return OcCustomerGroup
     */
    public function addCustomField(\OcCustomField $customField)
    {
        $this->customField[] = $customField;

        return $this;
    }

    /**
     * Remove customField
     *
     * @param \OcCustomField $customField
     */
    public function removeCustomField(\OcCustomField $customField)
    {
        $this->customField->removeElement($customField);
    }

    /**
     * Get customField
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCustomField()
    {
        return $this->customField;
    }


}
