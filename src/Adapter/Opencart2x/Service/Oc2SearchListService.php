<?php

namespace QuickCommerce\Adapter\OC2\Service;

use QuickCommerce\API\Service\AbstractSearchListService;

/**
 * The search list services
 * @author Jimmy
 *
 */
class Oc2SearchListService extends AbstractSearchListService {
	/**
	 * {@inheritDoc}
	 * @see \QuickCommerce\API\Service\AbstractSearchService::serach()
	 */
	protected function searchList($model, $limit, $page, $filters, $fields, $sort) {
		$classname = "QuickCommerce\\Model\\" . $model;
		$log = $this->adapter->getLogger();
		if (class_exists($classname)) {
			$log->debug('calling search service');
			
			$em = $this->adapter->getEntityManager();
			
			$query = "SELECT ";
			if (!empty($fields)) {
				array_walk($fields, function(&$value, $key) { $value = 'model.' . $value; });
				$query .= implode(",", $fields);
			} else {
				$query .= 'model';
			}
			$query .= " FROM " . $classname . " model";
		
			$total_query = "SELECT count(model) FROM " . $classname . " model";
		
			$query .= " WHERE 1 = 1";
			$total_query .= " WHERE 1 = 1";
				
			$params = array();
			$clause = $this->getFilterClause($params, $filters);
		
			$query .= $clause;
			$total_query .= $clause;
		
			// get the default filters
			$class = new \ReflectionClass($classname);
			$instance = $class->newInstanceWithoutConstructor();
			$defaultFilters = $instance->getDefaultFilters();
			$clause = $this->getFilterClause($params, $defaultFilters);
		
			$query .= $clause;
			$total_query .= $clause;
			
			if (!empty($sort)) {
				$query .= ' ORDER BY';
				for ($index = 0; $index < count($sort); $index++) {
					$query .= ' model.' . $sort[$index][0] . ' ' . $sort[$index][1];
					if ($index < count($sort) - 1) {
						$query .= ',';
					}
				}
			}
			$log->debug($query);
				
			try {
				$db_query = $em->createQuery($query);
					
				$db_total_query = $em->createQuery($total_query);
					
				foreach ($params as $key => $value) {
					$db_query->setParameter($key, $value);
					$db_total_query->setParameter($key, $value);
				}
					
				$total = $db_total_query->getSingleScalarResult();
					
				if ($total <= $limit && $page > 1) {
					$page = 1;
				}
					
				if ($limit) {
					$db_query->setFirstResult(($page-1) * $limit)->setMaxResults($limit);
				}
					
				$result = $db_query->getResult();
		
			} catch (\Exception $exception) {
				$log->debug($exception->getTraceAsString());
				$result = array();
				$total = 0;
				$page = 0;
			}
				
			$array = array();
			foreach ($result as $record) {
				if (is_a($record, 'QuickCommerce\Entity\PosAbstractEntity')) {
					$array[] = $record->getValues();
				} else {
					$array[] = $record;
				}
			}
			return array('list' => $array, 'total' => $total, 'page' => $page);
				
		} else {
			$log->debug('cannot find class ' . $classname);
			return array('error' => 'cannot find class ' . $classname);
		}
	}
	
	private function getFilterClause(&$params, $filters) {
		$clause = '';
		$start = count($params) + 1;
	
		if (!empty($filters)) {
			foreach ($filters as $filter) {
				$filterName = $filter['name'];
	
				$special = strpos($filterName, ' ');
				if ($special !== false) {
					$names = explode(' ', $filterName);
					array_walk($names, function(&$value, $key) { $value = 'model.' . $value; });
					$filterName = 'CONCAT(' . implode(",' ',", $names) . ')';
				} else {
					$filterName = 'model.' . $filterName;
				}
	
				$clause .= " AND " . $filterName . " " . $filter['operation'] . " ?" . $start;
				$params[$start] = $filter['value'];
	
				$start++;
			}
		}
	
		return $clause;
	}
}