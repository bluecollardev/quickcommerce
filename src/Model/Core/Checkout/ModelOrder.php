<?php

namespace QuickCommerce\Model\Core\Checkout;

use Doctrine\ORM\Mapping as ORM;

use QuickCommerce\Model\PosAbstractEntity;

class ModelOrder extends PosAbstractEntity {
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="order_id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	protected $orderId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="invoice_no", type="integer", nullable=false, options={"default":0})
	 */
	protected $invoiceNo = '0';
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="invoice_prefix", type="string", length=26, nullable=false)
	 */
	protected $invoicePrefix;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="store_id", type="integer", nullable=false)
	 */
	protected $storeId;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="store_name", type="string", length=64, nullable=false)
	 */
	protected $storeName;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="store_url", type="string", length=255, nullable=false)
	 */
	protected $storeUrl;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="customer_id", type="integer", nullable=false, options={"default":0})
	 */
	protected $customerId = '0';
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="customer_group_id", type="integer", nullable=false, options={"default":0})
	 */
	protected $customerGroupId = '0';
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="firstname", type="string", length=32, nullable=false)
	 */
	protected $firstname;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="lastname", type="string", length=32, nullable=false)
	 */
	protected $lastname;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="email", type="string", length=96, nullable=false)
	 */
	protected $email;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="telephone", type="string", length=32, nullable=false)
	 */
	protected $telephone;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="fax", type="string", length=32, nullable=false)
	 */
	protected $fax;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="payment_firstname", type="string", length=32, nullable=false)
	 */
	protected $paymentFirstname;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="payment_lastname", type="string", length=32, nullable=false)
	 */
	protected $paymentLastname;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="payment_company", type="string", length=40, nullable=false)
	 */
	protected $paymentCompany;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="payment_address_1", type="string", length=128, nullable=false)
	 */
	protected $paymentAddress1;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="payment_address_2", type="string", length=128, nullable=false)
	 */
	protected $paymentAddress2;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="payment_city", type="string", length=128, nullable=false)
	 */
	protected $paymentCity;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="payment_postcode", type="string", length=10, nullable=false)
	 */
	protected $paymentPostcode;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="payment_country", type="string", length=128, nullable=false)
	 */
	protected $paymentCountry;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="payment_country_id", type="integer", nullable=false)
	 */
	protected $paymentCountryId;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="payment_zone", type="string", length=128, nullable=false)
	 */
	protected $paymentZone;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="payment_zone_id", type="integer", nullable=false)
	 */
	protected $paymentZoneId;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="payment_address_format", type="text", length=65535, nullable=false)
	 */
	protected $paymentAddressFormat = '';
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="payment_custom_field", type="text", length=65535, nullable=false)
	 */
	protected $paymentCustomField = '';
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="payment_method", type="string", length=128, nullable=false)
	 */
	protected $paymentMethod = '';
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="payment_code", type="string", length=128, nullable=false)
	 */
	protected $paymentCode = '';
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="shipping_firstname", type="string", length=32, nullable=false)
	 */
	protected $shippingFirstname;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="shipping_lastname", type="string", length=32, nullable=false)
	 */
	protected $shippingLastname;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="shipping_company", type="string", length=40, nullable=false)
	 */
	protected $shippingCompany = '';
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="shipping_address_1", type="string", length=128, nullable=false)
	 */
	protected $shippingAddress1;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="shipping_address_2", type="string", length=128, nullable=false)
	 */
	protected $shippingAddress2;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="shipping_city", type="string", length=128, nullable=false)
	 */
	protected $shippingCity;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="shipping_postcode", type="string", length=10, nullable=false)
	 */
	protected $shippingPostcode;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="shipping_country", type="string", length=128, nullable=false)
	 */
	protected $shippingCountry;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="shipping_country_id", type="integer", nullable=false)
	 */
	protected $shippingCountryId;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="shipping_zone", type="string", length=128, nullable=false)
	 */
	protected $shippingZone;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="shipping_zone_id", type="integer", nullable=false)
	 */
	protected $shippingZoneId;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="shipping_address_format", type="text", length=65535, nullable=false)
	 */
	protected $shippingAddressFormat = '';
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="shipping_custom_field", type="text", length=65535, nullable=false)
	 */
	protected $shippingCustomField = '';
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="shipping_method", type="string", length=128, nullable=false)
	 */
	protected $shippingMethod = '';
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="shipping_code", type="string", length=128, nullable=false)
	 */
	protected $shippingCode = '';
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="comment", type="text", length=65535, nullable=false)
	 */
	protected $comment;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="total", type="decimal", precision=15, scale=4, nullable=false, options={"default":"0.0000"})
	 */
	protected $total = '0.0000';
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="order_status_id", type="integer", nullable=false, options={"default":0})
	 */
	protected $orderStatusId = '0';
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="affiliate_id", type="integer", nullable=false)
	 */
	protected $affiliateId = 0;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="commission", type="decimal", precision=15, scale=4, nullable=false)
	 */
	protected $commission = 0;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="marketing_id", type="integer", nullable=false)
	 */
	protected $marketingId = 0;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="tracking", type="string", length=64, nullable=false)
	 */
	protected $tracking = '';
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="language_id", type="integer", nullable=false)
	 */
	protected $languageId = 1;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="currency_id", type="integer", nullable=false)
	 */
	protected $currencyId;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="currency_code", type="string", length=3, nullable=false)
	 */
	protected $currencyCode;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="currency_value", type="decimal", precision=15, scale=8, nullable=false)
	 */
	protected $currencyValue = '1.00000000';
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="accept_language", type="string", length=255, nullable=false)
	 */
	protected $acceptLanguage = '';
	
	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="date_added", type="datetime", nullable=false)
	 */
	protected $dateAdded;
	
	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="date_modified", type="datetime", nullable=false)
	 */
	protected $dateModified;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="user_id", type="integer", nullable=true)
	 */
	//protected $userId;
	
	/**
	 * {@inheritDoc}
	 * @see \QuickCommerce\Entity\PosAbstractEntity::getDefaultFilters()
	 */
	public function getDefaultFilters() {
		return array(array('name' => 'orderId', 'operation' => '>', 'value' => 0));
	}
	public function getOrderId() {
		return $this->orderId;
	}
	public function setOrderId($orderId) {
		$this->orderId = $orderId;
		return $this;
	}
	public function getInvoiceNo() {
		return $this->invoiceNo;
	}
	public function setInvoiceNo($invoiceNo) {
		$this->invoiceNo = $invoiceNo;
		return $this;
	}
	public function getInvoicePrefix() {
		return $this->invoicePrefix;
	}
	public function setInvoicePrefix($invoicePrefix) {
		$this->invoicePrefix = $invoicePrefix;
		return $this;
	}
	public function getStoreId() {
		return $this->storeId;
	}
	public function setStoreId($storeId) {
		$this->storeId = $storeId;
		return $this;
	}
	public function getStoreName() {
		return $this->storeName;
	}
	public function setStoreName($storeName) {
		$this->storeName = $storeName;
		return $this;
	}
	public function getStoreUrl() {
		return $this->storeUrl;
	}
	public function setStoreUrl($storeUrl) {
		$this->storeUrl = $storeUrl;
		return $this;
	}
	public function getCustomerId() {
		return $this->customerId;
	}
	public function setCustomerId($customerId) {
		$this->customerId = $customerId;
		return $this;
	}
	public function getCustomerGroupId() {
		return $this->customerGroupId;
	}
	public function setCustomerGroupId($customerGroupId) {
		$this->customerGroupId = $customerGroupId;
		return $this;
	}
	public function getFirstname() {
		return $this->firstname;
	}
	public function setFirstname($firstname) {
		$this->firstname = $firstname;
		return $this;
	}
	public function getLastname() {
		return $this->lastname;
	}
	public function setLastname($lastname) {
		$this->lastname = $lastname;
		return $this;
	}
	public function getEmail() {
		return $this->email;
	}
	public function setEmail($email) {
		$this->email = $email;
		return $this;
	}
	public function getTelephone() {
		return $this->telephone;
	}
	public function setTelephone($telephone) {
		$this->telephone = $telephone;
		return $this;
	}
	public function getFax() {
		return $this->fax;
	}
	public function setFax($fax) {
		$this->fax = $fax;
		return $this;
	}
	public function getPaymentFirstname() {
		return $this->paymentFirstname;
	}
	public function setPaymentFirstname($paymentFirstname) {
		$this->paymentFirstname = $paymentFirstname;
		return $this;
	}
	public function getPaymentLastname() {
		return $this->paymentLastname;
	}
	public function setPaymentLastname($paymentLastname) {
		$this->paymentLastname = $paymentLastname;
		return $this;
	}
	public function getPaymentCompany() {
		return $this->paymentCompany;
	}
	public function setPaymentCompany($paymentCompany) {
		$this->paymentCompany = $paymentCompany;
		return $this;
	}
	public function getPaymentAddress1() {
		return $this->paymentAddress1;
	}
	public function setPaymentAddress1($paymentAddress1) {
		$this->paymentAddress1 = $paymentAddress1;
		return $this;
	}
	public function getPaymentAddress2() {
		return $this->paymentAddress2;
	}
	public function setPaymentAddress2($paymentAddress2) {
		$this->paymentAddress2 = $paymentAddress2;
		return $this;
	}
	public function getPaymentCity() {
		return $this->paymentCity;
	}
	public function setPaymentCity($paymentCity) {
		$this->paymentCity = $paymentCity;
		return $this;
	}
	public function getPaymentPostcode() {
		return $this->paymentPostcode;
	}
	public function setPaymentPostcode($paymentPostcode) {
		$this->paymentPostcode = $paymentPostcode;
		return $this;
	}
	public function getPaymentCountry() {
		return $this->paymentCountry;
	}
	public function setPaymentCountry($paymentCountry) {
		$this->paymentCountry = $paymentCountry;
		return $this;
	}
	public function getPaymentCountryId() {
		return $this->paymentCountryId;
	}
	public function setPaymentCountryId($paymentCountryId) {
		$this->paymentCountryId = $paymentCountryId;
		return $this;
	}
	public function getPaymentZone() {
		return $this->paymentZone;
	}
	public function setPaymentZone($paymentZone) {
		$this->paymentZone = $paymentZone;
		return $this;
	}
	public function getPaymentZoneId() {
		return $this->paymentZoneId;
	}
	public function setPaymentZoneId($paymentZoneId) {
		$this->paymentZoneId = $paymentZoneId;
		return $this;
	}
	public function getPaymentAddressFormat() {
		return $this->paymentAddressFormat;
	}
	public function setPaymentAddressFormat($paymentAddressFormat) {
		$this->paymentAddressFormat = $paymentAddressFormat;
		return $this;
	}
	public function getPaymentCustomField() {
		return $this->paymentCustomField;
	}
	public function setPaymentCustomField($paymentCustomField) {
		$this->paymentCustomField = $paymentCustomField;
		return $this;
	}
	public function getPaymentMethod() {
		return $this->paymentMethod;
	}
	public function setPaymentMethod($paymentMethod) {
		$this->paymentMethod = $paymentMethod;
		return $this;
	}
	public function getPaymentCode() {
		return $this->paymentCode;
	}
	public function setPaymentCode($paymentCode) {
		$this->paymentCode = $paymentCode;
		return $this;
	}
	public function getShippingFirstname() {
		return $this->shippingFirstname;
	}
	public function setShippingFirstname($shippingFirstname) {
		$this->shippingFirstname = $shippingFirstname;
		return $this;
	}
	public function getShippingLastname() {
		return $this->shippingLastname;
	}
	public function setShippingLastname($shippingLastname) {
		$this->shippingLastname = $shippingLastname;
		return $this;
	}
	public function getShippingCompany() {
		return $this->shippingCompany;
	}
	public function setShippingCompany($shippingCompany) {
		$this->shippingCompany = $shippingCompany;
		return $this;
	}
	public function getShippingAddress1() {
		return $this->shippingAddress1;
	}
	public function setShippingAddress1($shippingAddress1) {
		$this->shippingAddress1 = $shippingAddress1;
		return $this;
	}
	public function getShippingAddress2() {
		return $this->shippingAddress2;
	}
	public function setShippingAddress2($shippingAddress2) {
		$this->shippingAddress2 = $shippingAddress2;
		return $this;
	}
	public function getShippingCity() {
		return $this->shippingCity;
	}
	public function setShippingCity($shippingCity) {
		$this->shippingCity = $shippingCity;
		return $this;
	}
	public function getShippingPostcode() {
		return $this->shippingPostcode;
	}
	public function setShippingPostcode($shippingPostcode) {
		$this->shippingPostcode = $shippingPostcode;
		return $this;
	}
	public function getShippingCountry() {
		return $this->shippingCountry;
	}
	public function setShippingCountry($shippingCountry) {
		$this->shippingCountry = $shippingCountry;
		return $this;
	}
	public function getShippingCountryId() {
		return $this->shippingCountryId;
	}
	public function setShippingCountryId($shippingCountryId) {
		$this->shippingCountryId = $shippingCountryId;
		return $this;
	}
	public function getShippingZone() {
		return $this->shippingZone;
	}
	public function setShippingZone($shippingZone) {
		$this->shippingZone = $shippingZone;
		return $this;
	}
	public function getShippingZoneId() {
		return $this->shippingZoneId;
	}
	public function setShippingZoneId($shippingZoneId) {
		$this->shippingZoneId = $shippingZoneId;
		return $this;
	}
	public function getShippingAddressFormat() {
		return $this->shippingAddressFormat;
	}
	public function setShippingAddressFormat($shippingAddressFormat) {
		$this->shippingAddressFormat = $shippingAddressFormat;
		return $this;
	}
	public function getShippingCustomField() {
		return $this->shippingCustomField;
	}
	public function setShippingCustomField($shippingCustomField) {
		$this->shippingCustomField = $shippingCustomField;
		return $this;
	}
	public function getShippingMethod() {
		return $this->shippingMethod;
	}
	public function setShippingMethod($shippingMethod) {
		$this->shippingMethod = $shippingMethod;
		return $this;
	}
	public function getShippingCode() {
		return $this->shippingCode;
	}
	public function setShippingCode($shippingCode) {
		$this->shippingCode = $shippingCode;
		return $this;
	}
	public function getComment() {
		return $this->comment;
	}
	public function setComment($comment) {
		$this->comment = $comment;
		return $this;
	}
	public function getTotal() {
		return $this->total;
	}
	public function setTotal($total) {
		$this->total = $total;
		return $this;
	}
	public function getOrderStatusId() {
		return $this->orderStatusId;
	}
	public function setOrderStatusId($orderStatusId) {
		$this->orderStatusId = $orderStatusId;
		return $this;
	}
	public function getAffiliateId() {
		return $this->affiliateId;
	}
	public function setAffiliateId($affiliateId) {
		$this->affiliateId = $affiliateId;
		return $this;
	}
	public function getCommission() {
		return $this->commission;
	}
	public function setCommission($commission) {
		$this->commission = $commission;
		return $this;
	}
	public function getMarketingId() {
		return $this->marketingId;
	}
	public function setMarketingId($marketingId) {
		$this->marketingId = $marketingId;
		return $this;
	}
	public function getTracking() {
		return $this->tracking;
	}
	public function setTracking($tracking) {
		$this->tracking = $tracking;
		return $this;
	}
	public function getLanguageId() {
		return $this->languageId;
	}
	public function setLanguageId($languageId) {
		$this->languageId = $languageId;
		return $this;
	}
	public function getCurrencyId() {
		return $this->currencyId;
	}
	public function setCurrencyId($currencyId) {
		$this->currencyId = $currencyId;
		return $this;
	}
	public function getCurrencyCode() {
		return $this->currencyCode;
	}
	public function setCurrencyCode($currencyCode) {
		$this->currencyCode = $currencyCode;
		return $this;
	}
	public function getCurrencyValue() {
		return $this->currencyValue;
	}
	public function setCurrencyValue($currencyValue) {
		$this->currencyValue = $currencyValue;
		return $this;
	}
	public function getAcceptLanguage() {
		return $this->acceptLanguage;
	}
	public function setAcceptLanguage($acceptLanguage) {
		$this->acceptLanguage = $acceptLanguage;
		return $this;
	}
	public function getDateAdded() {
		return $this->dateAdded;
	}
	public function setDateAdded(\DateTime $dateAdded) {
		$this->dateAdded = $dateAdded;
		return $this;
	}
	public function getDateModified() {
		return $this->dateModified;
	}
	public function setDateModified(\DateTime $dateModified) {
		$this->dateModified = $dateModified;
		return $this;
	}
	public function getUserId() {
		return $this->userId;
	}
	public function setUserId($userId) {
		$this->userId = $userId;
		return $this;
	}
	
	

}

