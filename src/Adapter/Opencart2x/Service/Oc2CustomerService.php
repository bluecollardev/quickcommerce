<?php

namespace QuickCommerce\Adapter\OC2\Service;

use QuickCommerce\API\Service\AbstractCustomerService;
use Doctrine\ORM\EntityManager;
use QuickCommerce\Model\Core\Customer\PosCustomer;
use QuickCommerce\Model\Core\Address\PosAddress;
use QuickCommerce\Model\Core\Checkout\PosOrder;
use QuickCommerce\Model\View\PosCustomerDetails;
use QuickCommerce\Util\PosUtil;

/**
 * The customer service
 * @author Administrator
 *
 */
class Oc2CustomerService extends AbstractCustomerService {
	/**
	 * {@inheritDoc}
	 * @see \QuickCommerce\API\Service\AbstractCustomerService::getCustomerDetails()
	 */
	public function getCustomerDetails($customerId) {
		if (!$customerId || $customerId <= 0) return null;
		
		// Get customer details and its addresses
		$em = $this->adapter->getEntityManager();
		
		$customerDetails = new PosCustomerDetails();
		
		/** @var $customer PosCustomer */
		$customer = $em->find(PosCustomer::class, $customerId);
		$customerDetails->setCustomer($customer);
		
		$addresses = $em->getRepository(PosAddress::class)->findBy(array('customerId' => $customerId));
		$customerDetails->setAddresses($addresses);
		
		$this->adapter->getLogger()->debug(print_r($customerDetails, true));
		
		return $customerDetails;
	}
	
	/**
	 * Get customer addresses
	 * @param EntityManager $em
	 * @param integer $customerId
	 * 
	 * @return array
	 * 
	 */
	private function getCustomerAddresses(EntityManager $em, $customerId) {
		// Get customer addresses
		$sql = "SELECT model FROM " . PosAddress::class . " model WHERE model.customerId = ?1";
		$query = $em->createQuery($sql);
		$query->setParameter(1, $customerId);
		return $query->getArrayResult();
	}
	
	/**
	 * {@inheritDoc}
	 * @see \QuickCommerce\API\Service\AbstractCustomerService::modifyCustomer()
	 */
	public function modifyCustomer($customerId, $data) {
		// if customerId > 0, update customer details
		// else if customerId < 0, indicates this is a new customer, create the customer with $data
		// otherwise, update order details instead
		$em = $this->adapter->getEntityManager();
		try {
			if ($customerId > 0) {
				$customerDetails = $this->updateCustomer($em, $customerId, $data);
			} elseif ($customerId < 0) {
				$customerDetails = $this->createCustomer($em, $data);
			}

			if ($customerId == 0 && isset($data['orderId'])) {
				$customerDetails = $this->setCustomerForOrder($em, $data);
			} elseif (isset($data['orderId'])) {
				// Find the default address for the customer
				$address = null;
				if (!empty($customerDetails->getAddresses())) {
					foreach ($customerDetails->getAddresses() as $customerAddress) {
						if ($customerAddress->getAddressId() == $customerDetails->getCustomer()->getAddressId()) {
							$address = $customerAddress;
							break;
						}
					}
				}

				// Update the order with new customer details and default address
				$this->setOrderCustomer($em, $data['orderId'], $customerDetails->getCustomer(), $address);
			}

			$em->flush();

			return $customerDetails;
		} catch (\Exception $exception) {
			$this->adapter->getLogger()->debug($exception->getMessage());
		}
	}
	
	private function createCustomer(EntityManager $em, $data) {
		$customerDetails = new PosCustomerDetails();
		
		$customerData = $data['customerDetails'];
		
		if (isset($customerData['customer']['customerId'])) {
			unset($customerData['customer']['customerId']);
		}
		
		$customer = new PosCustomer();
		PosUtil::array2Entity($customer, $customerData['customer']);
		//$customer->setSalt(md5('qc' + date('l jS \of F Y h:i:s A')));
		$customer->setSalt('qc'); // Make this configurable
		$customer->setPassword(md5($customer->getSalt() + date('l jS \of F Y h:i:s A')));
		$customer->setStatus(1);
		$customer->setApproved(true);
		$customer->setSafe(true);
		$customer->setToken('');
		$customer->setDateAdded(new \DateTime());
		$customer->setCustomerGroupId(1);

		$em->persist($customer);
		
		$em->flush();
		
		if (!empty($customerData['addresses'])) {
			$addresses = $this->setCustomerAddresses($em, $customer, $customerData['addresses']);
			$customerDetails->setAddresses($addresses);
		}

		$customerDetails->setCustomer($customer);

		return $customerDetails;
	}

