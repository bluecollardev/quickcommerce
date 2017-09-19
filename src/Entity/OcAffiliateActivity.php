<?php


/**
 * OcAffiliateActivity
 *
 * @ORM\Table(name="oc2_affiliate_activity",
 * indexes={@ORM\Index(name="IDX_F0A5AEEB9F12C49A", columns={"affiliate_id"})})
 * @ORM\Entity
 */
class OcAffiliateActivity
{

    /**
     * @var string
     *
     * @ORM\Column(name="key", type="string", length=64, nullable=false)
     */
    private $key = null;

    /**
     * @var string
     *
     * @ORM\Column(name="data", type="text", length=65535, nullable=false)
     */
    private $data = null;

    /**
     * @var string
     *
     * @ORM\Column(name="ip", type="string", length=40, nullable=false)
     */
    private $ip = null;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_added", type="datetime", nullable=false)
     */
    private $dateAdded = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="activity_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $activityId = null;

    /**
     * @var \OcAffiliate
     *
     * @ORM\ManyToOne(targetEntity="OcAffiliate")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="affiliate_id", referencedColumnName="affiliate_id")
     * })
     */
    private $affiliate = null;

    /**
     * Set key
     *
     * @param string $key
     *
     * @return OcAffiliateActivity
     */
    public function setKey($key)
    {
        $this->key = $key;

        return $this;
    }

    /**
     * Get key
     *
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Set data
     *
     * @param string $data
     *
     * @return OcAffiliateActivity
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get data
     *
     * @return string
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set ip
     *
     * @param string $ip
     *
     * @return OcAffiliateActivity
     */
    public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Get ip
     *
     * @return string
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Set dateAdded
     *
     * @param \DateTime $dateAdded
     *
     * @return OcAffiliateActivity
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
     * Get activityId
     *
     * @return integer
     */
    public function getActivityId()
    {
        return $this->activityId;
    }

    /**
     * Set affiliate
     *
     * @param \OcAffiliate $affiliate
     *
     * @return OcAffiliateActivity
     */
    public function setAffiliate(\OcAffiliate $affiliate = null)
    {
        $this->affiliate = $affiliate;

        return $this;
    }

    /**
     * Get affiliate
     *
     * @return \OcAffiliate
     */
    public function getAffiliate()
    {
        return $this->affiliate;
    }


}
