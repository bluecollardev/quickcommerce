<?php

namespace QuickCommerce\API\Service;

use Doctrine\ORM\EntityManager;
use QuickCommerce\Model\View\CartConfig;
use QuickCommerce\Model\View\PosConfig;
use QuickCommerce\Model\Core\Address\PosCountry;
use QuickCommerce\Model\Core\Currency\PosCurrency;
use QuickCommerce\Model\Core\Customer\PosCustomerGroup;
use QuickCommerce\Model\Core\Customer\PosCustomerGroupDescription;
use QuickCommerce\Model\Core\Language\PosLanguage;
use QuickCommerce\Model\Core\Checkout\PosOrderStatus;
use QuickCommerce\Model\View\PosReferenceData;
use QuickCommerce\Model\Core\Setting\PosSetting;
use QuickCommerce\Model\Core\Tax\PosTaxClass;
use QuickCommerce\Model\Core\Tax\PosTaxRate;
use QuickCommerce\Model\Core\Tax\PosTaxRateToCustomerGroup;
use QuickCommerce\Model\Core\Tax\PosTaxRule;
use QuickCommerce\Model\Core\Address\PosZone;
use QuickCommerce\Model\Core\Address\PosZoneToGeoZone;
use QuickCommerce\Model\Core\Address\PosAddress;
use QuickCommerce\Util\PosUtil;

/**
 * The abstract reference data services

 *
 */
abstract class AbstractReferenceDataService extends AbstractAPIService {
	/**
	 * {@inheritDoc}
	 * @see \QuickCommerce\API\IAPIService::retrieve()
	 */
	public function retrieve($id, $filters) {
		// return the reference data, $id is not required for this service
		$em = $this->adapter->getEntityManager();
		
		// All configurations
		$settings = $em->getRepository(PosSetting::class)->findAll();
		
		$cartSettings = array();
		PosUtil::settingsToCartSettings($settings, $cartSettings);
		
		$sql = "SELECT model.languageId FROM " . PosLanguage::class . " model WHERE model.code = ?1";
		$query = $em->createQuery($sql);
		$query->setParameter(1, $cartSettings['config_admin_language']);
		$result = $query->getArrayResult();
		
		if (!empty($result)) {
			$cartSettings['config_language_id'] = $result[0]['languageId'];
		} else {
			$cartSettings['config_language_id'] = 1;
		}
		
		// Get currency symbols
		$currencyCode = $cartSettings['config_currency'];
		/** @var $currency PosCurrency */
		$currency = $em->getRepository(PosCurrency::class)->findOneBy(array('code' => $currencyCode));
		$cartSettings['config_currency_symbol_left'] = $currency->getSymbolLeft();
		$cartSettings['config_currency_symobl_right'] = $currency->getSymbolRight();
		
		$defaultLangId = (empty($cartSettings['config_language_id']) ? 1 : $cartSettings['config_language_id']);
		$criteria = array('languageId' => $defaultLangId);
		
		/** @var $language PosLanguage */
		$language = $em->find(PosLanguage::class, $defaultLangId);
		$langCode = $language->getCode();
		$path = DIR_LANGUAGE . $langCode . '/' . $langCode . '.php';
		if (file_exists($path)) {
			include_once($path);
		} else {
			$langDir = $language->getDirectory();
			$path = DIR_LANGUAGE . $langDir . '/' . $langDir . '.php';
			if (file_exists($path)) {
				include_once($path);
			}
		}
		$cartSettings['config_thousand_point'] = $_['thousand_point'];
		$cartSettings['config_decimal_point'] = $_['decimal_point'];

		// Order statuses
		$serverOrderStatuses = $em->getRepository(PosOrderStatus::class)->findBy($criteria);
		$orderStatuses = array();
		foreach ($serverOrderStatuses as $serverOrderStatus) {
			/** @var $serverOrderStatus PosOrderStatus*/
			$orderStatuses[$serverOrderStatus->getOrderStatusId()] = $serverOrderStatus->getName();
		}
		
		// Customer groups
		$serverCustomerGroups = $em->getRepository(PosCustomerGroupDescription::class)->findBy($criteria);
		$customerGroups = array();
		foreach ($serverCustomerGroups as $serverCustomerGroup) {
			/** @var $serverCustomerGroup PosCustomerGroupDescription */
			$customerGroups[$serverCustomerGroup->getCustomerGroupId()] = $serverCustomerGroup->getName();
		}
		
		// Currencies
		$currencies = array();
		$serverCurrencies = $em->getRepository(PosCurrency::class)->findAll();
 		foreach ($serverCurrencies as $serverCurrency) {
 			/** @var $serverCurrency PosCurrency */
 			$currencies[$serverCurrency->getCode()] = array(
 					'title' => $serverCurrency->getTitle(),
 					'symbolLeft' => $serverCurrency->getSymbolLeft(),
 					'symbolRight' => $serverCurrency->getSymbolRight(),
 					'decimalPlace' => $serverCurrency->getDecimalPlace(),
 					'value' => $serverCurrency->getValue()
 			);
		}
		
		// Countries
		$countries = array();
		$sql = "SELECT model.countryId, model.name FROM " . PosCountry::class . " model";
		$query = $em->createQuery($sql);
		$result = $query->getArrayResult();
		foreach ($result as $record) {
			$countries[$record['countryId']] = $record['name'];
		}

		$posConfig = $this->adapter->getService('settings')->getPosConfig($em);
		
		// Zones for the default contry id and the default customer country
		$defaultCountryIds = array();
		if (!empty($cartSettings['config_country_id'])) {
			$defaultCountryIds[] = $cartSettings['config_country_id'];
		}
		if (!empty($posConfig->getDefaultCustomer()->getAddresses())) {
			/** @var $defaultAddress PosAddress */
			$defaultAddress = $posConfig->getDefaultCustomer()->getAddresses()[0];
			$defaultCountryIds[] = $defaultAddress->getCountryId();
		}
		
		$zones = array();
		if (!empty($defaultCountryIds)) {
			$sql = "SELECT model.countryId, model.zoneId, model.name FROM " . PosZone::class . " model WHERE model.countryId IN (" . implode(',', $defaultCountryIds) . ")";
			$query = $em->createQuery($sql);
			$result = $query->getArrayResult();
			
			foreach ($result as $record) {
				if (empty($zones[$record['countryId']])) {
					$zones[$record['countryId']] = array();
				}
				$zones[$record['countryId']][$record['zoneId']] = $record['name'];
			}
		}
		
		$cartConfig = new CartConfig();
		
		$cartConfig->setCartSettings($cartSettings);
		$cartConfig->setOrderStatuses($orderStatuses);
		$cartConfig->setServerImagePath(HTTP_SERVER . 'image/');
		$cartConfig->setCurrencies($currencies);
		$cartConfig->setCountries($countries);
		$cartConfig->setZones($zones);
		$cartConfig->setCustomerGroups($customerGroups);

		// Tax rates
		$this->getTaxRates($cartConfig, $em);
		
		$referenceData = new PosReferenceData();
		$referenceData->setCartConfig($cartConfig);
		$referenceData->setPosConfig($posConfig);
		
		return $referenceData;
	}
	
