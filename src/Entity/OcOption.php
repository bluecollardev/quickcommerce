<?php


/**
 * OcOption
 *
 * @ORM\Table(name="oc2_option")
 * @ORM\Entity
 */
class OcOption
{

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=32, nullable=false)
     */
    private $type = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="sort_order", type="integer", nullable=false)
     */
    private $sortOrder = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="option_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $optionId = null;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="OcLanguage", inversedBy="option")
     * @ORM\JoinTable(name="oc2_option_description",
     *   joinColumns={
     *     @ORM\JoinColumn(name="option_id", referencedColumnName="option_id")
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
     * @ORM\OneToMany(targetEntity="OcOptionDescription", mappedBy="option")
     */
    private $description = null;
	
	/**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="OcOptionValues", mappedBy="option")
     */
    private $optionValues = null;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->description = new \Doctrine\Common\Collections\ArrayCollection();
		$this->optionValues = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return OcOption
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
     * Set sortOrder
     *
     * @param integer $sortOrder
     *
     * @return OcOption
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
     * Get optionId
     *
     * @return integer
     */
    public function getOptionId()
    {
        return $this->optionId;
    }

    /**
     * Add description
     *
     * @param \OcOptionDescription $description
     *
     * @return OcProduct
     */
    public function addDescription(\OcOptionDescription $description)
    {
        $this->description[] = $description;

        return $this;
    }

    /**
     * Remove description
     *
     * @param \OcOptionDescription $description
     */
    public function removeDescription(\OcOptionDescription $description)
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
     * Add optionValues
     *
     * @param \OcOptionValue $optionValue
     *
     * @return OcProduct
     */
    public function addOptionValue(\OcOptionValue $optionValue)
    {
        $this->optionValues[] = $optionValue;

        return $this;
    }

    /**
     * Remove optionValues
     *
     * @param \OcOptionValues $optionValues
     */
    public function removeOptionValue(\OcOptionValue $optionValue)
    {
        $this->optionValues->removeElement($optionValue);
    }

    /**
     * Get optionValues
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOptionValues()
    {
        return $this->optionValues;
    }
}
