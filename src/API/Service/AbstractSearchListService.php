<?php

namespace QuickCommerce\API\Service;

/**
 * The abstract search services

 *
 */
abstract class AbstractSearchListService extends AbstractAPIService {
	/**
	 * only support post that the search criteria can be passed in the request body
	 * {@inheritDoc}
	 * @see \QuickCommerce\API\IAPIService::create()
	 */
	public function create($data) {
		$model = $data['model'];
		$limit = isset($data['limit']) ? (int)$data['limit'] : 8;
		$page = isset($data['page']) ? (int)$data['page'] : 1;
		$filters = isset($data['filters']) ? $data['filters'] : array();
		$fields = isset($data['fields']) ? $data['fields'] : array();
		$sort = isset($data['sort']) ? $data['sort'] : array();
		
		return $this->searchList($model, $limit, $page, $filters, $fields, $sort);
	}
	
	/**
	 * Search the given model with filters and pages
	 * @param string $model
	 * @param int $page
	 * @param int $limit
	 * @param array $filters with element ('name', 'operation', 'value')
	 * @param array $fields with element ('fieldName')
	 * @param array $sort with a list of (attribute, asc|desc)
	 * 
	 * @return array
	 * 
	 */
	abstract protected function searchList($model, $limit, $page, $filters, $fields, $sort);
}