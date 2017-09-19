<?php

namespace QuickCommerce\Model\View;

use QuickCommerce\Model\PosAbstractEntity;
use QuickCommerce\Model\Core\Checkout\PosOrder;

class PosOrderDetails extends PosAbstractEntity {
	/**
	 * @var PosOrder
	 */
	protected $order;
	
	/**
	 * @var array of PosOrderProduct
	 */
	protected $orderProducts;

	/**
	 * @var array of PosOrderOption
	 */
	protected $orderOptions;
	
	/**
	 * @var array of PosOrderPaymentDetails
	 */
	protected $orderPayments;
	
	/**
	 * @var array of PosOrderTotal
	 */
	protected $orderTotals;
	
	/**
	 * @var PosCustomerDetails
	 */
	protected $orderCustomer;
	
	/**
	 * Indicates if the order requires shipping
	 * @var boolean
	 */
	protected $shipping;
	
	/**
	 * The updated stock for the updated product of this action, include productId and the stock
	 * @var array
	 */
	protected $leftStock;
	
	public function getOrder() {
		return $this->order;
	}
	public function setOrder(PosOrder $order) {
		$this->order = $order;
		return $this;
	}
	public function getOrderProducts() {
		return $this->orderProducts;
	}
	public function setOrderProducts(array $orderProducts) {
		$this->orderProducts = $orderProducts;
		return $this;
	}
	public function getOrderOptions() {
		return $this->orderOptions;
	}
	public function setOrderOptions(array $orderOptions) {
		$this->orderOptions = $orderOptions;
		return $this;
	}
	public function getOrderPayments() {
		return $this->orderPayments;
	}
	public function setOrderPayments(array $orderPayments) {
		$this->orderPayments = $orderPayments;
		return $this;
	}
	public function getOrderTotals() {
		return $this->orderTotals;
	}
	public function setOrderTotals(array $orderTotals) {
		$this->orderTotals = $orderTotals;
		return $this;
	}
	public function getShipping() {
		return $this->shipping;
	}
	public function setShipping($shipping) {
		$this->shipping = $shipping;
		return $this;
	}
	public function getLeftStock() {
		return $this->leftStock;
	}
	public function setLeftStock($leftStock) {
		$this->leftStock = $leftStock;
		return $this;
	}
	public function getOrderCustomer() {
		return $this->orderCustomer;
	}
	public function setOrderCustomer(PosCustomerDetails $orderCustomer) {
		$this->orderCustomer = $orderCustomer;
		return $this;
	}
}

