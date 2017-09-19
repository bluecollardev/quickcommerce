<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * OcOrder
 *
 * @ORM\Table(name="oc_order")
 * @ORM\Entity
 */
class OcOrder
{
    /**
     * @var integer
     *
     * @ORM\Column(name="order_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $orderId;

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
    private $invoicePrefix;

    /**
     * @var integer
     *
     * @ORM\Column(name="store_id", type="integer", nullable=false)
     */
    private $storeId = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="store_name", type="string", length=64, nullable=false)
     */
    private $storeName;

    /**
     * @var string
     *
     * @ORM\Column(name="store_url", type="string", length=255, nullable=false)
     */
    private $storeUrl;

    /**
     * @var integer
     *
     * @ORM\Column(name="customer_id", type="integer", nullable=false)
     */
    private $customerId = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="customer_group_id", type="integer", nullable=false)
     */
    private $customerGroupId = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=32, nullable=false)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=32, nullable=false)
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=96, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=32, nullable=false)
     */
    private $telephone;

    /**
     * @var string
     *
     * @ORM\Column(name="fax", type="string", length=32, nullable=false)
     */
    private $fax;

    /**
     * @var string
     *
     * @ORM\Column(name="custom_field", type="text", length=65535, nullable=false)
     */
    private $customField;

    /**
     * @var string
     *
     * @ORM\Column(name="payment_firstname", type="string", length=32, nullable=false)
     */
    private $paymentFirstname;

    /**
     * @var string
     *
     * @ORM\Column(name="payment_lastname", type="string", length=32, nullable=false)
     */
    private $paymentLastname;

    /**
     * @var string
     *
     * @ORM\Column(name="payment_company", type="string", length=40, nullable=false)
     */
    private $paymentCompany;

    /**
     * @var string
     *
     * @ORM\Column(name="payment_address_1", type="string", length=128, nullable=false)
     */
    private $paymentAddress1;

    /**
     * @var string
     *
     * @ORM\Column(name="payment_address_2", type="string", length=128, nullable=false)
     */
    private $paymentAddress2;

    /**
     * @var string
     *
     * @ORM\Column(name="payment_city", type="string", length=128, nullable=false)
     */
    private $paymentCity;

    /**
     * @var string
     *
     * @ORM\Column(name="payment_postcode", type="string", length=10, nullable=false)
     */
    private $paymentPostcode;

    /**
     * @var string
     *
     * @ORM\Column(name="payment_country", type="string", length=128, nullable=false)
     */
    private $paymentCountry;

    /**
     * @var integer
     *
     * @ORM\Column(name="payment_country_id", type="integer", nullable=false)
     */
    private $paymentCountryId;

    /**
     * @var string
     *
     * @ORM\Column(name="payment_zone", type="string", length=128, nullable=false)
     */
    private $paymentZone;

    /**
     * @var integer
     *
     * @ORM\Column(name="payment_zone_id", type="integer", nullable=false)
     */
    private $paymentZoneId;

    /**
     * @var string
     *
     * @ORM\Column(name="payment_address_format", type="text", length=65535, nullable=false)
     */
    private $paymentAddressFormat;

    /**
     * @var string
     *
     * @ORM\Column(name="payment_custom_field", type="text", length=65535, nullable=false)
     */
    private $paymentCustomField;

    /**
     * @var string
     *
     * @ORM\Column(name="payment_method", type="string", length=128, nullable=false)
     */
    private $paymentMethod;

    /**
     * @var string
     *
     * @ORM\Column(name="payment_code", type="string", length=128, nullable=false)
     */
    private $paymentCode;

    /**
     * @var string
     *
     * @ORM\Column(name="shipping_firstname", type="string", length=32, nullable=false)
     */
    private $shippingFirstname;

    /**
     * @var string
     *
     * @ORM\Column(name="shipping_lastname", type="string", length=32, nullable=false)
     */
    private $shippingLastname;

    /**
     * @var string
     *
     * @ORM\Column(name="shipping_company", type="string", length=40, nullable=false)
     */
    private $shippingCompany;

    /**
     * @var string
     *
     * @ORM\Column(name="shipping_address_1", type="string", length=128, nullable=false)
     */
    private $shippingAddress1;

    /**
     * @var string
     *
     * @ORM\Column(name="shipping_address_2", type="string", length=128, nullable=false)
     */
    private $shippingAddress2;

    /**
     * @var string
     *
     * @ORM\Column(name="shipping_city", type="string", length=128, nullable=false)
     */
    private $shippingCity;

    /**
     * @var string
     *
     * @ORM\Column(name="shipping_postcode", type="string", length=10, nullable=false)
     */
    private $shippingPostcode;

    /**
     * @var string
     *
     * @ORM\Column(name="shipping_country", type="string", length=128, nullable=false)
     */
    private $shippingCountry;

    /**
     * @var integer
     *
     * @ORM\Column(name="shipping_country_id", type="integer", nullable=false)
     */
    private $shippingCountryId;

    /**
     * @var string
     *
     * @ORM\Column(name="shipping_zone", type="string", length=128, nullable=false)
     */
    private $shippingZone;

    /**
     * @var integer
     *
     * @ORM\Column(name="shipping_zone_id", type="integer", nullable=false)
     */
    private $shippingZoneId;

    /**
     * @var string
     *
     * @ORM\Column(name="shipping_address_format", type="text", length=65535, nullable=false)
     */
    private $shippingAddressFormat;

    /**
     * @var string
     *
     * @ORM\Column(name="shipping_custom_field", type="text", length=65535, nullable=false)
     */
    private $shippingCustomField;

    /**
     * @var string
     *
     * @ORM\Column(name="shipping_method", type="string", length=128, nullable=false)
     */
    private $shippingMethod;

    /**
     * @var string
     *
     * @ORM\Column(name="shipping_code", type="string", length=128, nullable=false)
     */
    private $shippingCode;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="text", length=65535, nullable=false)
     */
    private $comment;

    /**
     * @var string
     *
     * @ORM\Column(name="total", type="decimal", precision=15, scale=4, nullable=false)
     */
    private $total = '0.0000';

    /**
     * @var integer
     *
     * @ORM\Column(name="order_status_id", type="integer", nullable=false)
     */
    private $orderStatusId = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="affiliate_id", type="integer", nullable=false)
     */
    private $affiliateId;

    /**
     * @var string
     *
     * @ORM\Column(name="commission", type="decimal", precision=15, scale=4, nullable=false)
     */
    private $commission;

    /**
     * @var integer
     *
     * @ORM\Column(name="marketing_id", type="integer", nullable=false)
     */
    private $marketingId;

    /**
     * @var string
     *
     * @ORM\Column(name="tracking", type="string", length=64, nullable=false)
     */
    private $tracking;

    /**
     * @var integer
     *
     * @ORM\Column(name="language_id", type="integer", nullable=false)
     */
    private $languageId;

    /**
     * @var integer
     *
     * @ORM\Column(name="currency_id", type="integer", nullable=false)
     */
    private $currencyId;

    /**
     * @var string
     *
     * @ORM\Column(name="currency_code", type="string", length=3, nullable=false)
     */
    private $currencyCode;

    /**
     * @var string
     *
     * @ORM\Column(name="currency_value", type="decimal", precision=15, scale=8, nullable=false)
     */
    private $currencyValue = '1.00000000';

    /**
     * @var string
     *
     * @ORM\Column(name="ip", type="string", length=40, nullable=false)
     */
    private $ip;

    /**
     * @var string
     *
     * @ORM\Column(name="forwarded_ip", type="string", length=40, nullable=false)
     */
    private $forwardedIp;

    /**
     * @var string
     *
     * @ORM\Column(name="user_agent", type="string", length=255, nullable=false)
     */
    private $userAgent;

    /**
     * @var string
     *
     * @ORM\Column(name="accept_language", type="string", length=255, nullable=false)
     */
    private $acceptLanguage;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_added", type="datetime", nullable=false)
     */
    private $dateAdded;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_modified", type="datetime", nullable=false)
     */
    private $dateModified;

    /**
     * @var integer
     *
     * @ORM\Column(name="user_id", type="integer", nullable=true)
     */
    private $userId;

    /**
     * @var integer
     *
     * @ORM\Column(name="quote_status_id", type="integer", nullable=true)
     */
    private $quoteStatusId = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="quote_id", type="integer", nullable=true)
     */
    private $quoteId = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="location_id", type="integer", nullable=true)
     */
    private $locationId = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="table_id", type="integer", nullable=true)
     */
    private $tableId = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_sold", type="datetime", nullable=true)
     */
    private $dateSold;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_delivery", type="datetime", nullable=true)
     */
    private $dateDelivery;


}

