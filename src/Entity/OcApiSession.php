<?php


/**
 * OcApiSession
 *
 * @ORM\Table(name="oc2_api_session",
 * indexes={@ORM\Index(name="IDX_A0D921AA54963938", columns={"api_id"})})
 * @ORM\Entity
 */
class OcApiSession
{

    /**
     * @var string
     *
     * @ORM\Column(name="token", type="string", length=32, nullable=false)
     */
    private $token = null;

    /**
     * @var string
     *
     * @ORM\Column(name="session_id", type="string", length=32, nullable=false)
     */
    private $sessionId = null;

    /**
     * @var string
     *
     * @ORM\Column(name="session_name", type="string", length=32, nullable=false)
     */
    private $sessionName = null;

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
     * @var \DateTime
     *
     * @ORM\Column(name="date_modified", type="datetime", nullable=false)
     */
    private $dateModified = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="api_session_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $apiSessionId = null;

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
     * Set token
     *
     * @param string $token
     *
     * @return OcApiSession
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Get token
     *
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Set sessionId
     *
     * @param string $sessionId
     *
     * @return OcApiSession
     */
    public function setSessionId($sessionId)
    {
        $this->sessionId = $sessionId;

        return $this;
    }

    /**
     * Get sessionId
     *
     * @return string
     */
    public function getSessionId()
    {
        return $this->sessionId;
    }

    /**
     * Set sessionName
     *
     * @param string $sessionName
     *
     * @return OcApiSession
     */
    public function setSessionName($sessionName)
    {
        $this->sessionName = $sessionName;

        return $this;
    }

    /**
     * Get sessionName
     *
     * @return string
     */
    public function getSessionName()
    {
        return $this->sessionName;
    }

    /**
     * Set ip
     *
     * @param string $ip
     *
     * @return OcApiSession
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
     * @return OcApiSession
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
     * @return OcApiSession
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
     * Get apiSessionId
     *
     * @return integer
     */
    public function getApiSessionId()
    {
        return $this->apiSessionId;
    }

    /**
     * Set api
     *
     * @param \OcApi $api
     *
     * @return OcApiSession
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
