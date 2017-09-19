<?php

namespace QuickCommerce\API\Service;

/**
 * The abstract report services

 *
 */
abstract class AbstractReportService extends AbstractAPIService {
	/**
	 * {@inheritDoc}
	 * @see \QuickCommerce\API\IAPIService::retrieve()
	 */
	public function retrieve($date, $filters) {
		// return order details, only for pattern "GET /order/orderId" ($filters and $attributes are not used for now)
		return $this->getReport($date);
	}

	public abstract function getReport($date);
}
