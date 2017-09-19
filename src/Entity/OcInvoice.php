<?php


/**
 * OcInvoice
 *
 * @ORM\Table(name="oc2_qctr_invoice",
 * indexes={@ORM\Index(name="IDX_1864E5A19395C3F3", columns={"customer_id"}),
 * @ORM\Index(name="IDX_1864E5A1D7707B45", columns={"invoice_status_id"})})
 * @ORM\Entity
 */
class OcInvoice
{

    /**
     * @var integer
     *
     * @ORM\Column(name="transaction_id", type="integer", nullable=false)
     */
    private $transactionId = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="feed_id", type="integer", nullable=false)
     */
    private $feedId = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="oc_entity_id", type="integer", nullable=false)
     */
    private $ocEntityId = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="invoice_no", type="integer", nullable=false)
     */
    private $invoiceNo = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="invoice_prefix", type="string", length=26, nullable=false)
     */
    private $invoicePrefix = null;

    /**
     * @var string
     *
     * @ORM\Column(name="bill_email", type="string", length=96)
     */
    private $billEmail = null;
    private $billTelephone = null;
    private $billFax = null;
	
	private $firstname = null;
	private $lastname = null;
	
	private $billAddrFirstname = null;
	private $billAddrLastname = null;
	private $billAddrCompany = null;
	private $shipAddrFirstname = null;
	private $shipAddrLastname = null;
	private $shipAddrCompany = null;

    /**
     * @var string
     *
     * @ORM\Column(name="bill_addr_line_1", type="string", length=128, nullable=false)
     */
    private $billAddrLine1 = null;

    /**
     * @var string
     *
     * @ORM\Column(name="bill_addr_line_2", type="string", length=128, nullable=false)
     */
    private $billAddrLine2 = null;

    /**
     * @var string
     *
     * @ORM\Column(name="bill_addr_city", type="string", length=128, nullable=false)
     */
    private $billAddrCity = null;

    /**
     * @var string
     *
     * @ORM\Column(name="bill_addr_postcode", type="string", length=10, nullable=false)
     */
    private $billAddrPostcode = null;

    /**
     * @var string
     *
     * @ORM\Column(name="bill_addr_country", type="string", length=128, nullable=false)
     */
    private $billAddrCountry = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="bill_addr_country_id", type="integer", nullable=false)
     */
    private $billAddrCountryId = null;

    /**
     * @var string
     *
     * @ORM\Column(name="bill_addr_zone", type="string", length=128, nullable=false)
     */
    private $billAddrZone = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="bill_addr_zone_id", type="integer", nullable=false)
     */
    private $billAddrZoneId = null;

    /**
     * @var string
     *
     * @ORM\Column(name="payment_method", type="string", length=128, nullable=false)
     */
    private $paymentMethod = null;

    /**
     * @var string
     *
     * @ORM\Column(name="payment_code", type="string", length=128, nullable=false)
     */
    private $paymentCode = null;

    /**
     * @var string
     *
     * @ORM\Column(name="ship_addr_line_1", type="string", length=128, nullable=false)
     */
    private $shipAddrLine1 = null;

    /**
     * @var string
     *
     * @ORM\Column(name="ship_addr_line_2", type="string", length=128, nullable=false)
     */
    private $shipAddrLine2 = null;

    /**
     * @var string
     *
     * @ORM\Column(name="ship_addr_city", type="string", length=128, nullable=false)
     */
    private $shipAddrCity = null;

    /**
     * @var string
     *
     * @ORM\Column(name="ship_addr_postcode", type="string", length=10, nullable=false)
     */
    private $shipAddrPostcode = null;

    /**
     * @var string
     *
     * @ORM\Column(name="ship_addr_country", type="string", length=128, nullable=false)
     */
    private $shipAddrCountry = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="ship_addr_country_id", type="integer", nullable=false)
     */
    private $shipAddrCountryId = null;

    /**
     * @var string
     *
     * @ORM\Column(name="ship_addr_zone", type="string", length=128, nullable=false)
     */
    private $shipAddrZone = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="ship_addr_zone_id", type="integer", nullable=false)
     */
    private $shipAddrZoneId = null;

    /**
     * @var string
     *
     * @ORM\Column(name="shipping_method", type="string", length=128, nullable=false)
     */
    private $shippingMethod = null;

    /**
     * @var string
     *
     * @ORM\Column(name="shipping_code", type="string", length=128, nullable=false)
     */
    private $shippingCode = null;

    /**
     * @var string
     *
     * @ORM\Column(name="customer_memo", type="text", length=65535, nullable=false)
     */
    private $customerMemo = null;

    /**
     * @var string
     *
     * @ORM\Column(name="statement_memo", type="text", length=65535, nullable=false)
     */
    private $statementMemo = null;

    /**
     * @var string
     *
     * @ORM\Column(name="total", type="decimal", precision=15, scale=4, nullable=false)
     */
    private $total = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="balance", type="decimal", precision=15, scale=4,
     * nullable=false)
     */
    private $balance = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="deposit", type="decimal", precision=15, scale=4,
     * nullable=false)
     */
    private $deposit = '0.0000';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="invoice_date", type="datetime", nullable=false)
     */
    private $invoiceDate = null;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="due_date", type="datetime", nullable=false)
     */
    private $dueDate = null;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ship_date", type="datetime", nullable=false)
     */
    private $shipDate = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="invoice_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $invoiceId = null;
	
	private $invoiceStatus = null;

    /**
     * @var \OcTransaction
     *
     * @ORM\OneToOne(targetEntity="OcTransaction")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="transaction_id", referencedColumnName="transaction_id",
     * unique=true)
     * })
     */
    private $transaction = null;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="OcInvoiceLine", mappedBy="")
     */
    private $lines = null;

    /**
     * @var \OcCustomer
     *
     * @ORM\ManyToOne(targetEntity="OcCustomer")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="customer_id", referencedColumnName="customer_id")
     * })
     */
    private $customer = null;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->lines = new \Doctrine\Common\Collections\ArrayCollection();
    }
	
	/**
     * Set 
     *
     * @param string $
     *
     * @return OcInvoice
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get 
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }
	
	/**
     * Set 
     *
     * @param string $
     *
     * @return OcInvoice
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get 
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }
	
	/**
     * Set 
     *
     * @param string $
     *
     * @return OcInvoice
     */
    public function setBillAddrFirstname($billAddrFirstname)
    {
        $this->billAddrFirstname = $billAddrFirstname;

        return $this;
    }

    /**
     * Get 
     *
     * @return string
     */
    public function getBillAddrFirstname()
    {
        return $this->billAddrFirstname;
	}
	
	/**
     * Set 
     *
     * @param string $
     *
     * @return OcInvoice
     */
    public function setBillAddrLastname($billAddrLastname)
    {
        $this->billAddrLastname = $billAddrLastname;

        return $this;
    }

    /**
     * Get 
     *
     * @return string
     */
    public function getBillAddrLastname()
    {
        return $this->billAddrLastname;
	}
	
	/**
     * Set 
     *
     * @param string $
     *
     * @return OcInvoice
     */
    public function setBillAddrCompany($billAddrCompany)
    {
        $this->billAddrCompany = $billAddrCompany;

        return $this;
    }

    /**
     * Get 
     *
     * @return string
     */
    public function getBillAddrCompany()
    {
        return $this->billAddrCompany;
	}
	
	/**
     * Set 
     *
     * @param string $
     *
     * @return OcInvoice
     */
    public function setShipAddrFirstname($shipAddrFirstname)
    {
        $this->shipAddrFirstname = $shipAddrFirstname;

        return $this;
    }

    /**
     * Get 
     *
     * @return string
     */
    public function getShipAddrFirstname()
    {
        return $this->shipAddrFirstname;
	}
	
	/**
     * Set 
     *
     * @param string $
     *
     * @return OcInvoice
     */
    public function setShipAddrLastname($shipAddrLastname)
    {
        $this->shipAddrLastname = $shipAddrLastname;

        return $this;
    }

    /**
     * Get 
     *
     * @return string
     */
    public function getShipAddrLastname()
    {
        return $this->shipAddrLastname;
	}
	
	/**
     * Set 
     *
     * @param string $
     *
     * @return OcInvoice
     */
    public function setShipAddrCompany($shipAddrCompany)
    {
        $this->shipAddrCompany = $shipAddrCompany;

        return $this;
    }

    /**
     * Get 
     *
     * @return string
     */
    public function getShipAddrCompany()
    {
        return $this->shipAddrCompany;
	}

    /**
     * Set transactionId
     *
     * @param integer $transactionId
     *
     * @return OcInvoice
     */
    public function setTransactionId($transactionId)
    {
        $this->transactionId = $transactionId;

        return $this;
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
     * Set feedId
     *
     * @param integer $feedId
     *
     * @return OcInvoice
     */
    public function setFeedId($feedId)
    {
        $this->feedId = $feedId;

        return $this;
    }

    /**
     * Get feedId
     *
     * @return integer
     */
    public function getFeedId()
    {
        return $this->feedId;
    }

    /**
     * Set ocEntityId
     *
     * @param integer $ocEntityId
     *
     * @return OcInvoice
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
     * Set invoiceNo
     *
     * @param integer $invoiceNo
     *
     * @return OcInvoice
     */
    public function setInvoiceNo($invoiceNo)
    {
        $this->invoiceNo = $invoiceNo;

        return $this;
    }

    /**
     * Get invoiceNo
     *
     * @return integer
     */
    public function getInvoiceNo()
    {
        return $this->invoiceNo;
    }

    /**
     * Set invoicePrefix
     *
     * @param string $invoicePrefix
     *
     * @return OcInvoice
     */
    public function setInvoicePrefix($invoicePrefix)
    {
        $this->invoicePrefix = $invoicePrefix;

        return $this;
    }

    /**
     * Get invoicePrefix
     *
     * @return string
     */
    public function getInvoicePrefix()
    {
        return $this->invoicePrefix;
    }

    /**
     * Set billEmail
     *
     * @param string $billEmail
     *
     * @return OcInvoice
     */
    public function setBillEmail($billEmail)
    {
        $this->billEmail = $billEmail;

        return $this;
    }

    /**
     * Get billEmail
     *
     * @return string
     */
    public function getBillEmail()
    {
        return $this->billEmail;
    }
	
	/**
     * Set billTelephone
     *
     * @param string $billTelephone
     *
     * @return OcInvoice
     */
    public function setBillTelephone($billTelephone)
    {
        $this->billTelephone = $billTelephone;

        return $this;
    }
	
	/**
     * Get billTelephone
     *
     * @return string
     */
    public function getBillTelephone()
    {
        return $this->billTelephone;
    }
	
	/**
     * Set billFax
     *
     * @param string $billFax
     *
     * @return OcInvoice
     */
    public function setBillFax($billFax)
    {
        $this->billFax = $billFax;

        return $this;
    }
	
	/**
     * Get billFax
     *
     * @return string
     */
    public function getBillFax()
    {
        return $this->billFax;
    }

    /**
     * Set billAddr1
     *
     * @param string $billAddr1
     *
     * @return OcInvoice
     */
    public function setBillAddrLine1($billAddrLine1)
    {
        $this->billAddrLine1 = $billAddrLine1;

        return $this;
    }

    /**
     * Get billAddrLine1
     *
     * @return string
     */
    public function getBillAddrLine1()
    {
        return $this->billAddrLine1;
    }

    /**
     * Set billAddr2
     *
     * @param string $billAddr2
     *
     * @return OcInvoice
     */
    public function setBillAddrLine2($billAddrLine2)
    {
        $this->billAddrLine2 = $billAddrLine2;

        return $this;
    }

    /**
     * Get billAddr2
     *
     * @return string
     */
    public function getBillAddrLine2()
    {
        return $this->billAddrLine2;
    }

    /**
     * Set billAddrCity
     *
     * @param string $billAddrCity
     *
     * @return OcInvoice
     */
    public function setBillAddrCity($billAddrCity)
    {
        $this->billAddrCity = $billAddrCity;

        return $this;
    }

    /**
     * Get billAddrCity
     *
     * @return string
     */
    public function getBillAddrCity()
    {
        return $this->billAddrCity;
    }

    /**
     * Set billAddrPostcode
     *
     * @param string $billAddrPostcode
     *
     * @return OcInvoice
     */
    public function setBillAddrPostcode($billAddrPostcode)
    {
        $this->billAddrPostcode = $billAddrPostcode;

        return $this;
    }

    /**
     * Get billAddrPostcode
     *
     * @return string
     */
    public function getBillAddrPostcode()
    {
        return $this->billAddrPostcode;
    }

    /**
     * Set billAddrCountry
     *
     * @param string $billAddrCountry
     *
     * @return OcInvoice
     */
    public function setBillAddrCountry($billAddrCountry)
    {
        $this->billAddrCountry = $billAddrCountry;

        return $this;
    }

    /**
     * Get billAddrCountry
     *
     * @return string
     */
    public function getBillAddrCountry()
    {
        return $this->billAddrCountry;
    }

    /**
     * Set billAddrCountryId
     *
     * @param integer $billAddrCountryId
     *
     * @return OcInvoice
     */
    public function setBillAddrCountryId($billAddrCountryId)
    {
        $this->billAddrCountryId = $billAddrCountryId;

        return $this;
    }

    /**
     * Get billAddrCountryId
     *
     * @return integer
     */
    public function getBillAddrCountryId()
    {
        return $this->billAddrCountryId;
    }

    /**
     * Set billAddrZone
     *
     * @param string $billAddrZone
     *
     * @return OcInvoice
     */
    public function setBillAddrZone($billAddrZone)
    {
        $this->billAddrZone = $billAddrZone;

        return $this;
    }

    /**
     * Get billAddrZone
     *
     * @return string
     */
    public function getBillAddrZone()
    {
        return $this->billAddrZone;
    }

    /**
     * Set billAddrZoneId
     *
     * @param integer $billAddrZoneId
     *
     * @return OcInvoice
     */
    public function setBillAddrZoneId($billAddrZoneId)
    {
        $this->billAddrZoneId = $billAddrZoneId;

        return $this;
    }

    /**
     * Get billAddrZoneId
     *
     * @return integer
     */
    public function getBillAddrZoneId()
    {
        return $this->billAddrZoneId;
    }

    /**
     * Set paymentMethod
     *
     * @param string $paymentMethod
     *
     * @return OcInvoice
     */
    public function setPaymentMethod($paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;

        return $this;
    }

    /**
     * Get paymentMethod
     *
     * @return string
     */
    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }

    /**
     * Set paymentCode
     *
     * @param string $paymentCode
     *
     * @return OcInvoice
     */
    public function setPaymentCode($paymentCode)
    {
        $this->paymentCode = $paymentCode;

        return $this;
    }

    /**
     * Get paymentCode
     *
     * @return string
     */
    public function getPaymentCode()
    {
        return $this->paymentCode;
    }

    /**
     * Set shipAddrLine1
     *
     * @param string $shipAddrLine1
     *
     * @return OcInvoice
     */
    public function setShipAddrLine1($shipAddrLine1)
    {
        $this->shipAddrLine1 = $shipAddrLine1;

        return $this;
    }

    /**
     * Get shipAddrLine1
     *
     * @return string
     */
    public function getShipAddrLine1()
    {
        return $this->shipAddrLine1;
    }

    /**
     * Set shipAddrLine2
     *
     * @param string $shipAddrLine2
     *
     * @return OcInvoice
     */
    public function setShipAddrLine2($shipAddrLine2)
    {
        $this->shipAddrLine2 = $shipAddrLine2;

        return $this;
    }

    /**
     * Get shipAddrLine2
     *
     * @return string
     */
    public function getShipAddrLine2()
    {
        return $this->shipAddrLine2;
    }

    /**
     * Set shipAddrCity
     *
     * @param string $shipAddrCity
     *
     * @return OcInvoice
     */
    public function setShipAddrCity($shipAddrCity)
    {
        $this->shipAddrCity = $shipAddrCity;

        return $this;
    }

    /**
     * Get shipAddrCity
     *
     * @return string
     */
    public function getShipAddrCity()
    {
        return $this->shipAddrCity;
    }

    /**
     * Set shipAddrPostcode
     *
     * @param string $shipAddrPostcode
     *
     * @return OcInvoice
     */
    public function setShipAddrPostcode($shipAddrPostcode)
    {
        $this->shipAddrPostcode = $shipAddrPostcode;

        return $this;
    }

    /**
     * Get shipAddrPostcode
     *
     * @return string
     */
    public function getShipAddrPostcode()
    {
        return $this->shipAddrPostcode;
    }

    /**
     * Set shipAddrCountry
     *
     * @param string $shipAddrCountry
     *
     * @return OcInvoice
     */
    public function setShipAddrCountry($shipAddrCountry)
    {
        $this->shipAddrCountry = $shipAddrCountry;

        return $this;
    }

    /**
     * Get shipAddrCountry
     *
     * @return string
     */
    public function getShipAddrCountry()
    {
        return $this->shipAddrCountry;
    }

    /**
     * Set shipAddrCountryId
     *
     * @param integer $shipAddrCountryId
     *
     * @return OcInvoice
     */
    public function setShipAddrCountryId($shipAddrCountryId)
    {
        $this->shipAddrCountryId = $shipAddrCountryId;

        return $this;
    }

    /**
     * Get shipAddrCountryId
     *
     * @return integer
     */
    public function getShipAddrCountryId()
    {
        return $this->shipAddrCountryId;
    }

    /**
     * Set shipAddrZone
     *
     * @param string $shipAddrZone
     *
     * @return OcInvoice
     */
    public function setShipAddrZone($shipAddrZone)
    {
        $this->shipAddrZone = $shipAddrZone;

        return $this;
    }

    /**
     * Get shipAddrZone
     *
     * @return string
     */
    public function getShipAddrZone()
    {
        return $this->shipAddrZone;
    }

    /**
     * Set shipAddrZoneId
     *
     * @param integer $shipAddrZoneId
     *
     * @return OcInvoice
     */
    public function setShipAddrZoneId($shipAddrZoneId)
    {
        $this->shipAddrZoneId = $shipAddrZoneId;

        return $this;
    }

    /**
     * Get shipAddrZoneId
     *
     * @return integer
     */
    public function getShipAddrZoneId()
    {
        return $this->shipAddrZoneId;
    }

    /**
     * Set shippingMethod
     *
     * @param string $shippingMethod
     *
     * @return OcInvoice
     */
    public function setShippingMethod($shippingMethod)
    {
        $this->shippingMethod = $shippingMethod;

        return $this;
    }

    /**
     * Get shippingMethod
     *
     * @return string
     */
    public function getShippingMethod()
    {
        return $this->shippingMethod;
    }

    /**
     * Set shippingCode
     *
     * @param string $shippingCode
     *
     * @return OcInvoice
     */
    public function setShippingCode($shippingCode)
    {
        $this->shippingCode = $shippingCode;

        return $this;
    }

    /**
     * Get shippingCode
     *
     * @return string
     */
    public function getShippingCode()
    {
        return $this->shippingCode;
    }

    /**
     * Set customerMemo
     *
     * @param string $customerMemo
     *
     * @return OcInvoice
     */
    public function setCustomerMemo($customerMemo)
    {
        $this->customerMemo = $customerMemo;

        return $this;
    }

    /**
     * Get customerMemo
     *
     * @return string
     */
    public function getCustomerMemo()
    {
        return $this->customerMemo;
    }

    /**
     * Set statementMemo
     *
     * @param string $statementMemo
     *
     * @return OcInvoice
     */
    public function setStatementMemo($statementMemo)
    {
        $this->statementMemo = $statementMemo;

        return $this;
    }

    /**
     * Get statementMemo
     *
     * @return string
     */
    public function getStatementMemo()
    {
        return $this->statementMemo;
    }

    /**
     * Set total
     *
     * @param string $total
     *
     * @return OcInvoice
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get total
     *
     * @return string
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set balance
     *
     * @param string $balance
     *
     * @return OcInvoice
     */
    public function setBalance($balance)
    {
        $this->balance = $balance;

        return $this;
    }

    /**
     * Get balance
     *
     * @return string
     */
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * Set deposit
     *
     * @param string $deposit
     *
     * @return OcInvoice
     */
    public function setDeposit($deposit)
    {
        $this->deposit = $deposit;

        return $this;
    }

    /**
     * Get deposit
     *
     * @return string
     */
    public function getDeposit()
    {
        return $this->deposit;
    }

    /**
     * Set invoiceDate
     *
     * @param \DateTime $invoiceDate
     *
     * @return OcInvoice
     */
    public function setInvoiceDate($invoiceDate)
    {
        $this->invoiceDate = $invoiceDate;

        return $this;
    }

    /**
     * Get invoiceDate
     *
     * @return \DateTime
     */
    public function getInvoiceDate()
    {
        return $this->invoiceDate;
    }

    /**
     * Set dueDate
     *
     * @param \DateTime $dueDate
     *
     * @return OcInvoice
     */
    public function setDueDate($dueDate)
    {
        $this->dueDate = $dueDate;

        return $this;
    }

    /**
     * Get dueDate
     *
     * @return \DateTime
     */
    public function getDueDate()
    {
        return $this->dueDate;
    }

    /**
     * Set shipDate
     *
     * @param \DateTime $shipDate
     *
     * @return OcInvoice
     */
    public function setShipDate($shipDate)
    {
        $this->shipDate = $shipDate;

        return $this;
    }

    /**
     * Get shipDate
     *
     * @return \DateTime
     */
    public function getShipDate()
    {
        return $this->shipDate;
    }

    /**
     * Get invoiceId
     *
     * @return integer
     */
    public function getInvoiceId()
    {
        return $this->invoiceId;
    }
	
	/**
     * Get invoiceStatusId
     *
     * @return integer
     */
    public function getInvoiceStatus()
    {
        return $this->invoiceStatus;
    }
	
	/**
     * Set invoiceStatusId
     *
     * @return OcInvoice
     */
    public function setInvoiceStatus($invoiceStatus)
    {
        $this->invoiceStatus = $invoiceStatus;
		
		return $this;
    }

    /**
     * Set transaction
     *
     * @param \OcTransaction $transaction
     *
     * @return OcInvoice
     */
    public function setTransaction(\OcTransaction $transaction = null)
    {
        $this->transaction = $transaction;

        return $this;
    }

    /**
     * Get transaction
     *
     * @return \OcTransaction
     */
    public function getTransaction()
    {
        return $this->transaction;
    }

    /**
     * Add line
     *
     * @param \OcInvoiceLine $line
     *
     * @return OcInvoice
     */
    public function addLine(\OcInvoiceLine $line)
    {
        $this->lines[] = $line;

        return $this;
    }

    /**
     * Remove line
     *
     * @param \OcInvoiceLine $line
     */
    public function removeLine(\OcInvoiceLine $line)
    {
        $this->lines->removeElement($line);
    }

    /**
     * Get lines
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLines()
    {
        return $this->lines;
    }

    /**
     * Set customer
     *
     * @param \OcCustomer $customer
     *
     * @return OcInvoice
     */
    public function setCustomer(\OcCustomer $customer = null)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * Get customer
     *
     * @return \OcCustomer
     */
    public function getCustomer()
    {
        return $this->customer;
    }


}
