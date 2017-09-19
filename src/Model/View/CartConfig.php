<?php

namespace QuickCommerce\Model\View;

use QuickCommerce\Model\PosAbstractEntity;

class CartConfig extends PosAbstractEntity {
	/**
	 * The shopping cart configuration data
	 * @var array of key-value pair from PosSetting
	 */
	protected $cartSettings;
	
	/**
	 * The order statuses
	 * @var array of string from PosOrderStatus
	 */
	protected $orderStatuses;

	/**
	 * The image path for server side images
	 * @var string
	 */
	protected $serverImagePath;
	
	/**
	 * All geozone to country and zone mappings that the client can be used for tax calculation
	 * @var array of {key: geoZoneId, value: {countryId, zoneId}}
	 */
	protected $geoZones;
	
	/**
	 * All tax rates loaded from the server
	 * @var array of {key: taxClassId_customerGroupId_geozoneId_base, value: PosTaxRate}
	 */
	protected $taxRates;
	
	/**
	 * All supported currencies in the system
	 * @var array of {title, symbolLeft, symbolRight, decimalPoint, value}
	 */
	protected $currencies;
	
	/**
	 * All countries supported by POS
	 * @var array of {countryId, name}
	 */
	protected $countries;
	
	/**
	 * All zones for the default country
	 * @var array of {zoneId, name}
	 */
	protected $zones;
	
	/**
	 * All customer groups
	 * @var array of {customerGroupId, name}
	 */
	protected $customerGroups;
	
	public function getCartSettings() {
		return $this->cartSettings;
	}
	public function setCartSettings(array $cartSettings) {
		$this->cartSettings = $cartSettings;
		return $this;
	}
	public function getOrderStatuses() {
		return $this->orderStatuses;
	}
	public function setOrderStatuses(array $orderStatuses) {
		$this->orderStatuses = $orderStatuses;
		return $this;
	}
	public function getServerImagePath() {
		return $this->serverImagePath;
	}
	public function setServerImagePath($serverImagePath) {
		$this->serverImagePath = $serverImagePath;
		return $this;
	}
	public function getGeoZones() {
		return $this->geoZones;
	}
	public function setGeoZones(array $geoZones) {
		$this->geoZones = $geoZones;
		return $this;
	}
	public function getTaxRates() {
		return $this->taxRates;
	}
	public function setTaxRates(array $taxRates) {
		$this->taxRates = $taxRates;
		return $this;
	}
	public function getCurrencies() {
		return $this->currencies;
	}
	public function setCurrencies(array $currencies) {
		$this->currencies = $currencies;
		return $this;
	}
	public function getCountries() {
		return $this->countries;
	}
	public function setCountries(array $countries) {
		$this->countries = $countries;
		return $this;
	}
	public function getZones() {
		return $this->zones;
	}
	public function setZones(array $zones) {
		$this->zones = $zones;
		return $this;
	}
	public function getCustomerGroups() {
		return $this->customerGroups;
	}
	public function setCustomerGroups(array $customerGroups) {
		$this->customerGroups = $customerGroups;
		return $this;
	}
}

