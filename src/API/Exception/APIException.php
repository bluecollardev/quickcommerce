<?php

namespace QuickCommerce\API\Exception;

class APIException extends \Exception {
	/**
	 * In case the url is called for not supported method
	 * @param string $method
	 * @param string $url
	 * @return \QuickCommerce\API\Exception\APIException
	 */
	public static function notSupported($method, $url) {
		return new self("The API '$url' does not support method '$method'.");
	}
	
	/**
	 * In case the adapter is not installed properly
	 * @return \QuickCommerce\API\Exception\APIException
	 */
	public static function noAdapterFound() {
		return new self("Cannot find any adapters, please contact your software provider.");
	}
	
	/**
	 * In case the entity manager cannot be created
	 * @return \QuickCommerce\API\Exception\APIException
	 */
	public static function noEntityManagerCreated() {
		return new self("Cannot create entity manager, check your adapter configuration.");
	}
	
	/**
	 * In case the adapter did not implement the required service
	 * @return \QuickCommerce\API\Exception\APIException
	 */
	public static function serviceNotImplemented($classname) {
		return new self("Cannot find the implementation of '$classname'");
	}
	
	/**
	 * @param int $orderId
	 * @return \QuickCommerce\API\Exception\APIException
	 */
	public static function orderNotExists($orderId) {
		return new self("The order #$orderId requested to be processed does not exist.");
	}
	
	/**
	 * @param int $data
	 * @return \QuickCommerce\API\Exception\APIException
	 */
	public static function orderCannotBeCreated($data) {
		return new self("An order cannot be created using give data " . print_r($data, true));
	}
	
	/**
	 * @param string $classname
	 * @return \QuickCommerce\API\Exception\APIException
	 */
	public static function cannotConvertArrayToEntity($classname, $errorMessage) {
		return new self("Cannot convert the given data to the specified class name '$classname', details are $errorMessage");
	}
	
	/**
	 * @param string $classname
	 * @return \QuickCommerce\API\Exception\APIException
	 */
	public static function orderDriverNotFound($classname) {
		return new self("The order driver for class '$classname' cannot be found.");
	}

	/**
	 * @param string $classname
	 * @return \QuickCommerce\API\Exception\APIException
	 */
	public static function invalidDriverType($driverType) {
		return new self("Invalid Doctrine driver type provided: " . $driverType);
	}
}