	private function getTaxRates(CartConfig &$cartConfig, EntityManager $em) {
		$taxClasses = $em->getRepository(PosTaxClass::class)->findAll();
		$customerGroups = $em->getRepository(PosCustomerGroup::class)->findAll();
		$geoZoneMappings = $em->getRepository(PosZoneToGeoZone::class)->findAll();
		$taxRules = $em->getRepository(PosTaxRule::class)->findAll();
		$taxRates = $em->getRepository(PosTaxRate::class)->findAll();
		$rateToCustomerGroups = $em->getRepository(PosTaxRateToCustomerGroup::class)->findAll();
		
		$geoZones = array();
		foreach ($geoZoneMappings as $geoZoneMapping) {
			/** @var $geoZoneMapping PosZoneToGeoZone */
			$geoZoneId = $geoZoneMapping->getGeoZoneId();
			if (!isset($geoZones[$geoZoneId])) {
				$geoZones[$geoZoneId] = array();
			}
			$geoZones[$geoZoneId][] = array(
				'countryId' => 	$geoZoneMapping->getCountryId(),
				'zoneId' => $geoZoneMapping->getZoneId()
			);
		}
		
		$cartConfig->setGeoZones($geoZones);
		
		$serverTaxRates = array();
		
		$bases = array('shipping', 'payment', 'store');
		
		foreach ($taxClasses as $taxClass) {
			/** @var $taxClass PosTaxClass */
			$taxClassId = $taxClass->getTaxClassId();
			foreach ($customerGroups as $customerGroup) {
				/** @var $customerGroup PosCustomerGroup */
				$customerGroupId = $customerGroup->getCustomerGroupId();
				foreach (array_keys($geoZones) as $geoZoneId) {
					foreach ($bases as $base) {
						$key = $taxClassId. '_' . $customerGroupId . '_' . $geoZoneId . '_' . $base;
						// make sure the rates are for the given $taxClassId, $customerGroupId and $geoZoneId
						foreach ($taxRates as $taxRate) {
							/** @var $taxRate PosTaxRate */
							if ($this->matchedTaxRate($taxRate, $taxRules, $rateToCustomerGroups, $taxClassId, $customerGroupId, $geoZoneId, $base)) {
								if (!isset($serverTaxRates[$key])) {
									$serverTaxRates[$key] = array();
								}
								$serverTaxRates[$key][] = array(
									'taxRateId' => $taxRate->getTaxRateId(),
									'rate' => $taxRate->getRate(),
									'name' => $taxRate->getName(),
									'type' => $taxRate->getType()
								);
							}
						}
					}
				}
			}
		}
		
		$cartConfig->setTaxRates($serverTaxRates);
	}
	
	private function matchedTaxRate(PosTaxRate $taxRate, $taxRules, $rateToCustomerGroups, $taxClassId, $customerGroupId, $geoZoneId, $base) {
		// check if the $taxRate is for the given $taxClassId, $customerGroupId, $geoZoneId and $base
		// using the data in $taxRate, $taxRules, $rateToCustomerGroup
		if ($taxRate->getGeoZoneId() != $geoZoneId || empty($rateToCustomerGroups) || empty($taxRules)) {
			return false;
		}
		
		$taxRateId = $taxRate->getTaxRateId();
		
		$found = false;
		foreach ($rateToCustomerGroups as $rateToCustomerGroup) {
			/** @var $rateToCustomerGroup PosTaxRateToCustomerGroup */
			if ($rateToCustomerGroup->getCustomerGroupId() == $customerGroupId
					&& $rateToCustomerGroup->getTaxRateId() == $taxRateId) {
				$found = true;
				break;
			}
		}
		
		if (!$found) return false;
		
		$found = false;
		foreach ($taxRules as $taxRule) {
			/** @var $taxRule PosTaxRule */
			if ($taxRule->getBased() == $base
					&& $taxRule->getTaxClassId() == $taxClassId
					&& $taxRule->getTaxRateId() == $taxRateId) {
				$found = true;
			}
		}
		
		if (!$found) return false;
		
		return true;
	}
}