	private function updateCustomer(EntityManager $em, $customerId, $data) {
		$customerDetails = new PosCustomerDetails();

		$customerData = $data['customerDetails'];

		$customer = $em->find(PosCustomer::class, $customerId);
		PosUtil::array2Entity($customer, $customerData['customer']);

		//$customer->setSalt(md5('quickcommerce' + date('l jS \of F Y h:i:s A')));
		//$customer->setApproved(true);
		//$customer->setSafe(false);
		//$customer->setToken('');

		$em->persist($customer);

		$em->flush();

		if (!empty($customerData['addresses'])) {
			$addresses = $this->setCustomerAddresses($em, $customer, $customerData['addresses']);
			$customerDetails->setAddresses($addresses);
		}

		$customerDetails->setCustomer($customer);

		if (!empty($customerData['addresses'])) {
			$addresses = $this->setCustomerAddresses($em, $customer, $customerData['addresses']);
			$customerDetails->setAddresses($addresses);
		}

		$customerDetails->setCustomer($customer);
		return $customerDetails;
	}
	
	private function setCustomer(EntityManager $em, $customerId, $data) {
		$customerDetails = new PosCustomerDetails();
		
		$customerData = $data['customerDetails'];

		$customer = $em->find(PosCustomer::class, $customerId);
		PosUtil::array2Entity($customer, $customerData['customer']);
		
		if (!empty($customerData['addresses'])) {
			$addresses = $this->setCustomerAddresses($em, $customer, $customerData['addresses']);
			$customerDetails->setAddresses($addresses);
		}

		$customerDetails->setCustomer($customer);
		
		return $customerDetails;
	}
	
	private function setCustomerAddresses(EntityManager $em, PosCustomer &$customer, $addresses) {
		$updatedAddresses = array();
		
		foreach ($addresses as $addressData) {
			if ($addressData['addressId'] > 0) {
				$updatedAddresses[] = $this->setAddress($em, $addressData['addressId'], $addressData);
			} else {
				$updatedAddresses[] = $this->createAddress($em, $customer, $addressData);
			}
		}
		
		return $updatedAddresses;
	}
	
	private function createAddress(EntityManager $em, PosCustomer &$customer, $addressData) {
		$address = new PosAddress();
		
		$isDefaultAddress = false;
		
		if (isset($addressData['addressId'])) {
			if ($addressData['addressId'] == $customer->getAddressId()) {
				$isDefaultAddress = true;
			}
			unset($addressData['addressId']);
		}
		
		PosUtil::array2Entity($address, $addressData);
		$address->setCustomerId($customer->getCustomerId());
		$em->persist($address);
		
		if ($isDefaultAddress) {
			$em->flush();
			$customer->setAddressId($address->getAddressId());
		}
		
		return $address;
	}
	
	private function setAddress(EntityManager $em, $addressId, $addressData) {
		$address = $em->find(PosAddress::class, $addressId);
		PosUtil::array2Entity($address, $addressData);
		
		return $address;
	}
	
	private function setCustomerForOrder(EntityManager $em, $data) {
		$orderId = $data['orderId'];

		$customerData = $data['customerDetails'];
		$customer = new PosCustomer();
		PosUtil::array2Entity($customer, $customerData['customer']);
		$customer->setCustomerGroupId(1);
			
		$this->setOrderCustomer($em, $orderId, $customer, null);
		
		$customerDetails = new PosCustomerDetails();
		$customerDetails->setCustomer($customer);
		
		return $customerDetails;
	}
	
	/**
	 * Update the order from the updated customer details
	 * @param EntityManager $em
	 * @param integer $orderId
	 * @param PosCustomer $customer
	 * @param PosAddress $address or null, Cannot define $address as PosAddress as we might pass in null
	 */
	private function setOrderCustomer(EntityManager $em, $orderId, PosCustomer $customer, $address) {
		$order = $em->find(PosOrder::class, $orderId);
		
		$order->setCustomerId($customer->getCustomerId());
		$order->setCustomerGroupId($customer->getCustomerGroupId());
		$order->setFirstname($customer->getFirstname());
		$order->setLastname($customer->getLastname());
		$order->setEmail($customer->getEmail());
		$order->setTelephone($customer->getTelephone());
		$order->setFax($customer->getFax());
		
		if (!empty($address)) {
			// Set the shipping address to the default customer address
			$order->setShippingFirstname($address->getFirstname());
			$order->setShippingLastname($address->getLastname());
			$order->setShippingCompany($address->getCompany());
			$order->setShippingCity($address->getCity());
			$order->setShippingAddress1($address->getAddress1());
			$order->setShippingAddress2($address->getAddress2());
			$order->setShippingPostcode($address->getPostcode());
			$order->setShippingCountryId($address->getCountryId());
			$order->setShippingZoneId($address->getZoneId());
			// Set the payment address to the default customer address
			$order->setPaymentFirstname($address->getFirstname());
			$order->setPaymentLastname($address->getLastname());
			$order->setPaymentCity($address->getCity());
			$order->setPaymentAddress1($address->getAddress1());
			$order->setPaymentAddress2($address->getAddress2());
			$order->setPaymentPostcode($address->getPostcode());
			$order->setPaymentCountryId($address->getCountryId());
			$order->setPaymentZoneId($address->getZoneId());
		} else {
			$order->setShippingFirstname($customer->getFirstname());
			$order->setShippingLastname($customer->getLastname());
			$order->setPaymentFirstname($customer->getFirstname());
			$order->setPaymentLastname($customer->getLastname());
		}
	}
}