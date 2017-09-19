<?php

namespace QuickCommerce\Adapter;

use Doctrine\ORM\EntityManager;
use QuickCommerce\Model\View\PosOrderDetails;

interface IOrderDriver {
	/**
	 * Get the total by calling Opencart Total functions
	 * @param EntityManager $em
	 * @param integer $orderId
	 * 
	 * @return PosOrderDetails
	 * 
	 */
	//public function getOrderDetails(EntityManager $em, $orderId, $taxRates, $shipping);
	public function getOrderDetails(EntityManager $em, $orderId, $taxRates, $shipping);
}