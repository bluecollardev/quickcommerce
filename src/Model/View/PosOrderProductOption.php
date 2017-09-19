<?php

namespace QuickCommerce\Model\View;

use QuickCommerce\Model\PosAbstractEntity;

class PosOrderProductOption extends PosAbstractEntity {
	/**
	 * @var integer
	 */
	protected $productOptionId;
	
	/**
	 * @var integer
	 */
	protected $optionId;
	
	/**
	 * @var boolean
	 */
	protected $required;
	
	/**
	 * @var string
	 */
	protected $type;
	
	/**
	 * @var string
	 */
	protected $rawType;
	
	/**
	 * could be simple string value if option type is not selectable
	 * otherwise could be a single / multiple productOptionValueIds
	 * @var mixed
	 */
	protected $productOptionValue;
	
	/**
	 * The option name in the given language
	 * @var string
	 */
	protected $name;
	
	public function getProductOptionId() {
		return $this->productOptionId;
	}
	public function setProductOptionId($productOptionId) {
		$this->productOptionId = $productOptionId;
		return $this;
	}
	public function getType() {
		return $this->type;
	}
	public function setType($type) {
		$this->type = $type;
		return $this;
	}
	public function getProductOptionValue() {
		return $this->productOptionValue;
	}
	public function setProductOptionValue($productOptionValue) {
		$this->productOptionValue = $productOptionValue;
		return $this;
	}
	public function getRawType() {
		return $this->rawType;
	}
	public function setRawType($rawType) {
		$this->rawType = $rawType;
		return $this;
	}
	public function getOptionId() {
		return $this->optionId;
	}
	public function setOptionId($optionId) {
		$this->optionId = $optionId;
		return $this;
	}
	public function getRequired() {
		return $this->required;
	}
	public function setRequired($required) {
		$this->required = $required;
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

