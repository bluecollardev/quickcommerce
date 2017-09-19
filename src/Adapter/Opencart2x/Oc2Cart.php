<?php

namespace QuickCommerce\Adapter;

use QuickCommerce\Model\Core\Checkout\PosOrderProduct;

class Oc2Cart {
	private $session;
	private $orderProducts = array();
	private $orderOptions = array();
	private $taxRates = array();
	private $shipping = false;
	
	public function __construct($registry) {
		$this->session = $registry->get('session');
	}

	public function getProducts() {
		return $this->orderProducts;
	}

	public function set($orderProducts, $orderOptions, $taxRates, $shipping) {
		$this->orderProducts = $orderProducts;
		$this->orderOptions = $orderOptions;
		$this->taxRates = $taxRates;
		$this->shipping = $shipping;
	}
	
	public function clear() {
		$this->orderProducts = array();
		$this->orderOptions = array();
	}

	public function getWeight() {
		$weight = 0;
		foreach ($this->orderProducts as $orderProduct) {
			/** @var $orderProduct PosOrderProduct */
			$weight += $orderProduct->getWeight() ? $orderProduct->getWeight() : 0;
		}
		
		return $weight;
	}

	public function getSubTotal() {
		$total = 0;
		foreach ($this->orderProducts as $orderProduct) {
			/** @var $orderProduct PosOrderProduct */
			$total += $orderProduct->getTotal();
		}
		
		return $total;
	}
	
	public function getTaxes() {
		return $this->taxRates;
	}
	
	public function getTotal() {
		$total = 0;
		foreach ($this->orderProducts as $orderProduct) {
			/** @var $orderProduct PosOrderProduct */
			$total += $orderProduct->getTotal() + $orderProduct->getQuantity() * $orderProduct->getTax();
		}

		return $total;
	}
	
	public function countProducts() {
		$productTotal = 0;
		
		foreach ($this->orderProducts as $orderProduct) {
			/** @var $orderProduct PosOrderProduct */
			$productTotal += $orderProduct->getQuantity();
		}
		
		return $productTotal;
	}
	
	public function hasProducts() {
		return count($this->getProducts());
	}
	
	public function hasRecurringProducts() {
		return false;
	}
	
	public function hasStock() {
		return true;
	}
	
	public function hasShipping() {
		return $this->shipping;
	}
	
	public function hasDownload() {
		return false;
	}
}