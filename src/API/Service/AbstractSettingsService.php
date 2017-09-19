<?php

namespace QuickCommerce\API\Service;

use QuickCommerce\Model\View\PosConfig;
use QuickCommerce\Model\Core\Payment\PosPaymentType;
use QuickCommerce\Model\Core\Address\PosAddress;
use QuickCommerce\Util\PosUtil;
use Doctrine\ORM\EntityManager;
use QuickCommerce\Model\View\PosCustomerDetails;
use QuickCommerce\Model\Core\Setting\PosSetting;
use QuickCommerce\Model\Core\Customer\PosCustomer;

/**
 * The abstract settings services

 *
 */
abstract class AbstractSettingsService extends AbstractAPIService {
	/**
	 * {@inheritDoc}
	 * @see \QuickCommerce\API\Service\AbstractAPIService::create()
	 */
	public function create($data) {
		// Only support POST /settings
		// Save settings, expecting the client sending a JSON representation of PosConfig object
		$posConfig = new PosConfig();
		PosUtil::array2Entity($posConfig, $data['data']);
		
		$em = $this->adapter->getEntityManager();

		// save payment types
		$this->savePaymentTypes($em, $posConfig->getPaymentTypes());
		
		// save default customer
		$this->saveDefaultCustomer($em, $posConfig->getDefaultCustomerType(), $posConfig->getDefaultCustomer());
		
		// save posSettings
		$this->savePosSettings($em, $posConfig->getPosSettings());
		
		$em->flush();
		
		// return latest pos config
		return $this->getPosConfig($em);
	}
	
	private function savePaymentTypes(EntityManager $em, array $paymentTypes) {
		foreach ($paymentTypes as $paymentType) {
			/** @var $paymentType PosPaymentType */
			$paymentTypeId = $paymentType->getPaymentTypeId();
			if (!$paymentTypeId || $paymentTypeId <= 0) {
				$em->persist($paymentType);
			} else {
				/** @var $existingPaymentType PosPaymentType */
				$existingPaymentType = $em->find(PosPaymentType::class, $paymentTypeId);
				$existingPaymentType->setEnabled($paymentType->getEnabled());
				$existingPaymentType->setName($paymentType->getName());
				$existingPaymentType->setType($paymentType->getType());
			}
		}
	}
	
	private function saveDefaultCustomer(EntityManager $em, $defaultCustomerType, PosCustomerDetails $defaultCustomer) {
		$posSettings = array('POS_c_type' => $defaultCustomerType);

		if ($defaultCustomerType == 2) {
			$customer = $defaultCustomer->getCustomer();
			$addresses = $defaultCustomer->getAddresses();
			/** @var $address PosAddress */
			$address = (!empty($addresses)) ? $addresses[0] : null;
			
			if ($customer) {
				$posSettings['POS_c_firstname'] = $customer->getFirstname();
				$posSettings['POS_c_lastname'] = $customer->getLastname();
				$posSettings['POS_c_email'] = $customer->getEmail();
				$posSettings['POS_c_telephone'] = $customer->getTelephone();
				$posSettings['POS_c_fax'] = $customer->getFax();
			}
			
			if ($address) {
				$posSettings['POS_a_address_1'] = $address->getAddress1();
				$posSettings['POS_a_address_2'] = $address->getAddress2();
				$posSettings['POS_a_city'] = $address->getCity();
				$posSettings['POS_a_postcode'] = $address->getPostcode();
				$posSettings['POS_a_country_id'] = $address->getCountryId();
				$posSettings['POS_a_zone_id'] = $address->getZoneId();
			}
		} else if ($defaultCustomerType == 3) {
			$posSettings['POS_c_id'] = $defaultCustomer->getCustomer()->getCustomerId();
		}
			
		$this->savePosSettings($em, $posSettings);
	}
	
