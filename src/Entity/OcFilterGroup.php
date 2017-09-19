<?php


/**
 * OcFilterGroup
 *
 * @ORM\Table(name="oc2_filter_group")
 * @ORM\Entity
 */
class OcFilterGroup
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
     * @ORM\Column(name="filter_group_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $filterGroupId = null;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="OcLanguage", inversedBy="filterGroup")
     * @ORM\JoinTable(name="oc2_filter_group_description",
     *   joinColumns={
     *     @ORM\JoinColumn(name="filter_group_id",
     * referencedColumnName="filter_group_id")
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
        $this->language = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set sortOrder
     *
     * @param integer $sortOrder
     *
     * @return OcFilterGroup
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
     * Get filterGroupId
     *
     * @return integer
     */
    public function getFilterGroupId()
    {
        return $this->filterGroupId;
    }

    /**
     * Add language
     *
     * @param \OcLanguage $language
     *
     * @return OcFilterGroup
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


}
