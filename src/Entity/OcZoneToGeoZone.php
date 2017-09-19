<?php


/**
 * OcZoneToGeoZone
 *
 * @ORM\Table(name="oc2_zone_to_geo_zone",
 * indexes={@ORM\Index(name="IDX_56C72664F92F3E70", columns={"country_id"}),
 * @ORM\Index(name="IDX_56C726649F2C3FAB", columns={"zone_id"}),
 * @ORM\Index(name="IDX_56C72664283AB2A9", columns={"geo_zone_id"})})
 * @ORM\Entity
 */
class OcZoneToGeoZone
{

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
     * @ORM\Column(name="zone_to_geo_zone_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $zoneToGeoZoneId = null;

    /**
     * @var \OcCountry
     *
     * @ORM\ManyToOne(targetEntity="OcCountry")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="country_id", referencedColumnName="country_id")
     * })
     */
    private $country = null;

    /**
     * @var \OcZone
     *
     * @ORM\ManyToOne(targetEntity="OcZone")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="zone_id", referencedColumnName="zone_id")
     * })
     */
    private $zone = null;

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
     * Set dateAdded
     *
     * @param \DateTime $dateAdded
     *
     * @return OcZoneToGeoZone
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
     * @return OcZoneToGeoZone
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
     * Get zoneToGeoZoneId
     *
     * @return integer
     */
    public function getZoneToGeoZoneId()
    {
        return $this->zoneToGeoZoneId;
    }

    /**
     * Set country
     *
     * @param \OcCountry $country
     *
     * @return OcZoneToGeoZone
     */
    public function setCountry(\OcCountry $country = null)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return \OcCountry
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set zone
     *
     * @param \OcZone $zone
     *
     * @return OcZoneToGeoZone
     */
    public function setZone(\OcZone $zone = null)
    {
        $this->zone = $zone;

        return $this;
    }

    /**
     * Get zone
     *
     * @return \OcZone
     */
    public function getZone()
    {
        return $this->zone;
    }

    /**
     * Set geoZone
     *
     * @param \OcGeoZone $geoZone
     *
     * @return OcZoneToGeoZone
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


}
