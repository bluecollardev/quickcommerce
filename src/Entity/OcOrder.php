<?php


/**
 * OcOrder
 *
 * @ORM\Table(name="oc2_order", indexes={@ORM\Index(name="IDX_1864E5A1B092A811",
 * columns={"store_id"}), @ORM\Index(name="IDX_1864E5A19395C3F3",
 * columns={"customer_id"}), @ORM\Index(name="IDX_1864E5A1D2919A68",
 * columns={"customer_group_id"}), @ORM\Index(name="IDX_1864E5A1D7707B45",
 * columns={"order_status_id"}), @ORM\Index(name="IDX_1864E5A19F12C49A",
 * columns={"affiliate_id"}), @ORM\Index(name="IDX_1864E5A1C6DCB66C",
 * columns={"marketing_id"}), @ORM\Index(name="IDX_1864E5A182F1BAF4",
 * columns={"language_id"}), @ORM\Index(name="IDX_1864E5A138248176",
 * columns={"currency_id"})})
 * @ORM\Entity
 */
class OcOrder
{

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
     * @ORM\Column(name="firstname", type="string", length=32, nullable=false)
     */
    private $firstname = null;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=32, nullable=false)
     */
    private $lastname = null;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=96, nullable=false)
     */
    private $email = null;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=32, nullable=false)
     */
    private $telephone = null;

    /**
     * @var string
     *
     * @ORM\Column(name="fax", type="string", length=32, nullable=false)
     */
    private $fax = null;

    /**
     * @var string
     *
     * @ORM\Column(name="custom_field", type="text", length=65535, nullable=false)
     */
    private $customField = null;

    /**
     * @var string
     *
     * @ORM\Column(name="payment_firstname", type="string", length=32, nullable=false)
     */
    private $paymentFirstname = null;

    /**
     * @var string
     *
     * @ORM\Column(name="payment_lastname", type="string", length=32, nullable=false)
     */
    private $paymentLastname = null;

    /**
     * @var string
     *
     * @ORM\Column(name="payment_company", type="string", length=40, nullable=false)
     */
    private $paymentCompany = null;

    /**
     * @var string
     *
     * @ORM\Column(name="payment_address_1", type="string", length=128, nullable=false)
     */
    private $paymentAddress1 = null;

    /**
     * @var string
     *
     * @ORM\Column(name="payment_address_2", type="string", length=128, nullable=false)
     */
    private $paymentAddress2 = null;

    /**
     * @var string
     *
     * @ORM\Column(name="payment_city", type="string", length=128, nullable=false)
     */
    private $paymentCity = null;

    /**
     * @var string
     *
     * @ORM\Column(name="payment_postcode", type="string", length=10, nullable=false)
     */
    private $paymentPostcode = null;

    /**
     * @var string
     *
     * @ORM\Column(name="payment_country", type="string", length=128, nullable=false)
     */
    private $paymentCountry = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="payment_country_id", type="integer", nullable=false)
     */
    private $paymentCountryId = null;

    /**
     * @var string
     *
     * @ORM\Column(name="payment_zone", type="string", length=128, nullable=false)
     */
    private $paymentZone = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="payment_zone_id", type="integer", nullable=false)
     */
    private $paymentZoneId = null;

    /**
     * @var string
     *
     * @ORM\Column(name="payment_address_format", type="text", length=65535,
     * nullable=false)
     */
    private $paymentAddressFormat = null;

    /**
     * @var string
     *
     * @ORM\Column(name="payment_custom_field", type="text", length=65535,
     * nullable=false)
     */
    private $paymentCustomField = null;

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
     * @ORM\Column(name="shipping_firstname", type="string", length=32, nullable=false)
     */
    private $shippingFirstname = null;

    /**
     * @var string
     *
     * @ORM\Column(name="shipping_lastname", type="string", length=32, nullable=false)
     */
    private $shippingLastname = null;

    /**
     * @var string
     *
     * @ORM\Column(name="shipping_company", type="string", length=40, nullable=false)
     */
    private $shippingCompany = null;

    /**
     * @var string
     *
     * @ORM\Column(name="shipping_address_1", type="string", length=128,
     * nullable=false)
     */
    private $shippingAddress1 = null;

    /**
     * @var string
     *
     * @ORM\Column(name="shipping_address_2", type="string", length=128,
     * nullable=false)
     */
    private $shippingAddress2 = null;

    /**
     * @var string
     *
     * @ORM\Column(name="shipping_city", type="string", length=128, nullable=false)
     */
    private $shippingCity = null;

    /**
     * @var string
     *
     * @ORM\Column(name="shipping_postcode", type="string", length=10, nullable=false)
     */
    private $shippingPostcode = null;

    /**
     * @var string
     *
     * @ORM\Column(name="shipping_country", type="string", length=128, nullable=false)
     */
    private $shippingCountry = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="shipping_country_id", type="integer", nullable=false)
     */
    private $shippingCountryId = null;

    /**
     * @var string
     *
     * @ORM\Column(name="shipping_zone", type="string", length=128, nullable=false)
     */
    private $shippingZone = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="shipping_zone_id", type="integer", nullable=false)
     */
    private $shippingZoneId = null;

    /**
     * @var string
     *
     * @ORM\Column(name="shipping_address_format", type="text", length=65535,
     * nullable=false)
     */
    private $shippingAddressFormat = null;

    /**
     * @var string
     *
     * @ORM\Column(name="shipping_custom_field", type="text", length=65535,
     * nullable=false)
     */
    private $shippingCustomField = null;

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
     * @ORM\Column(name="comment", type="text", length=65535, nullable=false)
     */
    private $comment = null;

    /**
     * @var string
     *
     * @ORM\Column(name="total", type="decimal", precision=15, scale=4, nullable=false)
     */
    private $total = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="commission", type="decimal", precision=15, scale=4,
     * nullable=false)
     */
    private $commission = null;

    /**
     * @var string
     *
     * @ORM\Column(name="tracking", type="string", length=64, nullable=false)
     */
    private $tracking = null;

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
     * @ORM\Column(name="order_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $orderId = null;

    /**
     * @var \OcMarketing
     *
     * @ORM\ManyToOne(targetEntity="OcMarketing")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="marketing_id", referencedColumnName="marketing_id")
     * })
     */
    private $marketing = null;

    /**
     * @var \OcCustomerGroup
     *
     * @ORM\ManyToOne(targetEntity="OcCustomerGroup")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="customer_group_id",
     * referencedColumnName="customer_group_id")
     * })
     */
    private $customerGroup = null;

    /**
     * @var \OcOrderStatus
     *
     * @ORM\ManyToOne(targetEntity="OcOrderStatus")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="order_status_id",
     * referencedColumnName="order_status_id")
     * })
     */
    private $orderStatus = null;

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
     * @var \OcAffiliate
     *
     * @ORM\ManyToOne(targetEntity="OcAffiliate")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="affiliate_id", referencedColumnName="affiliate_id")
     * })
     */
    private $affiliate = null;

    /**
     * @var \OcLanguage
     *
     * @ORM\ManyToOne(targetEntity="OcLanguage")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="language_id", referencedColumnName="language_id")
     * })
     */
    private $language = null;

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
     * @var \OcCurrency
     *
     * @ORM\ManyToOne(targetEntity="OcCurrency")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="currency_id", referencedColumnName="currency_id")
     * })
     */
    private $currency = null;

    /**
     * Set invoiceNo
     *
     * @param integer $invoiceNo
     *
     * @return OcOrder
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
     * @return OcOrder
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
     * Set storeName
     *
     * @param string $storeName
     *
     * @return OcOrder
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
     * @return OcOrder
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
     * Set firstname
     *
     * @param string $firstname
     *
     * @return OcOrder
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return OcOrder
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return OcOrder
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     *
     * @return OcOrder
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set fax
     *
     * @param string $fax
     *
     * @return OcOrder
     */
    public function setFax($fax)
    {
        $this->fax = $fax;

        return $this;
    }

    /**
     * Get fax
     *
     * @return string
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Set customField
     *
     * @param string $customField
     *
     * @return OcOrder
     */
    public function setCustomField($customField)
    {
        $this->customField = $customField;

        return $this;
    }

    /**
     * Get customField
     *
     * @return string
     */
    public function getCustomField()
    {
        return $this->customField;
    }

    /**
     * Set paymentFirstname
     *
     * @param string $paymentFirstname
     *
     * @return OcOrder
     */
    public function setPaymentFirstname($paymentFirstname)
    {
        $this->paymentFirstname = $paymentFirstname;

        return $this;
    }

    /**
     * Get paymentFirstname
     *
     * @return string
     */
    public function getPaymentFirstname()
    {
        return $this->paymentFirstname;
    }

    /**
     * Set paymentLastname
     *
     * @param string $paymentLastname
     *
     * @return OcOrder
     */
    public function setPaymentLastname($paymentLastname)
    {
        $this->paymentLastname = $paymentLastname;

        return $this;
    }

    /**
     * Get paymentLastname
     *
     * @return string
     */
    public function getPaymentLastname()
    {
        return $this->paymentLastname;
    }

    /**
     * Set paymentCompany
     *
     * @param string $paymentCompany
     *
     * @return OcOrder
     */
    public function setPaymentCompany($paymentCompany)
    {
        $this->paymentCompany = $paymentCompany;

        return $this;
    }

    /**
     * Get paymentCompany
     *
     * @return string
     */
    public function getPaymentCompany()
    {
        return $this->paymentCompany;
    }

    /**
     * Set paymentAddress1
     *
     * @param string $paymentAddress1
     *
     * @return OcOrder
     */
    public function setPaymentAddress1($paymentAddress1)
    {
        $this->paymentAddress1 = $paymentAddress1;

        return $this;
    }

    /**
     * Get paymentAddress1
     *
     * @return string
     */
    public function getPaymentAddress1()
    {
        return $this->paymentAddress1;
    }

    /**
     * Set paymentAddress2
     *
     * @param string $paymentAddress2
     *
     * @return OcOrder
     */
    public function setPaymentAddress2($paymentAddress2)
    {
        $this->paymentAddress2 = $paymentAddress2;

        return $this;
    }

    /**
     * Get paymentAddress2
     *
     * @return string
     */
    public function getPaymentAddress2()
    {
        return $this->paymentAddress2;
    }

    /**
     * Set paymentCity
     *
     * @param string $paymentCity
     *
     * @return OcOrder
     */
    public function setPaymentCity($paymentCity)
    {
        $this->paymentCity = $paymentCity;

        return $this;
    }

    /**
     * Get paymentCity
     *
     * @return string
     */
    public function getPaymentCity()
    {
        return $this->paymentCity;
    }

    /**
     * Set paymentPostcode
     *
     * @param string $paymentPostcode
     *
     * @return OcOrder
     */
    public function setPaymentPostcode($paymentPostcode)
    {
        $this->paymentPostcode = $paymentPostcode;

        return $this;
    }

    /**
     * Get paymentPostcode
     *
     * @return string
     */
    public function getPaymentPostcode()
    {
        return $this->paymentPostcode;
    }

    /**
     * Set paymentCountry
     *
     * @param string $paymentCountry
     *
     * @return OcOrder
     */
    public function setPaymentCountry($paymentCountry)
    {
        $this->paymentCountry = $paymentCountry;

        return $this;
    }

    /**
     * Get paymentCountry
     *
     * @return string
     */
    public function getPaymentCountry()
    {
        return $this->paymentCountry;
    }

    /**
     * Set paymentCountryId
     *
     * @param integer $paymentCountryId
     *
     * @return OcOrder
     */
    public function setPaymentCountryId($paymentCountryId)
    {
        $this->paymentCountryId = $paymentCountryId;

        return $this;
    }

    /**
     * Get paymentCountryId
     *
     * @return integer
     */
    public function getPaymentCountryId()
    {
        return $this->paymentCountryId;
    }

    /**
     * Set paymentZone
     *
     * @param string $paymentZone
     *
     * @return OcOrder
     */
    public function setPaymentZone($paymentZone)
    {
        $this->paymentZone = $paymentZone;

        return $this;
    }

    /**
     * Get paymentZone
     *
     * @return string
     */
    public function getPaymentZone()
    {
        return $this->paymentZone;
    }

    /**
     * Set paymentZoneId
     *
     * @param integer $paymentZoneId
     *
     * @return OcOrder
     */
    public function setPaymentZoneId($paymentZoneId)
    {
        $this->paymentZoneId = $paymentZoneId;

        return $this;
    }

    /**
     * Get paymentZoneId
     *
     * @return integer
     */
    public function getPaymentZoneId()
    {
        return $this->paymentZoneId;
    }

    /**
     * Set paymentAddressFormat
     *
     * @param string $paymentAddressFormat
     *
     * @return OcOrder
     */
    public function setPaymentAddressFormat($paymentAddressFormat)
    {
        $this->paymentAddressFormat = $paymentAddressFormat;

        return $this;
    }

    /**
     * Get paymentAddressFormat
     *
     * @return string
     */
    public function getPaymentAddressFormat()
    {
        return $this->paymentAddressFormat;
    }

    /**
     * Set paymentCustomField
     *
     * @param string $paymentCustomField
     *
     * @return OcOrder
     */
    public function setPaymentCustomField($paymentCustomField)
    {
        $this->paymentCustomField = $paymentCustomField;

        return $this;
    }

    /**
     * Get paymentCustomField
     *
     * @return string
     */
    public function getPaymentCustomField()
    {
        return $this->paymentCustomField;
    }

    /**
     * Set paymentMethod
     *
     * @param string $paymentMethod
     *
     * @return OcOrder
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
     * @return OcOrder
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
     * Set shippingFirstname
     *
     * @param string $shippingFirstname
     *
     * @return OcOrder
     */
    public function setShippingFirstname($shippingFirstname)
    {
        $this->shippingFirstname = $shippingFirstname;

        return $this;
    }

    /**
     * Get shippingFirstname
     *
     * @return string
     */
    public function getShippingFirstname()
    {
        return $this->shippingFirstname;
    }

    /**
     * Set shippingLastname
     *
     * @param string $shippingLastname
     *
     * @return OcOrder
     */
    public function setShippingLastname($shippingLastname)
    {
        $this->shippingLastname = $shippingLastname;

        return $this;
    }

    /**
     * Get shippingLastname
     *
     * @return string
     */
    public function getShippingLastname()
    {
        return $this->shippingLastname;
    }

    /**
     * Set shippingCompany
     *
     * @param string $shippingCompany
     *
     * @return OcOrder
     */
    public function setShippingCompany($shippingCompany)
    {
        $this->shippingCompany = $shippingCompany;

        return $this;
    }

    /**
     * Get shippingCompany
     *
     * @return string
     */
    public function getShippingCompany()
    {
        return $this->shippingCompany;
    }

    /**
     * Set shippingAddress1
     *
     * @param string $shippingAddress1
     *
     * @return OcOrder
     */
    public function setShippingAddress1($shippingAddress1)
    {
        $this->shippingAddress1 = $shippingAddress1;

        return $this;
    }

    /**
     * Get shippingAddress1
     *
     * @return string
     */
    public function getShippingAddress1()
    {
        return $this->shippingAddress1;
    }

    /**
     * Set shippingAddress2
     *
     * @param string $shippingAddress2
     *
     * @return OcOrder
     */
    public function setShippingAddress2($shippingAddress2)
    {
        $this->shippingAddress2 = $shippingAddress2;

        return $this;
    }

    /**
     * Get shippingAddress2
     *
     * @return string
     */
    public function getShippingAddress2()
    {
        return $this->shippingAddress2;
    }

    /**
     * Set shippingCity
     *
     * @param string $shippingCity
     *
     * @return OcOrder
     */
    public function setShippingCity($shippingCity)
    {
        $this->shippingCity = $shippingCity;

        return $this;
    }

    /**
     * Get shippingCity
     *
     * @return string
     */
    public function getShippingCity()
    {
        return $this->shippingCity;
    }

    /**
     * Set shippingPostcode
     *
     * @param string $shippingPostcode
     *
     * @return OcOrder
     */
    public function setShippingPostcode($shippingPostcode)
    {
        $this->shippingPostcode = $shippingPostcode;

        return $this;
    }

    /**
     * Get shippingPostcode
     *
     * @return string
     */
    public function getShippingPostcode()
    {
        return $this->shippingPostcode;
    }

    /**
     * Set shippingCountry
     *
     * @param string $shippingCountry
     *
     * @return OcOrder
     */
    public function setShippingCountry($shippingCountry)
    {
        $this->shippingCountry = $shippingCountry;

        return $this;
    }

    /**
     * Get shippingCountry
     *
     * @return string
     */
    public function getShippingCountry()
    {
        return $this->shippingCountry;
    }

    /**
     * Set shippingCountryId
     *
     * @param integer $shippingCountryId
     *
     * @return OcOrder
     */
    public function setShippingCountryId($shippingCountryId)
    {
        $this->shippingCountryId = $shippingCountryId;

        return $this;
    }

    /**
     * Get shippingCountryId
     *
     * @return integer
     */
    public function getShippingCountryId()
    {
        return $this->shippingCountryId;
    }

    /**
     * Set shippingZone
     *
     * @param string $shippingZone
     *
     * @return OcOrder
     */
    public function setShippingZone($shippingZone)
    {
        $this->shippingZone = $shippingZone;

        return $this;
    }

    /**
     * Get shippingZone
     *
     * @return string
     */
    public function getShippingZone()
    {
        return $this->shippingZone;
    }

    /**
     * Set shippingZoneId
     *
     * @param integer $shippingZoneId
     *
     * @return OcOrder
     */
    public function setShippingZoneId($shippingZoneId)
    {
        $this->shippingZoneId = $shippingZoneId;

        return $this;
    }

    /**
     * Get shippingZoneId
     *
     * @return integer
     */
    public function getShippingZoneId()
    {
        return $this->shippingZoneId;
    }

    /**
     * Set shippingAddressFormat
     *
     * @param string $shippingAddressFormat
     *
     * @return OcOrder
     */
    public function setShippingAddressFormat($shippingAddressFormat)
    {
        $this->shippingAddressFormat = $shippingAddressFormat;

        return $this;
    }

    /**
     * Get shippingAddressFormat
     *
     * @return string
     */
    public function getShippingAddressFormat()
    {
        return $this->shippingAddressFormat;
    }

    /**
     * Set shippingCustomField
     *
     * @param string $shippingCustomField
     *
     * @return OcOrder
     */
    public function setShippingCustomField($shippingCustomField)
    {
        $this->shippingCustomField = $shippingCustomField;

        return $this;
    }

    /**
     * Get shippingCustomField
     *
     * @return string
     */
    public function getShippingCustomField()
    {
        return $this->shippingCustomField;
    }

    /**
     * Set shippingMethod
     *
     * @param string $shippingMethod
     *
     * @return OcOrder
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
     * @return OcOrder
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
     * Set comment
     *
     * @param string $comment
     *
     * @return OcOrder
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set total
     *
     * @param string $total
     *
     * @return OcOrder
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
     * Set commission
     *
     * @param string $commission
     *
     * @return OcOrder
     */
    public function setCommission($commission)
    {
        $this->commission = $commission;

        return $this;
    }

    /**
     * Get commission
     *
     * @return string
     */
    public function getCommission()
    {
        return $this->commission;
    }

    /**
     * Set tracking
     *
     * @param string $tracking
     *
     * @return OcOrder
     */
    public function setTracking($tracking)
    {
        $this->tracking = $tracking;

        return $this;
    }

    /**
     * Get tracking
     *
     * @return string
     */
    public function getTracking()
    {
        return $this->tracking;
    }

    /**
     * Set currencyCode
     *
     * @param string $currencyCode
     *
     * @return OcOrder
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
     * @return OcOrder
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
     * @return OcOrder
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
     * @return OcOrder
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
     * @return OcOrder
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
     * @return OcOrder
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
     * @return OcOrder
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
     * @return OcOrder
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
     * Get orderId
     *
     * @return integer
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * Set marketing
     *
     * @param \OcMarketing $marketing
     *
     * @return OcOrder
     */
    public function setMarketing(\OcMarketing $marketing = null)
    {
        $this->marketing = $marketing;

        return $this;
    }

    /**
     * Get marketing
     *
     * @return \OcMarketing
     */
    public function getMarketing()
    {
        return $this->marketing;
    }

    /**
     * Set customerGroup
     *
     * @param \OcCustomerGroup $customerGroup
     *
     * @return OcOrder
     */
    public function setCustomerGroup(\OcCustomerGroup $customerGroup = null)
    {
        $this->customerGroup = $customerGroup;

        return $this;
    }

    /**
     * Get customerGroup
     *
     * @return \OcCustomerGroup
     */
    public function getCustomerGroup()
    {
        return $this->customerGroup;
    }

    /**
     * Set orderStatus
     *
     * @param \OcOrderStatus $orderStatus
     *
     * @return OcOrder
     */
    public function setOrderStatus(\OcOrderStatus $orderStatus = null)
    {
        $this->orderStatus = $orderStatus;

        return $this;
    }

    /**
     * Get orderStatus
     *
     * @return \OcOrderStatus
     */
    public function getOrderStatus()
    {
        return $this->orderStatus;
    }

    /**
     * Set store
     *
     * @param \OcStore $store
     *
     * @return OcOrder
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
     * Set affiliate
     *
     * @param \OcAffiliate $affiliate
     *
     * @return OcOrder
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

    /**
     * Set language
     *
     * @param \OcLanguage $language
     *
     * @return OcOrder
     */
    public function setLanguage(\OcLanguage $language = null)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language
     *
     * @return \OcLanguage
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set customer
     *
     * @param \OcCustomer $customer
     *
     * @return OcOrder
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

    /**
     * Set currency
     *
     * @param \OcCurrency $currency
     *
     * @return OcOrder
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


}
