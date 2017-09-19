<?php

namespace QuickCommerce\Adapter\OC2\Service;

use Doctrine\ORM\EntityManager;
use QuickCommerce\API\Exception\APIException;
use QuickCommerce\API\Service\AbstractOrderService;
use QuickCommerce\Model\Core\Currency\PosCurrency;
use QuickCommerce\Model\Core\Checkout\PosOrder;
use QuickCommerce\Model\Core\Checkout\PosOrderOption;
use QuickCommerce\Model\Core\Checkout\PosOrderProduct;
use QuickCommerce\Model\Core\Checkout\PosOrderTotal;
use QuickCommerce\Model\Core\Product\PosProduct;
use QuickCommerce\Model\Core\Product\PosProductOptionValue;
use QuickCommerce\Model\Core\Store\PosStore;
use QuickCommerce\Model\Core\Address\PosZone;
use QuickCommerce\Model\Core\Address\PosCountry;
use QuickCommerce\Model\Core\Address\PosAddress;
use QuickCommerce\Model\Core\Customer\PosCustomer;
use QuickCommerce\Model\Core\Payment\PosOrderPayment;
use QuickCommerce\Model\Core\Payment\PosPaymentType;
use QuickCommerce\Model\View\PosOrderAction;
use QuickCommerce\Model\View\PosOrderDetails;
use QuickCommerce\Model\View\PosCustomerDetails;
use QuickCommerce\Model\View\PosOrderPaymentDetails;
use QuickCommerce\Model\View\PosOrderProductDetails;

/**
 * The order service
 * @author Administrator
 *
 */
class Oc2OrderService extends AbstractOrderService {
	/**
	 * {@inheritDoc}
	 * @see \QuickCommerce\API\Service\AbstractOrderService::getOrderDetails()
	 * 
	 * @return PosOrderDetails
	 * 
	 */
	public function getOrderDetails($orderId) {
		// Get order details including order products, payemnts, histories, options, total and vouchers
		$em = $this->adapter->getEntityManager();
		
		$orderDetails = new PosOrderDetails();
		
		// Get order model
		/** @var $order PosOrder */
		$order = $em->find(PosOrder::class, $orderId);
		
		if (!empty($order)) {
			$orderDetails->setOrder($order);
			
			$criteria = array('orderId' => $orderId);
			// order is found, get the rest of order details
			
			$serverOrderProducts = $em->getRepository(PosOrderProduct::class)->findBy($criteria);
			$orderProducts = array();
			$productRepository = $em->getRepository(PosProduct::class);
			foreach ($serverOrderProducts as $serverOrderProduct) {
				$orderProduct = new PosOrderProductDetails();
				$orderProduct->cloneParent($serverOrderProduct);

				$product = $productRepository->find($orderProduct->getProductId());
				$orderProduct->setImage($product->getImage());
				$orderProduct->setShipping($product->getShipping());
				$orderProduct->setUpdateStock($product->getSubtract());
				
				$orderProducts[] = $orderProduct;
			}
			$orderDetails->setOrderProducts($orderProducts);
			
			$customerId = $order->getCustomerId();
			if ($customerId > 0) {
				$orderCustomer = new PosCustomerDetails();
				$orderCustomer->setCustomer($em->find(PosCustomer::class, $customerId));
				$orderCustomer->setAddresses($em->getRepository(PosAddress::class)->findBy(array('customerId' => $customerId)));
				$orderDetails->setOrderCustomer($orderCustomer);
			}
			
			/*$orderPaymentDetails = array();
			$orderPayments = $em->getRepository(PosOrderPayment::class)->findBy($criteria);
			if (!empty($orderPayments)) {
				foreach ($orderPayments as $orderPayment) {
					$orderPaymentDetail = new PosOrderPaymentDetails();
					$orderPaymentDetail->setOrderPayment($orderPayment);
					$orderPaymentType = $em->find(PosPaymentType::class, $orderPayment->getPaymentTypeId());
					$orderPaymentDetail->setType($orderPaymentType->getType());
					$orderPaymentDetail->setName($orderPaymentType->getName());
				
					$orderPaymentDetails[] = $orderPaymentDetail;
				}
			}*/

			$orderDetails->setOrderOptions($em->getRepository(PosOrderOption::class)->findBy($criteria));
			$orderDetails->setOrderTotals($em->getRepository(PosOrderTotal::class)->findBy($criteria, array('sortOrder' => 'ASC')));
			//$orderDetails->setOrderPayments($orderPaymentDetails);
		}
		
		return $orderDetails;
	}

