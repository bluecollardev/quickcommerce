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
 * The cart service
 * @author Administrator
 *
 */
class Oc2CartService extends AbstractCartService {
	/**
	 * {@inheritDoc}
	 * @see \QuickCommerce\API\Service\AbstractOrderService::getOrderDetails()
	 * 
	 * @return PosOrderDetails
	 * 
	 */
	public function getCartDetails($cartId) {
		// Get cart details including cart products, payemnts, histories, options, total and vouchers
		$em = $this->adapter->getEntityManager();
		
		$cartDetails = new PosCartDetails();
		
		// Get cart model
		/** @var $cart PosCart */
		$cart = $em->find(PosCart::class, $cartId);
		
		if (!empty($cart)) {
			$cartDetails->setCart($cart);
			
			$criteria = array('cartId' => $cartId);
			// cart is found, get the rest of cart details
			
			$serverCartProducts = $em->getRepository(PosCartProduct::class)->findBy($criteria);
			$cartProducts = array();
			$productRepository = $em->getRepository(PosProduct::class);
			foreach ($serverCartProducts as $serverCartProduct) {
				$cartProduct = new PosCartProductDetails();
				$cartProduct->cloneParent($serverCartProduct);

				$product = $productRepository->find($cartProduct->getProductId());
				$cartProduct->setImage($product->getImage());
				$cartProduct->setShipping($product->getShipping());
				$cartProduct->setUpdateStock($product->getSubtract());
				
				$cartProducts[] = $cartProduct;
			}
			$cartDetails->setCartProducts($cartProducts);
			
			$customerId = $cart->getCustomerId();
			if ($customerId > 0) {
				$cartCustomer = new PosCustomerDetails();
				$cartCustomer->setCustomer($em->find(PosCustomer::class, $customerId));
				$cartCustomer->setAddresses($em->getRepository(PosAddress::class)->findBy(array('customerId' => $customerId)));
				$cartDetails->setCartCustomer($cartCustomer);
			}
			
			/*$cartPaymentDetails = array();
			$cartPayments = $em->getRepository(PosCartPayment::class)->findBy($criteria);
			if (!empty($cartPayments)) {
				foreach ($cartPayments as $cartPayment) {
					$cartPaymentDetail = new PosCartPaymentDetails();
					$cartPaymentDetail->setCartPayment($cartPayment);
					$cartPaymentType = $em->find(PosPaymentType::class, $cartPayment->getPaymentTypeId());
					$cartPaymentDetail->setType($cartPaymentType->getType());
					$cartPaymentDetail->setName($cartPaymentType->getName());
				
					$cartPaymentDetails[] = $cartPaymentDetail;
				}
			}*/

			$cartDetails->setCartOptions($em->getRepository(PosCartOption::class)->findBy($criteria));
			$cartDetails->setCartTotals($em->getRepository(PosCartTotal::class)->findBy($criteria, array('sortCart' => 'ASC')));
			//$cartDetails->setCartPayments($cartPaymentDetails);
		}
		
		return $cartDetails;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \QuickCommerce\API\Service\AbstractCartService::modifyCart()
	 */
	public function modifyCart($cartId, PosCartAction $cartAction) {
		$em = $this->adapter->getEntityManager();
		
		try {
			// in case $cartId is 0, create an cart, otherwise, update the cart
			if ($cartId == 0) {
				$cartDetails = $this->createCart($em, $cartAction);
			} elseif ($cartId > 0) {
				$cartDetails = $this->updateCart($em, $cartId, $cartAction);
			} else {
				throw APIException::cartNotExists($cartId);
			}
			
			$sql = "SELECT model.quantity FROM " . PosProduct::class . " model WHERE model.productId = ?1";
			$query = $em->createQuery($sql);
			$productId = 0;
			/*if ($cartAction->getProductId()) {
				$productId = $cartAction->getProductId();
			} elseif ($cartAction->getCartProduct()) {
				$productId = $cartAction->getCartProduct()->getProductId();
			}
			$result = $query->setParameter(1, $productId)->getArrayResult();
			
			if ($result && count($result) > 0) {
				$cartDetails->setLeftStock(array($productId => $result[0]['quantity']));
			}*/
			
			return $cartDetails;
		} catch (\Exception $exception) {
			$log = $this->adapter->getLogger();
			$log->debug($exception->getMessage());
			$log->debug($exception->getTraceAsString());
		}
		
		return null;
	}
	
	/**
	 * Create a new cart using $data
	 * @param array $data
	 * 
	 * @return array cartDetails
	 * 
	 */
	private function createCart(EntityManager $em, PosCartAction $cartAction) {
		// only accept 'insert' action to create a new cart
		if ($cartAction->getAction() != 'insert') {
			throw APIException::cartCannotBeCreated($cartAction);
		}
		
		// Create an new cart
		$cartId = $this->newCart($em, $cartAction->getDefaultSettings());
		
		// Add the product to the cart
		//$this->addProduct($em, $cartId, $cartAction);
		
		// re-calculate totals
		$cartDriver = $this->adapter->getCartDriver();
		$cartDetails = $cartDriver->getCartDetails($em, $cartId, $cartAction->getCartTaxRates(), $cartAction->getShipping());
		//$cartDetails = $cartDriver->getCartDetails($em, $cartId, null, null);

		return $cartDetails;
	}
	
	private function newCart(EntityManager $em, $settings) {
		// create a new empty cart with all default settings and return the newly created cart id
		$cart = new PosCart();
		
		$cart->setStoreId(0);
		
		$defaultCountryId = isset($settings['POS_a_country_id']) ? $settings['POS_a_country_id'] : $settings['config_country_id'];
		$defaultZoneId = isset($settings['POS_a_zone_id']) ? $settings['POS_a_zone_id'] : $settings['config_zone_id'];
		$customerId = isset($settings['POS_c_id']) ? $settings['POS_c_id'] : 0;
		$customerGroupId = isset($settings['POS_c_group_id']) ? $settings['POS_c_group_id'] : (isset($settings['config_customer_group_id']) ? $settings['config_customer_group_id'] : 1);
		$initialStatusId = isset($settings['POS_initial_status_id']) ? (int)$settings['POS_initial_status_id'] : 1;
		
		$cart->setShippingCountryId($defaultCountryId);
		$cart->setShippingZoneId($defaultZoneId);
		$cart->setPaymentCountryId($defaultCountryId);
		$cart->setPaymentZoneId($defaultZoneId);
		$cart->setCustomerId($customerId);
		$cart->setCustomerGroupId($customerGroupId);
		
		$customerType = isset($settings['POS_c_type']) ? (int)$settings['POS_c_type'] : 1;
		switch ($customerType) {
			case 1:
				// Use build in address
				$this->setBuiltInCustomer($cart, $defaultCountryId, $defaultZoneId);
				break;
				
			case 2:
				// Use customized address
				$this->setCustomCustomer($cart, $settings);
				break;
				
			case 3:
				// Use an existing customer address
				$this->setExistingCustomer($cart, $customerId);
				break;
				
			default:
				break;
		}
		
		/** @var $store PosStore */
		if ($cart->getStoreId()) {
			$store = $em->find(PosStore::class, $cart->getStoreId());
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

		$cart->setStoreName($storeName);
		$cart->setStoreUrl($storeUrl);
		$cart->setInvoicePrefix('pos');
		$cart->setShippingMethod('instore');
		$cart->setShippingCode('instore.instore');
		$cart->setPaymentMethod('In Store');
		$cart->setPaymentCode('in_store');
		$cart->setComment('');
		$cart->setCartStatusId($initialStatusId);
		$cart->setCustomerId($customerId);
		$cart->setCustomerGroupId($customerGroupId);
		$cart->setPaymentCountry($countryName);
		$cart->setPaymentZone($zoneName);
		$cart->setShippingCountry($countryName);
		$cart->setShippingZone($zoneName);
		$cart->setCurrencyCode($defaultCurrencyCode);
		$cart->setCurrencyId($currencyId);
		$cart->setDateAdded(new \DateTime());
		$cart->setDateModified(new \DateTime());
		
		$em->persist($cart);
		$em->flush();
		$cartId = $cart->getCartId();
		
		$total = new PosCartTotal();
		$total->setCartId($cartId);
		$total->setCode('total');
		$total->setValue(0);
		$total->setSortCart($settings['total_sort_cart']);
		$total->setTitle('Total');
		
		$em->persist($total);
		$em->flush();
		
		return $cartId;
	}
	
	private function setBuiltInCustomer(PosCart &$cart, $defaultCountryId, $defaultZoneId) {
		$cart->setFirstname('In-Store');
		$cart->setLastname('Customer');
		$cart->setEmail('instore.customer@dummy.com');
		$cart->setTelephone('1600');
		$cart->setFax('');
		
		$cart->setPaymentFirstname('In-store');
		$cart->setPaymentLastname('Customer');
		$cart->setPaymentCompany('');
		$cart->setPaymentAddress1('customer address');
		$cart->setPaymentAddress2('');
		$cart->setPaymentCity('customer city');
		$cart->setPaymentPostcode('1600');
		$cart->setPaymentCountryId($defaultCountryId);
		$cart->setPaymentZoneId($defaultZoneId);
		
		$cart->setShippingFirstname('In-Store');
		$cart->setShippingLastname('Customer');
		$cart->setShippingAddress1('customer address');
		$cart->setShippingAddress2('');
		$cart->setShippingCity('customer city');
		$cart->setShippingPostcode('1600');
		$cart->setShippingCountryId($defaultCountryId);
		$cart->setShippingZoneId($defaultZoneId);
	}
	
	private function setCustomCustomer(&$cart, $settings) {
		$cart->setFirstname($settings['POS_c_firstname']);
		$cart->setLastname($settings['POS_c_lastname']);
		$cart->setEmail($settings['POS_c_email']);
		$cart->setTelephone($settings['POS_c_telephone']);
		$cart->setFax($settings['POS_c_fax']);
		
		$cart->setPaymentFirstname($settings['POS_a_firstname']);
		$cart->setPaymentLastname($settings['POS_a_lastname']);
		$cart->setPaymentCompany('');
		$cart->setPaymentAddress1($settings['POS_a_address_1']);
		$cart->setPaymentAddress2($settings['POS_a_address_2']);
		$cart->setPaymentCity($settings['POS_a_city']);
		$cart->setPaymentPostcode($settings['POS_a_postcode']);
		$cart->setPaymentCountryId($settings['POS_a_country_id']);
		$cart->setPaymentZoneId($settings['POS_a_zone_id']);

		$cart->setShippingFirstname($settings['POS_a_firstname']);
		$cart->setShippingLastname($settings['POS_a_lastname']);
		$cart->setShippingAddress1($settings['POS_a_address_1']);
		$cart->setShippingAddress2($settings['POS_a_address_2']);
		$cart->setShippingCity($settings['POS_a_city']);
		$cart->setShippingPostcode($settings['POS_a_postcode']);
		$cart->setShippingCountryId($settings['POS_a_country_id']);
		$cart->setShippingZoneId($settings['POS_a_zone_id']);
	}
	
	private function setExistingCustomer(&$cart, $customerId) {
		// Get the customer details and assign it to cart
		$customerDetails = $this->adapter->getService('Customer')->retrieve($customerId, null);
		
		if (!empty($customerDetails['customer'])) {
			$customer = $customerDetails['customer'];
			
			$cart->setFirstname($customer['firstname']);
			$cart->setLastname($customer['lastname']);
			$cart->setEmail($customer['email']);
			$cart->setTelephone($customer['telephone']);
			$cart->setFax($customer['fax']);
			
			$address = array();
			if (!empty($customerDetails['addresses'])) {
				foreach ($customerDetails['addresses'] as $customerAddress) {
					if ($customerAddress['addressId'] == $customer['addressId']) {
						$address = $customerAddress;
						break;
					}
				}
			}
			
			if (!empty($address)) {
				$cart->setPaymentFirstname($address['firstname']);
				$cart->setPaymentLastname($address['lastname']);
				$cart->setPaymentCompany($address['company']);
				$cart->setPaymentAddress1($address['address_1']);
				$cart->setPaymentAddress2($address['address_2']);
				$cart->setPaymentCity($address['city']);
				$cart->setPaymentPostcode($address['postcode']);
				$cart->setPaymentCountryId($address['country_id']);
				$cart->setPaymentZoneId($address['zone_id']);
		
				$cart->setShippingFirstname($address['firstname']);
				$cart->setShippingLastname($address['lastname']);
				$cart->setShippingAddress1($address['address_1']);
				$cart->setShippingAddress2($address['address_2']);
				$cart->setShippingCity($address['city']);
				$cart->setShippingPostcode($address['postcode']);
				$cart->setShippingCountryId($address['country_id']);
				$cart->setShippingZoneId($address['zone_id']);
			}
		}
	}
	
	private function addProduct(EntityManager $em, $cartId, PosCartAction $cartAction) {
		// Add the product to an cart
		$clientCartProduct = $cartAction->getCartProduct();
		$cartProduct = new PosCartProduct();
		$methods = get_class_methods(PosCartProduct::class);
		foreach ($methods as $method) {
			if (substr($method, 0, 3) === 'set') {
				$getMethod = sprintf('get%s', substr($method, 3));
				$cartProduct->$method($clientCartProduct->$getMethod());
			}
		}
		
		if ($cartId <= 0 || empty($cartProduct) || $cartProduct->getQuantity() == 0) return;
		
		$cartProduct->setCartId($cartId);
		$cartProduct->setProductId($cartAction->getProductId());
		$cartProduct->setReward(0); // TODO: Why is this missing?

		$em->persist($cartProduct);
		$em->flush();

		$cartProductId = $cartProduct->getCartProductId();
		
		$cartOptions = $cartAction->getCartOptions();
		
		if (!empty($cartOptions)) {
			foreach ($cartOptions as $cartOption) {
				$cartOption->setCartId($cartId);
				$cartOption->setCartProductId($cartProductId);
				$em->persist($cartOption);
			}
		}
		
		// Update product / option stock
		if ($clientCartProduct->getUpdateStock()) {
			$this->updateStock($em, $cartProduct, $cartOptions);
		}
		
		$em->flush();
	}
	
	private function updateStock(EntityManager $em, PosCartProduct $cartProduct, $cartOptions) {
		// Update product stock
		$productId = $cartProduct->getProductId();
		$quantity = $cartProduct->getQuantity();
		$productOptionValueIds = array();
		if (!empty($cartOptions)) {
			foreach ($cartOptions as $cartOption) {
				/** @var $cartOption PosCartOption */
				if ($cartOption->getProductOptionValueId()) {
					$productOptionValueIds[] = $cartOption->getProductOptionValueId();
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

	private function updateCart(EntityManager $em, $cartId, PosCartAction $cartAction) {
		$action = $cartAction->getAction();

		if ($action == 'insert') {
			// add a new cart product
			$this->addProduct($em, $cartId, $cartAction);
		} else {
			$after = $cartAction->getQuantityAfter();
			$quantityChange = $after - $cartAction->getQuantityBefore();

			$productOptionValueIds = array();
			$sql = "SELECT oo.productOptionValueId FROM " . PosCartOption::class . " oo WHERE oo.cartProductId = ?1";
			$query = $em->createQuery($sql);
			$query->setParameter(1, $cartAction->getCartProductId());
			$result = $query->getArrayResult();
			foreach ($result as $record) {
				$productOptionValueIds[] = $record['productOptionValueId'];
			}
			
			if ($action == 'modifyQuantity') {
				if ($after > 0) {
					// update the quantity for the given cart product id
					$sql = "UPDATE " . PosCartProduct::class . " op SET op.quantity = " . $after . ", op.total = op.price * " . $after . " WHERE op.cartProductId = ?1";
					$query = $em->createQuery($sql);
					$query->setParameter(1, $cartAction->getCartProductId());
					$query->execute();
				} else {
					// Delete the given cart product id and options
					$sql = "DELETE FROM " . PosCartProduct::class . " op WHERE op.cartProductId = ?1";
					$query = $em->createQuery($sql);
					$query->setParameter(1, $cartAction->getCartProductId());
					$query->execute();
					
					$sql = "DELETE FROM " . PosCartOption::class . " op WHERE op.cartProductId = ?1";
					$query = $em->createQuery($sql);
					$query->setParameter(1, $cartAction->getCartProductId());
					$query->execute();
				}
				
				$this->updateRealStock($em, $cartAction->getProductId(), $productOptionValueIds, $quantityChange);
			}
		}
		
		// re-calculate totals
		$cartDriver = $this->adapter->getCartDriver();
		$cartDetails = $cartDriver->getCartDetails($em, $cartId, $cartAction->getCartTaxRates(), $cartAction->getShipping());
		
		return $cartDetails;
	}
}