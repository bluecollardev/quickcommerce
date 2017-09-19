<?php

namespace QuickCommerce\API\Service;

/**
 * The abstract version services

 *
 */
abstract class AbstractUrlsService extends AbstractAPIService {
	/**
	 * The Urls serivce
	 * {@inheritDoc}
	 * @see \QuickCommerce\API\IAPIService::retrieve()
	 */
	public function retrieve($id, $filters) {
		// return all supported urls, $id is not required for this service
		return array_map(function($url) { return '/api/v1' . $url; }, $this->adapter->getUrls());
	}
}