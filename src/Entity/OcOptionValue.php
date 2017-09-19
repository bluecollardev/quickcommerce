<?php


/**
 * OcOptionValue
 *
 * @ORM\Table(name="oc2_option_value",
 * indexes={@ORM\Index(name="IDX_406AEE1CA7C41D6F", columns={"option_id"})})
 * @ORM\Entity
 */
class OcOptionValue
{

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=false)
     */
    private $image = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="sort_order", type="integer", nullable=false)
     */
    private $sortOrder = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="option_value_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $optionValueId = null;

    /**
     * @var \OcOption
     *
     * @ORM\ManyToOne(targetEntity="OcOption")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="option_id", referencedColumnName="option_id")
     * })
     */
    private $option = null;
	
	/**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="OcOptionDescription", mappedBy="option")
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
     * Set image
     *
     * @param string $image
     *
     * @return OcOptionValue
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set sortOrder
     *
     * @param integer $sortOrder
     *
     * @return OcOptionValue
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
     * Get optionValueId
     *
     * @return integer
     */
    public function getOptionValueId()
    {
        return $this->optionValueId;
    }

    /**
     * Set option
     *
     * @param \OcOption $option
     *
     * @return OcOptionValue
     */
    public function setOption(\OcOption $option = null)
    {
        $this->option = $option;

        return $this;
    }

    /**
     * Get option
     *
     * @return \OcOption
     */
    public function getOption()
    {
        return $this->option;
    }
	
	/**
     * Add description
     *
     * @param \OcOptionValueDescription $description
     *
     * @return OcProduct
     */
    public function addDescription(\OcOptionValueDescription $description)
    {
        $this->description[] = $description;

        return $this;
    }

    /**
     * Remove description
     *
     * @param \OcOptionValueDescription $description
     */
    public function removeDescription(\OcOptionValueDescription $description)
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
