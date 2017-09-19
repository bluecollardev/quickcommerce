<?php


/**
 * OcApiIp
 *
 * @ORM\Table(name="oc2_api_ip", indexes={@ORM\Index(name="IDX_11A4283B54963938",
 * columns={"api_id"})})
 * @ORM\Entity
 */
class OcApiIp
{

    /**
     * @var string
     *
     * @ORM\Column(name="ip", type="string", length=40, nullable=false)
     */
    private $ip = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="api_ip_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $apiIpId = null;

    /**
     * @var \OcApi
     *
     * @ORM\ManyToOne(targetEntity="OcApi")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="api_id", referencedColumnName="api_id")
     * })
     */
    private $api = null;

    /**
     * Set ip
     *
     * @param string $ip
     *
     * @return OcApiIp
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
     * Get apiIpId
     *
     * @return integer
     */
    public function getApiIpId()
    {
        return $this->apiIpId;
    }

    /**
     * Set api
     *
     * @param \OcApi $api
     *
     * @return OcApiIp
     */
    public function setApi(\OcApi $api = null)
    {
        $this->api = $api;

        return $this;
    }

    /**
     * Get api
     *
     * @return \OcApi
     */
    public function getApi()
    {
        return $this->api;
    }


}
