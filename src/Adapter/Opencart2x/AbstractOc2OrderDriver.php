<?php

namespace QuickCommerce\Adapter;

use Doctrine\ORM\EntityManager;
use QuickCommerce\Model\Core\Checkout\PosOrderProduct;
use QuickCommerce\Model\Core\Checkout\PosOrderOption;
use QuickCommerce\Model\Core\Checkout\PosOrder;
use QuickCommerce\Model\Core\Payment\PosOrderPayment;
use QuickCommerce\Model\Core\Customer\PosCustomer;
use QuickCommerce\Model\Core\Checkout\PosOrderTotal;
use QuickCommerce\Model\View\PosOrderDetails;
use QuickCommerce\Model\View\PosOrderPaymentDetails;
use QuickCommerce\Model\Core\Payment\PosPaymentType;

abstract class AbstractOc2OrderDriver implements IOrderDriver {
	private $registry;
	
	public function __construct($registry) {
		$this->registry = $registry;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \QuickCommerce\Adapter\IOrderDriver::getOrderDetails()
	 */
	public function getOrderDetails(EntityManager $em, $orderId, $taxRates, $shipping) {
		$orderProducts = $em->getRepository(PosOrderProduct::class)->findBy(array('orderId' => $orderId));
		$orderOptions = $em->getRepository(PosOrderOption::class)->findBy(array('orderId' => $orderId));

		/** @var $order PosOrder */
		$order = $em->find(PosOrder::class, $orderId);
		
		// login as the order customer
		if ($order->getCustomerId()) {
			/** @var $customer PosCustomer */
			$customer = $em->find(PosCustomer::class, $order->getCustomerId());
			if ($customer) {
				$this->registry->get('customer')->login($customer->getEmail(), '', true);
			}
		}
		
		$this->registry->get('tax')->setTaxRates($taxRates);
		
		// Add all order products to the cart
		$this->registry->get('cart')->set($orderProducts, $orderOptions, $taxRates, $shipping);
		
		$totals = array();
		$taxes = $this->registry->get('cart')->getTaxes();
		$total = 0;

		$total_data = array(
			'totals' => &$totals,
			'taxes'  => &$taxes,
			'total'  => &$total
		);
		
		$sort_order = array();
		
		$this->registry->get('load')->model('extension/extension');
		$results = $this->registry->get('model_extension_extension')->getExtensions('total');
		
		foreach ($results as $key => $value) {
			$sort_order[$key] = $this->registry->get('config')->get($value['code'] . '_sort_order');
		}
		
		// Settings
		$query = $this->registry->get('db')->query("SELECT * FROM `" . DB_PREFIX . "setting` WHERE store_id = '0' OR store_id = '" . (int)$this->registry->get('config')->get('config_store_id') . "' ORDER BY store_id ASC");
		
		foreach ($query->rows as $result) {
			if (!$result['serialized']) {
				$this->registry->get('config')->set($result['key'], $result['value']);
			} else {
				$this->registry->get('config')->set($result['key'], json_decode($result['value'], true));
			}
		}

		array_multisort($sort_order, SORT_ASC, $results);
		
		foreach ($results as $result) {
			if ($this->registry->get('config')->get($result['code'] . '_status')) {
				$this->getTotals($this->registry, $result['code'], $total_data);
			}
		}
		
		// update the total in order
		$order->setTotal($total);
		
		// remove all current totals before new totals are persist
		$sql = "DELETE FROM " . PosOrderTotal::class . " total WHERE total.orderId = ?1";
		$query = $em->createQuery($sql);
		$query->setParameter(1, $orderId)->execute();
		
		$sort_order = array();
		
		foreach ($totals as $key => $value) {
			$sort_order[$key] = $value['sort_order'];
		}
		
		array_multisort($sort_order, SORT_ASC, $totals);
		
		$orderTotals = array();
		
		foreach ($totals as $total) {
			$orderTotals[] = array(
				'code' => $total['code'],
				'value' => $total['value'],
				'title' => $total['title']
//				'title' => $total['title'],
//				'text'  => $this->registry->get('currency')->format($total['value'], $order->getCurrencyCode())
			);
		
			// update order totals
			$orderTotal = new PosOrderTotal();
			$orderTotal->setCode($total['code']);
			$orderTotal->setOrderId($orderId);
			$orderTotal->setSortOrder($total['sort_order']);
			$orderTotal->setTitle($total['title']);
			$orderTotal->setValue($total['value']);
			
			$em->persist($orderTotal);
		}

		$em->flush();
		
		$this->registry->get('cart')->clear();
		
				
		/*$orderPaymentDetails = array();
		$orderPayments = $em->getRepository(PosOrderPayment::class)->findBy(array('orderId' => $orderId));
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
		
		$orderDetails = new PosOrderDetails();
		$orderDetails->setOrder($order);
		$orderDetails->setOrderProducts($orderProducts);
		$orderDetails->setOrderOptions($orderOptions);
		$orderDetails->setOrderTotals($orderTotals);
		//$orderDetails->setOrderPayments($orderPaymentDetails);
		$orderDetails->setShipping($shipping);
		
		return $orderDetails;
	}
	
	public abstract function getTotals($registry, $code, &$total_data);
}