	/**
	 * Create a new order using $data
	 * @param array $data
	 * 
	 * @return array orderDetails
	 * 
	 */
	private function createOrder(EntityManager $em, PosOrderAction $orderAction) {
		// only accept 'insert' action to create a new order
		if ($orderAction->getAction() != 'insert') {
			throw APIException::orderCannotBeCreated($orderAction);
		}
		
		// Create an new order
		$orderId = $this->newOrder($em, $orderAction->getDefaultSettings());
		
		// Add the product to the order
		//$this->addProduct($em, $orderId, $orderAction);
		
		// re-calculate totals
		$orderDriver = $this->adapter->getOrderDriver();
		$orderDetails = $orderDriver->getOrderDetails($em, $orderId, $orderAction->getOrderTaxRates(), $orderAction->getShipping());
		//$orderDetails = $orderDriver->getOrderDetails($em, $orderId, null, null);

		return $orderDetails;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \QuickCommerce\API\Service\AbstractOrderService::modifyOrder()
	 */
	public function modifyOrder($orderId, PosOrderAction $orderAction) {
		$em = $this->adapter->getEntityManager();
		
		try {
			// in case $orderId is 0, create an order, otherwise, update the order
			if ($orderId == 0) {
				$orderDetails = $this->createOrder($em, $orderAction);
			} elseif ($orderId > 0) {
				$orderDetails = $this->updateOrder($em, $orderId, $orderAction);
			} else {
				throw APIException::orderNotExists($orderId);
			}
			
			$sql = "SELECT model.quantity FROM " . PosProduct::class . " model WHERE model.productId = ?1";
			$query = $em->createQuery($sql);
			$productId = 0;
			/*if ($orderAction->getProductId()) {
				$productId = $orderAction->getProductId();
			} elseif ($orderAction->getOrderProduct()) {
				$productId = $orderAction->getOrderProduct()->getProductId();
			}
			$result = $query->setParameter(1, $productId)->getArrayResult();
			
			if ($result && count($result) > 0) {
				$orderDetails->setLeftStock(array($productId => $result[0]['quantity']));
			}*/
			
			return $orderDetails;
		} catch (\Exception $exception) {
			$log = $this->adapter->getLogger();
			$log->debug($exception->getMessage());
			$log->debug($exception->getTraceAsString());
		}
		
		return null;
	}
	
	private function newOrder(EntityManager $em, $settings) {
		// create a new empty order with all default settings and return the newly created order id
		$order = new PosOrder();
		
		$order->setStoreId(0);
		
		$defaultCountryId = isset($settings['POS_a_country_id']) ? $settings['POS_a_country_id'] : $settings['config_country_id'];
		$defaultZoneId = isset($settings['POS_a_zone_id']) ? $settings['POS_a_zone_id'] : $settings['config_zone_id'];
		$customerId = isset($settings['POS_c_id']) ? $settings['POS_c_id'] : 0;
		$customerGroupId = isset($settings['POS_c_group_id']) ? $settings['POS_c_group_id'] : (isset($settings['config_customer_group_id']) ? $settings['config_customer_group_id'] : 1);
		$initialStatusId = isset($settings['POS_initial_status_id']) ? (int)$settings['POS_initial_status_id'] : 1;
		
		$order->setShippingCountryId($defaultCountryId);
		$order->setShippingZoneId($defaultZoneId);
		$order->setPaymentCountryId($defaultCountryId);
		$order->setPaymentZoneId($defaultZoneId);
		$order->setCustomerId($customerId);
		$order->setCustomerGroupId($customerGroupId);
		
		$customerType = isset($settings['POS_c_type']) ? (int)$settings['POS_c_type'] : 1;
		switch ($customerType) {
			case 1:
				// Use build in address
				$this->setBuiltInCustomer($order, $defaultCountryId, $defaultZoneId);
				break;
				
			case 2:
				// Use customized address
				$this->setCustomCustomer($order, $settings);
				break;
				
			case 3:
				// Use an existing customer address
				$this->setExistingCustomer($order, $customerId);
				break;
				
			default:
				break;
		}
		
		/** @var $store PosStore */
		if ($order->getStoreId()) {
			$store = $em->find(PosStore::class, $order->getStoreId());
			$storeName = $store && $store->getName() ? $store->getName() : '';
			$storeUrl = $store && $store->getUrl() ? $store->getUrl() : '';
		}
		
		if (empty($storeName)) {
			$storeName = $settings['config_name'] ? $settings['config_name'] : '';
		}
		if (empty($storeUrl)) {
			$storeUrl = HTTP_SERVER;
		}
		
		/** @var $country PosCountry */
		$country = $em->find(PosCountry::class, $defaultCountryId);
		$countryName = $country->getName() ? $country->getName() : '';
		/** @var $zone PosZone */
		$zone = $em->find(PosZone::class, $defaultZoneId);
		$zoneName = $zone->getName() ? $zone->getName() : '';
		
		$defaultCurrencyCode = !empty($settings['config_currency']) ? $settings['config_currency'] : 'USD';
		/** @var $currency PosCurrency */
		$currency = $em->getRepository(PosCurrency::class)->findOneBy(array('code' => $defaultCurrencyCode));
		$currencyId = $currency->getCurrencyId() ? $currency->getCurrencyId() : 5;

		$order->setStoreName($storeName);
		$order->setStoreUrl($storeUrl);
		$order->setInvoicePrefix('pos');
		$order->setShippingMethod('instore');
		$order->setShippingCode('instore.instore');
		$order->setPaymentMethod('In Store');
		$order->setPaymentCode('in_store');
		$order->setComment('');
		$order->setOrderStatusId($initialStatusId);
		$order->setCustomerId($customerId);
		$order->setCustomerGroupId($customerGroupId);
		$order->setPaymentCountry($countryName);
		$order->setPaymentZone($zoneName);
		$order->setShippingCountry($countryName);
		$order->setShippingZone($zoneName);
		$order->setCurrencyCode($defaultCurrencyCode);
		$order->setCurrencyId($currencyId);
		$order->setDateAdded(new \DateTime());
		$order->setDateModified(new \DateTime());
		
		$em->persist($order);
		$em->flush();
		$orderId = $order->getOrderId();
		
		$total = new PosOrderTotal();
		$total->setOrderId($orderId);
		$total->setCode('total');
		$total->setValue(0);
		$total->setSortOrder($settings['total_sort_order']);
		$total->setTitle('Total');
		
		$em->persist($total);
		$em->flush();
		
		return $orderId;
	}

	private function updateOrder(EntityManager $em, $orderId, PosOrderAction $orderAction) {
		$action = $orderAction->getAction();
		$settings = $orderAction->getDefaultSettings();

		if ($action == 'insert') {
			// add a new order product
			$this->addProduct($em, $orderId, $orderAction);
			//QC Mod
		} elseif ($action == 'update') {
			$order = $em->find(PosOrder::class, $orderId);

			$order->setStoreId(0);

			$defaultCountryId = isset($settings['POS_a_country_id']) ? $settings['POS_a_country_id'] : $settings['config_country_id'];
			$defaultZoneId = isset($settings['POS_a_zone_id']) ? $settings['POS_a_zone_id'] : $settings['config_zone_id'];
			$customerId = isset($settings['POS_c_id']) ? $settings['POS_c_id'] : 0;
			$customerGroupId = isset($settings['POS_c_group_id']) ? $settings['POS_c_group_id'] : (isset($settings['config_customer_group_id']) ? $settings['config_customer_group_id'] : 1);
			$initialStatusId = isset($settings['POS_initial_status_id']) ? (int)$settings['POS_initial_status_id'] : 1;

			$order->setShippingCountryId($defaultCountryId);
			$order->setShippingZoneId($defaultZoneId);
			$order->setPaymentCountryId($defaultCountryId);
			$order->setPaymentZoneId($defaultZoneId);
			$order->setCustomerId($customerId);
			$order->setCustomerGroupId($customerGroupId);

			$customerType = isset($settings['POS_c_type']) ? (int)$settings['POS_c_type'] : 1;
			switch ($customerType) {
				case 1:
					// Use build in address
					$this->setBuiltInCustomer($order, $defaultCountryId, $defaultZoneId);
					break;

				case 2:
					// Use customized address
					$this->setCustomCustomer($order, $settings);
					break;

				case 3:
					// Use an existing customer address
					$this->setExistingCustomer($order, $customerId);
					break;

				default:
					break;
			}

			/** @var $store PosStore */
			if ($order->getStoreId()) {
				$store = $em->find(PosStore::class, $order->getStoreId());
				$storeName = $store && $store->getName() ? $store->getName() : '';
				$storeUrl = $store && $store->getUrl() ? $store->getUrl() : '';
			}

			if (empty($storeName)) {
				$storeName = $settings['config_name'] ? $settings['config_name'] : '';
			}
			if (empty($storeUrl)) {
				$storeUrl = HTTP_SERVER;
			}

			/** @var $country PosCountry */
			$country = $em->find(PosCountry::class, $defaultCountryId);
			$countryName = $country->getName() ? $country->getName() : '';
			/** @var $zone PosZone */
			$zone = $em->find(PosZone::class, $defaultZoneId);
			$zoneName = $zone->getName() ? $zone->getName() : '';

			$defaultCurrencyCode = !empty($settings['config_currency']) ? $settings['config_currency'] : 'USD';
			/** @var $currency PosCurrency */
			$currency = $em->getRepository(PosCurrency::class)->findOneBy(array('code' => $defaultCurrencyCode));
			$currencyId = $currency->getCurrencyId() ? $currency->getCurrencyId() : 5;

			$order->setStoreName($storeName);
			$order->setStoreUrl($storeUrl);
			$order->setInvoicePrefix('pos');
			$order->setShippingMethod('instore');
			$order->setShippingCode('instore.instore');
			$order->setPaymentMethod('In Store');
			$order->setPaymentCode('in_store');
			$order->setComment('');
			$order->setOrderStatusId($initialStatusId);
			$order->setCustomerId($customerId);
			$order->setCustomerGroupId($customerGroupId);
			$order->setPaymentCountry($countryName);
			$order->setPaymentZone($zoneName);
			$order->setShippingCountry($countryName);
			$order->setShippingZone($zoneName);
			$order->setCurrencyCode($defaultCurrencyCode);
			$order->setCurrencyId($currencyId);
			$order->setDateAdded(new \DateTime()); // TODO: This isn't right!
			$order->setDateModified(new \DateTime()); // TODO: This isn't right!

			$em->persist($order);
			$em->flush();
			$orderId = $order->getOrderId();

			// update order products
			$criteria = array('orderId' => $orderId);

			$serverOrderProducts = $em->getRepository(PosOrderProduct::class)->findBy($criteria);

			foreach ($serverOrderProducts as $serverOrderProduct) {
				//$serverOrderProduct->setShipping($product->getShipping());
				//$serverOrderProduct->setUpdateStock($product->getSubtract());
				$this->updateProduct($em, $orderId, $orderAction, $serverOrderProduct);
			}

			/*$total = new PosOrderTotal();
			$total->setOrderId($orderId);
			$total->setCode('total');
			$total->setValue(0);
			$total->setSortOrder($settings['total_sort_order']);
			$total->setTitle('Total');

			$em->persist($total);
			$em->flush();*/

			//return $orderId;
		} else {
			$after = $orderAction->getQuantityAfter();
			$quantityChange = $after - $orderAction->getQuantityBefore();

			$productOptionValueIds = array();
			$sql = "SELECT oo.productOptionValueId FROM " . PosOrderOption::class . " oo WHERE oo.orderProductId = ?1";
			$query = $em->createQuery($sql);
			$query->setParameter(1, $orderAction->getOrderProductId());
			$result = $query->getArrayResult();
			foreach ($result as $record) {
				$productOptionValueIds[] = $record['productOptionValueId'];
			}
			
			if ($action == 'modifyQuantity') {
				if ($after > 0) {
					// update the quantity for the given order product id
					$sql = "UPDATE " . PosOrderProduct::class . " op SET op.quantity = " . $after . ", op.total = op.price * " . $after . " WHERE op.orderProductId = ?1";
					$query = $em->createQuery($sql);
					$query->setParameter(1, $orderAction->getOrderProductId());
					$query->execute();
				} else {
					// Delete the given order product id and options
					$sql = "DELETE FROM " . PosOrderProduct::class . " op WHERE op.orderProductId = ?1";
					$query = $em->createQuery($sql);
					$query->setParameter(1, $orderAction->getOrderProductId());
					$query->execute();
					
					$sql = "DELETE FROM " . PosOrderOption::class . " op WHERE op.orderProductId = ?1";
					$query = $em->createQuery($sql);
					$query->setParameter(1, $orderAction->getOrderProductId());
					$query->execute();
				}
				
				$this->updateRealStock($em, $orderAction->getProductId(), $productOptionValueIds, $quantityChange);
			}
		}
		
		// re-calculate totals
		$orderDriver = $this->adapter->getOrderDriver();
		$orderDetails = $orderDriver->getOrderDetails($em, $orderId, $orderAction->getOrderTaxRates(), $orderAction->getShipping());
		
		return $orderDetails;
	}
	
	private function setBuiltInCustomer(PosOrder &$order, $defaultCountryId, $defaultZoneId) {
		$order->setFirstname('In-Store');
		$order->setLastname('Customer');
		$order->setEmail('instore.customer@dummy.com');
		$order->setTelephone('1600');
		$order->setFax('');
		
		$order->setPaymentFirstname('In-store');
		$order->setPaymentLastname('Customer');
		$order->setPaymentCompany('');
		$order->setPaymentAddress1('customer address');
		$order->setPaymentAddress2('');
		$order->setPaymentCity('customer city');
		$order->setPaymentPostcode('1600');
		$order->setPaymentCountryId($defaultCountryId);
		$order->setPaymentZoneId($defaultZoneId);
		
		$order->setShippingFirstname('In-Store');
		$order->setShippingLastname('Customer');
		$order->setShippingAddress1('customer address');
		$order->setShippingAddress2('');
		$order->setShippingCity('customer city');
		$order->setShippingPostcode('1600');
		$order->setShippingCountryId($defaultCountryId);
		$order->setShippingZoneId($defaultZoneId);
	}
	
	private function setCustomCustomer(&$order, $settings) {
		$order->setFirstname($settings['POS_c_firstname']);
		$order->setLastname($settings['POS_c_lastname']);
		$order->setEmail($settings['POS_c_email']);
		$order->setTelephone($settings['POS_c_telephone']);
		$order->setFax($settings['POS_c_fax']);
		
		$order->setPaymentFirstname($settings['POS_a_firstname']);
		$order->setPaymentLastname($settings['POS_a_lastname']);
		$order->setPaymentCompany('');
		$order->setPaymentAddress1($settings['POS_a_address_1']);
		$order->setPaymentAddress2($settings['POS_a_address_2']);
		$order->setPaymentCity($settings['POS_a_city']);
		$order->setPaymentPostcode($settings['POS_a_postcode']);
		$order->setPaymentCountryId($settings['POS_a_country_id']);
		$order->setPaymentZoneId($settings['POS_a_zone_id']);

		$order->setShippingFirstname($settings['POS_a_firstname']);
		$order->setShippingLastname($settings['POS_a_lastname']);
		$order->setShippingAddress1($settings['POS_a_address_1']);
		$order->setShippingAddress2($settings['POS_a_address_2']);
		$order->setShippingCity($settings['POS_a_city']);
		$order->setShippingPostcode($settings['POS_a_postcode']);
		$order->setShippingCountryId($settings['POS_a_country_id']);
		$order->setShippingZoneId($settings['POS_a_zone_id']);
	}
	
	private function setExistingCustomer(&$order, $customerId) {
		// Get the customer details and assign it to order
		$customerDetails = $this->adapter->getService('Customer')->retrieve($customerId, null);
		
		if (!empty($customerDetails->getCustomer()->getValues())) {
			$customer = $customerDetails->getCustomer()->getValues();
			
			$order->setFirstname($customer['firstname']);
			$order->setLastname($customer['lastname']);
			$order->setEmail($customer['email']);
			$order->setTelephone($customer['telephone']);
			$order->setFax($customer['fax']);
			
			$address = array();
			if (!empty($customerDetails->getAddresses())) {
				foreach ($customerDetails->getAddresses() as $customerAddress) {
					$customerAddress = $customerAddress->getValues();
					if ($customerAddress['addressId'] == $customer['addressId']) {
						$address = $customerAddress;
						break;
					}
				}
			}
			
			if (!empty($address)) {
				$order->setPaymentFirstname($address['firstname']);
				$order->setPaymentLastname($address['lastname']);
				$order->setPaymentCompany($address['company']);
				$order->setPaymentAddress1($address['address1']);
				$order->setPaymentAddress2($address['address2']);
				$order->setPaymentCity($address['city']);
				$order->setPaymentPostcode($address['postcode']);
				$order->setPaymentCountryId($address['countryId']);
				$order->setPaymentZoneId($address['zoneId']);
		
				$order->setShippingFirstname($address['firstname']);
				$order->setShippingLastname($address['lastname']);
				$order->setShippingAddress1($address['address1']);
				$order->setShippingAddress2($address['address2']);
				$order->setShippingCity($address['city']);
				$order->setShippingPostcode($address['postcode']);
				$order->setShippingCountryId($address['countryId']);
				$order->setShippingZoneId($address['zoneId']);
			}
		}
	}
	
	private function addProduct(EntityManager $em, $orderId, PosOrderAction $orderAction) {
		// Add the product to an order
		$clientOrderProduct = $orderAction->getOrderProduct();
		$orderProduct = new PosOrderProduct();
		$methods = get_class_methods(PosOrderProduct::class);
		foreach ($methods as $method) {
			if (substr($method, 0, 3) === 'set') {
				$getMethod = sprintf('get%s', substr($method, 3));
				$orderProduct->$method($clientOrderProduct->$getMethod());
			}
		}
		
		if ($orderId <= 0 || empty($orderProduct) || $orderProduct->getQuantity() == 0) return;
		
		$orderProduct->setOrderId($orderId);
		$orderProduct->setProductId($orderAction->getProductId());
		$orderProduct->setReward(0); // TODO: Why is this missing?

		$em->persist($orderProduct);
		$em->flush();

		$orderProductId = $orderProduct->getOrderProductId();
		
		$orderOptions = $orderAction->getOrderOptions();
		
		if (!empty($orderOptions)) {
			foreach ($orderOptions as $orderOption) {
				$orderOption->setOrderId($orderId);
				$orderOption->setOrderProductId($orderProductId);
				$em->persist($orderOption);
			}
		}
		
		// Update product / option stock
		if ($clientOrderProduct->getUpdateStock()) {
			$this->updateStock($em, $orderProduct, $orderOptions);
		}
		
		$em->flush();
	}
	
	private function updateProduct(EntityManager $em, $orderId, PosOrderAction $orderAction, PosOrderProduct $orderProduct) {
		$orderProductId = $orderProduct->getOrderProductId();

		$orderOptions = $orderAction->getOrderOptions();

		if (!empty($orderOptions)) {
			$sql = "DELETE FROM " . PosOrderOption::class . " op WHERE op.orderProductId = ?1";
			$query = $em->createQuery($sql);
			$query->setParameter(1, $orderProductId);
			$query->execute();

			foreach ($orderOptions as $orderOption) {
				$orderOption->setOrderId($orderId);
				$orderOption->setOrderProductId($orderProductId);
				$em->persist($orderOption);
			}
		}

		// Update product / option stock
		/*if ($orderProduct->getUpdateStock()) {
			$this->updateStock($em, $orderProduct, $orderOptions);
		}*/

		$em->flush();
	}

	private function updateStock(EntityManager $em, PosOrderProduct $orderProduct, $orderOptions) {
		// Update product stock
		$productId = $orderProduct->getProductId();
		$quantity = $orderProduct->getQuantity();
		$productOptionValueIds = array();
		if (!empty($orderOptions)) {
			foreach ($orderOptions as $orderOption) {
				/** @var $orderOption PosOrderOption */
				if ($orderOption->getProductOptionValueId()) {
					$productOptionValueIds[] = $orderOption->getProductOptionValueId();
				}
			}
		}
		
		$this->updateRealStock($em, $productId, $productOptionValueIds, $quantity);
	}
	
	private function updateRealStock(EntityManager $em, $productId, $productOptionValueIds, $quantity) {
		$this->adapter->getLogger()->debug('updating quantity with change ' . $quantity . ' for productId ' . $productId . ' and productOptionValueIds ' . print_r($productOptionValueIds, true));
		// Update product and option stock
		$sql = "UPDATE " . PosProduct::class . " product SET product.quantity = product.quantity - ?1 WHERE product.productId = ?2 AND product.subtract = '1'";
		$query = $em->createQuery($sql);
		$query->setParameter(1, $quantity);
		$query->setParameter(2, $productId);
		$query->execute();

		if (!empty($productOptionValueIds)) {
			foreach ($productOptionValueIds as $productOptionValueId) {
				$sql = "UPDATE " . PosProductOptionValue::class . " value SET value.quantity = value.quantity - ?1 WHERE value.productOptionValueId = ?2 and value.subtract = '1'";
				$query = $em->createQuery($sql);
				$query->setParameter(1, $quantity);
				$query->setParameter(2, $productOptionValueId);
				$query->execute();
			}
		}
	}

	
}