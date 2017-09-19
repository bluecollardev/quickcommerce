<?php

namespace QuickCommerce\API\Service;

/**
 * The abstract order services

 *
 */
abstract class AbstractCategoryService extends AbstractAPIService {
	/**
	 * {@inheritDoc}
	 * @see \QuickCommerce\API\IAPIService::retrieve()
	 */
	public function retrieve($id, $filters) {
		$customerGroupId = isset($filters['customerGroupId']) ? (int)$filters['customerGroupId'] : 1;
		$numberOfLoadedSubCategories = isset($filters['numberOfLoadedSubCategories']) ? (int)$filters['numberOfLoadedSubCategories'] : 0;
		$numberOfLoadedProducts = isset($filters['numberOfLoadedProducts']) ? (int)$filters['numberOfLoadedProducts'] : 0;
		$languageId = isset($filters['languageId']) ? (int)$filters['languageId'] : 1;
		
		return $this->getCategoryDetails((int)$id, $customerGroupId, $numberOfLoadedSubCategories, $numberOfLoadedProducts, $languageId);
	}
	
	abstract public function getCategoryDetails($categoryId, $customerGroupId, $numberOfLoadedSubCategories, $numberOfLoadedProducts, $languageId);
	
	/**
	 * {@inheritDoc}
	 * @see \QuickCommerce\API\IAPIService::create()
	 */
	public function create($data) {
		// return category / product list, only for pattern "POST /category" with filters
		return $this->searchProducts($data);
	}
	
	public abstract function searchProducts($filters);
}