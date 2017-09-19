<?php


/**
 * OcTaxRate
 *
 * @ORM\Table(name="oc2_tax_rate", indexes={@ORM\Index(name="IDX_99D10D6E283AB2A9",
 * columns={"geo_zone_id"})})
 * @ORM\Entity
 */
class OcTaxRate
{

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=32, nullable=false)
     */
    private $name = null;

    /**
     * @var string
     *
     * @ORM\Column(name="rate", type="decimal", precision=15, scale=4, nullable=false)
     */
    private $rate = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=1, nullable=false)
     */
    private $type = null;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_added", type="datetime", nullable=false)
     */
    private $dateAdded = null;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_modified", type="datetime", nullable=false)
     */
    private $dateModified = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="tax_rate_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $taxRateId = null;

    /**
     * @var \OcGeoZone
     *
     * @ORM\ManyToOne(targetEntity="OcGeoZone")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="geo_zone_id", referencedColumnName="geo_zone_id")
     * })
     */
    private $geoZone = null;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="OcCustomerGroup", inversedBy="taxRate")
     * @ORM\JoinTable(name="oc2_tax_rate_to_customer_group",
     *   joinColumns={
     *     @ORM\JoinColumn(name="tax_rate_id", referencedColumnName="tax_rate_id")
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
        $this->customerGroup = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return OcTaxRate
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
     * Set rate
     *
     * @param string $rate
     *
     * @return OcTaxRate
     */
    public function setRate($rate)
    {
        $this->rate = $rate;

        return $this;
    }

    /**
     * Get rate
     *
     * @return string
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return OcTaxRate
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
     * Set dateAdded
     *
     * @param \DateTime $dateAdded
     *
     * @return OcTaxRate
     */
    public function setDateAdded($dateAdded)
    {
        $this->dateAdded = $dateAdded;

        return $this;
    }

    /**
     * Get dateAdded
     *
     * @return \DateTime
     */
    public function getDateAdded()
    {
        return $this->dateAdded;
    }

    /**
     * Set dateModified
     *
     * @param \DateTime $dateModified
     *
     * @return OcTaxRate
     */
    public function setDateModified($dateModified)
    {
        $this->dateModified = $dateModified;

        return $this;
    }

    /**
     * Get dateModified
     *
     * @return \DateTime
     */
    public function getDateModified()
    {
        return $this->dateModified;
    }

    /**
     * Get taxRateId
     *
     * @return integer
     */
    public function getTaxRateId()
    {
        return $this->taxRateId;
    }

    /**
     * Set geoZone
     *
     * @param \OcGeoZone $geoZone
     *
     * @return OcTaxRate
     */
    public function setGeoZone(\OcGeoZone $geoZone = null)
    {
        $this->geoZone = $geoZone;

        return $this;
    }

    /**
     * Get geoZone
     *
     * @return \OcGeoZone
     */
    public function getGeoZone()
    {
        return $this->geoZone;
    }

    /**
     * Add customerGroup
     *
     * @param \OcCustomerGroup $customerGroup
     *
     * @return OcTaxRate
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
