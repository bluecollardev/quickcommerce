<?php
namespace QuickCommerce\Model;

abstract class PosAbstractEntity {
	/**
	 * Return the values for the given fields
	 * @param array $fields
	 * @return array An array of field and value pair
	 */
	public function getValues($fields = array()) {
		return $this->getLeveledValues($fields, 1, $this->getValuesLevel());
	}
	
	/**
	 * Return the values for the given fields with leveled details
	 * @param array $fields
	 * @param int $level
	 * @param int $maxLevel
	 * @return array An array of field and value pair
	 */
	public function getLeveledValues($fields = array(), $level = 1, $maxLevel = 9) {
		$result = array();
		
		foreach ($this as $field => $value) {
			$fieldValue = $value;
			
			if (empty($fields) || in_array($field, $fields)) {
				if (is_array($value)) {
					$fieldValue = array();
					foreach ($value as $key => $child) {
						if (is_a($child, PosAbstractEntity::class) && $level < $maxLevel) {
							$fieldValue[$key] = $child->getLeveledValues($fields, $level + 1, $maxLevel);
						} else {
							$fieldValue[$key] = $child;
						}
					}
				} elseif (is_a($value, PosAbstractEntity::class) && $level < $maxLevel) {
					$fieldValue = $value->getLeveledValues($fields, $level + 1, $maxLevel);
				}
				
				$result[$field] = $fieldValue;
			}
		}
		
		return $result;
	}
	
	/**
	 * the default filter for the modules
	 * 
	 * @return array
	 */
	public function getDefaultFilters() {
		return array();
	}
	
	/**
	 * the default level to be returned for the entity
	 * 
	 * @return int
	 */
	public function getValuesLevel() {
		return 1;
	}
	
	public function getLangInfo() {
		return null;
	}
}