	private function savePosSettings(EntityManager $em, array $posSettings) {
		// Save settings to settings table, and all pos settings are primary types
		$repos = $em->getRepository(PosSetting::class);
	
		foreach ($posSettings as $key => &$value) {
			$serialized = false;
			if (is_object($value)) {
				$value = json_encode($value);
				$serialized = true;
			}
			
			$posSetting = $repos->findOneBy(array('key' => $key, 'code'=>'POS', 'storeId' => 0));
			
			if ($posSetting) {
				$posSetting->setValue($value);
			} else {
				$posSetting = new PosSetting();
				$posSetting->setCode('POS');
				$posSetting->setKey($key);
				$posSetting->setSerialized($serialized);
				$posSetting->setStoreId(0);
				$posSetting->setValue($value);
				
				$em->persist($posSetting);
			}
		}
	}
	
	public function getPosConfig(EntityManager $em) {
		// Pos Settings
		$settings = $em->getRepository(PosSetting::class)->findAll();
		$posSettings = array();
		PosUtil::settingsToPosSettings($settings, $posSettings);
		
		// Cart Settings
		$cartSettings = array();
		PosUtil::settingsToCartSettings($settings, $cartSettings);
		
		// Payment Types
		//$paymentTypes = $em->getRepository(PosPaymentType::class)->findAll();
		
		// default customer details
		$builtInCustomerDetails = new PosCustomerDetails();
		$defaultCustomerType = isset($posSettings['POS_c_type']) ? $posSettings['POS_c_type'] : 0;
		
		$posConfig = new PosConfig();
		$posConfig->setPosSettings($posSettings);
		$posConfig->setDefaultCustomerType($defaultCustomerType);
		$posConfig->setDefaultCustomer($this->getDefaultCustomer($em, $cartSettings, $posSettings, $builtInCustomerDetails));
		//$posConfig->setPaymentTypes($paymentTypes);
		$posConfig->setBuiltInCustomer($builtInCustomerDetails);
		
		return $posConfig;
	}
	
