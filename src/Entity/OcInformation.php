<?php


/**
 * OcInformation
 *
 * @ORM\Table(name="oc2_information")
 * @ORM\Entity
 */
class OcInformation
{

    /**
     * @var integer
     *
     * @ORM\Column(name="bottom", type="integer", nullable=false)
     */
    private $bottom = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="sort_order", type="integer", nullable=false)
     */
    private $sortOrder = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="status", type="boolean", nullable=false)
     */
    private $status = '1';

    /**
     * @var integer
     *
     * @ORM\Column(name="information_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $informationId = null;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="OcStore", inversedBy="information")
     * @ORM\JoinTable(name="oc2_information_to_store",
     *   joinColumns={
     *     @ORM\JoinColumn(name="information_id",
     * referencedColumnName="information_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="store_id", referencedColumnName="store_id")
     *   }
     * )
     */
    private $store = null;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="OcLanguage", inversedBy="information")
     * @ORM\JoinTable(name="oc2_information_description",
     *   joinColumns={
     *     @ORM\JoinColumn(name="information_id",
     * referencedColumnName="information_id")
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
        $this->store = new \Doctrine\Common\Collections\ArrayCollection();
        $this->language = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set bottom
     *
     * @param integer $bottom
     *
     * @return OcInformation
     */
    public function setBottom($bottom)
    {
        $this->bottom = $bottom;

        return $this;
    }

    /**
     * Get bottom
     *
     * @return integer
     */
    public function getBottom()
    {
        return $this->bottom;
    }

    /**
     * Set sortOrder
     *
     * @param integer $sortOrder
     *
     * @return OcInformation
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
     * Set status
     *
     * @param boolean $status
     *
     * @return OcInformation
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
     * Get informationId
     *
     * @return integer
     */
    public function getInformationId()
    {
        return $this->informationId;
    }

    /**
     * Add store
     *
     * @param \OcStore $store
     *
     * @return OcInformation
     */
    public function addStore(\OcStore $store)
    {
        $this->store[] = $store;

        return $this;
    }

    /**
     * Remove store
     *
     * @param \OcStore $store
     */
    public function removeStore(\OcStore $store)
    {
        $this->store->removeElement($store);
    }

    /**
     * Get store
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getStore()
    {
        return $this->store;
    }

    /**
     * Add language
     *
     * @param \OcLanguage $language
     *
     * @return OcInformation
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
