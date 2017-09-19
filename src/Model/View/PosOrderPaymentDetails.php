<?php

namespace QuickCommerce\Model\View;

use QuickCommerce\Model\PosAbstractEntity;

class PosOrderPaymentDetails extends PosAbstractEntity {
	/**
	 * @var PosOrderPayment
	 */
	protected $orderPayment;
	
	/**
	 * @var string
	 */
	protected $type;

	/**
	 * @var string
	 */
	protected $name;
	
	public function getOrderPayment() {
		return $this->orderPayment;
	}
	public function setOrderPayment(PosOrderPayment $orderPayment) {
		$this->orderPayment = $orderPayment;
		return $this;
	}
	public function getType() {
		return $this->type;
	}
	public function setType($type) {
		$this->type = $type;
		return $this;
	}
	public function getName() {
		return $this->name;
	}
	public function setName($name) {
		$this->name = $name;
		return $this;
	}
}

