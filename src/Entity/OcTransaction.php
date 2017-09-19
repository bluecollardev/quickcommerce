<?php


/**
 * OcTransaction
 *
 * @ORM\Table(name="oc2_qctr", indexes={@ORM\Index(name="IDX_1864E5A1B092A811",
 * columns={"store_id"}), @ORM\Index(name="IDX_1864E5A138248176",
 * columns={"currency_id"})})
 * @ORM\Entity
 */
class OcTransaction
{

    /**
     * @var integer
     *
     * @ORM\Column(name="oc_entity_id", type="integer", nullable=true)
     */
    private $ocEntityId = null;

    /**
     * @var string
     *
     * @ORM\Column(name="store_name", type="string", length=64, nullable=false)
     */
    private $storeName = null;

    /**
     * @var string
     *
     * @ORM\Column(name="store_url", type="string", length=255, nullable=false)
     */
    private $storeUrl = null;

    /**
     * @var string
     *
     * @ORM\Column(name="currency_code", type="string", length=3, nullable=false)
     */
    private $currencyCode = null;

    /**
     * @var string
     *
     * @ORM\Column(name="currency_value", type="decimal", precision=15, scale=8,
     * nullable=false)
     */
    private $currencyValue = '1.00000000';

    /**
     * @var string
     *
     * @ORM\Column(name="ip", type="string", length=40, nullable=false)
     */
    private $ip = null;

    /**
     * @var string
     *
     * @ORM\Column(name="forwarded_ip", type="string", length=40, nullable=false)
     */
    private $forwardedIp = null;

    /**
     * @var string
     *
     * @ORM\Column(name="user_agent", type="string", length=255, nullable=false)
     */
    private $userAgent = null;

    /**
     * @var string
     *
     * @ORM\Column(name="accept_language", type="string", length=255, nullable=false)
     */
    private $acceptLanguage = null;

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
     * @ORM\Column(name="transaction_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $transactionId = null;

	private $storeId = null;
	private $currencyId = null;
	
    /**
     * @var \OcStore
     *
     * @ORM\ManyToOne(targetEntity="OcStore")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="store_id", referencedColumnName="store_id")
     * })
     */
    private $store = null;

    /**
     * @var \OcCurrency
     *
     * @ORM\ManyToOne(targetEntity="OcCurrency")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="currency_id", referencedColumnName="currency_id")
     * })
     */
    private $currency = null;

    /**
     * Set ocEntityId
     *
     * @param integer $ocEntityId
     *
     * @return OcTransaction
     */
    public function setOcEntityId($ocEntityId)
    {
        $this->ocEntityId = $ocEntityId;

        return $this;
    }

    /**
     * Get ocEntityId
     *
     * @return integer
     */
    public function getOcEntityId()
    {
        return $this->ocEntityId;
    }
	
	/**
     * Get storeId
     *
     * @return integer
     */
    public function getStoreId()
    {
        return $this->storeId;
    }
	
	/**
     * Set storeId
     *
     * @param integer $storeId
     *
     * @return OcTransaction
     */
    public function setStoreId($storeId)
    {
        $this->storeId = $storeId;

        return $this;
    }

    /**
     * Set storeName
     *
     * @param string $storeName
     *
     * @return OcTransaction
     */
    public function setStoreName($storeName)
    {
        $this->storeName = $storeName;

        return $this;
    }

    /**
     * Get storeName
     *
     * @return string
     */
    public function getStoreName()
    {
        return $this->storeName;
    }

    /**
     * Set storeUrl
     *
     * @param string $storeUrl
     *
     * @return OcTransaction
     */
    public function setStoreUrl($storeUrl)
    {
        $this->storeUrl = $storeUrl;

        return $this;
    }

    /**
     * Get storeUrl
     *
     * @return string
     */
    public function getStoreUrl()
    {
        return $this->storeUrl;
    }
	
	/**
     * Get currencyId
     *
     * @return integer
     */
    public function getCurrencyId()
    {
        return $this->currencyId;
    }
	
	/**
     * Set currencyId
     *
     * @param integer $currencyId
     *
     * @return OcTransaction
     */
    public function setCurrencyId($currencyId)
    {
        $this->currencyId = $currencyId;

        return $this;
    }

    /**
     * Set currencyCode
     *
     * @param string $currencyCode
     *
     * @return OcTransaction
     */
    public function setCurrencyCode($currencyCode)
    {
        $this->currencyCode = $currencyCode;

        return $this;
    }

    /**
     * Get currencyCode
     *
     * @return string
     */
    public function getCurrencyCode()
    {
        return $this->currencyCode;
    }

    /**
     * Set currencyValue
     *
     * @param string $currencyValue
     *
     * @return OcTransaction
     */
    public function setCurrencyValue($currencyValue)
    {
        $this->currencyValue = $currencyValue;

        return $this;
    }

    /**
     * Get currencyValue
     *
     * @return string
     */
    public function getCurrencyValue()
    {
        return $this->currencyValue;
    }

    /**
     * Set ip
     *
     * @param string $ip
     *
     * @return OcTransaction
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
     * Set forwardedIp
     *
     * @param string $forwardedIp
     *
     * @return OcTransaction
     */
    public function setForwardedIp($forwardedIp)
    {
        $this->forwardedIp = $forwardedIp;

        return $this;
    }

    /**
     * Get forwardedIp
     *
     * @return string
     */
    public function getForwardedIp()
    {
        return $this->forwardedIp;
    }

    /**
     * Set userAgent
     *
     * @param string $userAgent
     *
     * @return OcTransaction
     */
    public function setUserAgent($userAgent)
    {
        $this->userAgent = $userAgent;

        return $this;
    }

    /**
     * Get userAgent
     *
     * @return string
     */
    public function getUserAgent()
    {
        return $this->userAgent;
    }

    /**
     * Set acceptLanguage
     *
     * @param string $acceptLanguage
     *
     * @return OcTransaction
     */
    public function setAcceptLanguage($acceptLanguage)
    {
        $this->acceptLanguage = $acceptLanguage;

        return $this;
    }

    /**
     * Get acceptLanguage
     *
     * @return string
     */
    public function getAcceptLanguage()
    {
        return $this->acceptLanguage;
    }

    /**
     * Set dateAdded
     *
     * @param \DateTime $dateAdded
     *
     * @return OcTransaction
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
     * @return OcTransaction
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
     * Get transactionId
     *
     * @return integer
     */
    public function getTransactionId()
    {
        return $this->transactionId;
    }

    /**
     * Set store
     *
     * @param \OcStore $store
     *
     * @return OcTransaction
     */
    public function setStore(\OcStore $store = null)
    {
        $this->store = $store;

        return $this;
    }

    /**
     * Get store
     *
     * @return \OcStore
     */
    public function getStore()
    {
        return $this->store;
    }

    /**
     * Set currency
     *
     * @param \OcCurrency $currency
     *
     * @return OcTransaction
     */
    public function setCurrency(\OcCurrency $currency = null)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * Get currency
     *
     * @return \OcCurrency
     */
    public function getCurrency()
    {
        return $this->currency;
    }
	
	private $invoice = null;
	
	public function getInvoice() {
		return $this->invoice;
	}
	
	public function setInvoice($invoice) {
		return $this->invoice;
	}


}