	private function getDefaultCustomer(EntityManager $em, $cartConfig, $posSettings, PosCustomerDetails &$builtInCustomerDetails) {
		$customerId = isset($posSettings['POS_c_id']) ? $posSettings['POS_c_id'] : 0;
	
		$customerDetails = new PosCustomerDetails();
	
		if (isset($posSettings['POS_c_type']) && $posSettings['POS_c_type'] == 3) {
			// Use existing customer
			/** @var $customer PosCustomer */
			$customer = $em->find(PosCustomer::class, $customerId);
			$customerDetails->setCustomer($customer);
			// detach entity
			$em->detach($customer);
			// Do not need the following fields when return default customer back to front end
			$customer->setDateAdded(null);
			$customer->setPassword(null);
			$customer->setSalt(null);
			$customer->setToken(null);
				
			$addresses = $em->getRepository(PosAddress::class)->findBy(array('customerId' => $customerId));
			$customerDetails->setAddresses($addresses);
				
			return $customerDetails;
		}
	
		$defaultFirstName = 'Instore';
		$defaultLastName = 'Customer';
		$defaultEmail = 'customer@instore.com';
		$defaultTelephone = '1600';
		$defaultFax = '';
		$defaultAddressFirstName = 'Instore';
		$defaultAddressLastName = 'Customer';
		$defaultAddressAddress1 = 'Store Address';
		$defaultAddressAddress2 = '';
		$defaultAddressCity = 'Store City';
		$defaultAddressPostcode = '1600';
	
		$customer = new PosCustomer();
		$customer->setCustomerId(0);
		$customer->setCustomerGroupId(1);
	
		$addresses = array();
		$address = new PosAddress();
		$address->setAddressId(0);
	
		if (isset($posSettings['POS_c_type']) && $posSettings['POS_c_type'] == 2) {
			// Use user-defined customer info without creating a real customer
			$customer->setFirstname(isset($posSettings['POS_c_firstname']) ? $posSettings['POS_c_firstname'] : $defaultFirstName);
			$customer->setLastname(isset($posSettings['POS_c_lastname']) ? $posSettings['POS_c_lastname'] : $defaultLastName);
			$customer->setEmail(isset($posSettings['POS_c_email']) ? $posSettings['POS_c_email'] : $defaultEmail);
			$customer->setTelephone(isset($posSettings['POS_c_telephone']) ? $posSettings['POS_c_telephone'] : $defaultTelephone);
			$customer->setFax(isset($posSettings['POS_c_fax']) ? $posSettings['POS_c_fax'] : $defaultFax);
				
			$address->setFirstname(isset($posSettings['POS_a_firstname']) ? $posSettings['POS_a_firstname'] : $defaultAddressFirstName);
			$address->setLastname(isset($posSettings['POS_a_lastname']) ? $posSettings['POS_a_lastname'] : $defaultAddressLastName);
			$address->setAddress1(isset($posSettings['POS_a_address_1']) ? $posSettings['POS_a_address_1'] : $defaultAddressAddress1);
			$address->setAddress2(isset($posSettings['POS_a_address_2']) ? $posSettings['POS_a_address_2'] : $defaultAddressAddress2);
			$address->setCity(isset($posSettings['POS_a_city']) ? $posSettings['POS_a_city'] : $defaultAddressCity);
			$address->setPostcode(isset($posSettings['POS_a_postcode']) ? $posSettings['POS_a_postcode'] : $defaultAddressPostcode);
			$address->setCountryId(isset($posSettings['POS_a_country_id']) ? $posSettings['POS_a_country_id'] : $cartConfig['config_country_id']);
			$address->setZoneId(isset($posSettings['POS_a_zone_id']) ? $posSettings['POS_a_zone_id'] : $cartConfig['config_zone_id']);
		} else {
			$customer->setFirstname($defaultFirstName);
			$customer->setLastname($defaultLastName);
			$customer->setEmail($defaultEmail);
			$customer->setTelephone($defaultTelephone);
			$customer->setFax($defaultFax);
	
			$address->setFirstname($defaultAddressFirstName);
			$address->setLastname($defaultAddressLastName);
			$address->setAddress1($defaultAddressAddress1);
			$address->setAddress2($defaultAddressAddress2);
			$address->setCity($defaultAddressCity);
			$address->setPostcode($defaultAddressPostcode);
			$address->setCountryId($cartConfig['config_country_id']);
			$address->setZoneId($cartConfig['config_zone_id']);
		}
	
		$addresses[] = $address;
	
		$customerDetails->setCustomer($customer);
		$customerDetails->setAddresses($addresses);
	
		// Set values to built-in customer
		$builtInCustomer = new PosCustomer();
		$builtInCustomer->setCustomerId(0);
		$builtInCustomer->setCustomerGroupId(1);
		$builtInCustomer->setFirstname($defaultFirstName);
		$builtInCustomer->setLastname($defaultLastName);
		$builtInCustomer->setEmail($defaultEmail);
		$builtInCustomer->setTelephone($defaultTelephone);
		$builtInCustomer->setFax($defaultFax);
		$builtInAddress = new PosAddress();
		$builtInAddress->setFirstname($defaultAddressFirstName);
		$builtInAddress->setLastname($defaultAddressLastName);
		$builtInAddress->setAddress1($defaultAddressAddress1);
		$builtInAddress->setAddress2($defaultAddressAddress2);
		$builtInAddress->setCity($defaultAddressCity);
		$builtInAddress->setPostcode($defaultAddressPostcode);
		$builtInAddress->setCountryId($cartConfig['config_country_id']);
		$builtInAddress->setZoneId($cartConfig['config_zone_id']);
	
		$builtInCustomerDetails->setCustomer($builtInCustomer);
		$builtInCustomerDetails->setAddresses(array($builtInAddress));
	
		return $customerDetails;
	}
}