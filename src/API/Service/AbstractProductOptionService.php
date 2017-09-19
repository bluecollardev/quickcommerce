<?php

namespace QuickCommerce\API\Service;

/**
 * The abstract order services

 *
 */
abstract class AbstractProductOptionService extends AbstractAPIService {
	/**
	 * {@inheritDoc}
	 * @see \QuickCommerce\API\IAPIService::retrieve()
	 */
	public function retrieve($id, $filters) {
		// return product option details
		$languageId = isset($filters['languageId']) ? (int)$filters['languageId'] : 1;
		return $this->getProductOptions($id, $languageId);
	}
	
	abstract public function getProductOptions($productId, $languageId);
}