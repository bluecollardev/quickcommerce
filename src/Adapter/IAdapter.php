<?php

namespace QuickCommerce\Adapter;

use QuickCommerce\API\Service\AbstractAPIService;
use QuickCommerce\API\Application;
use Doctrine\ORM\EntityManager;
use QuickCommerce\Model\Core\AppUser\PosUser;
use Monolog\Logger;

interface IAdapter {
	// the interface that the adapters should implements
	/**
	 * Get the adapter ID
	 * @return string
	 */
	public function getAdapterId();

	/**
	 * Get the adapter type
	 * @return string
	 */
	public function getAdapterType();
	
	/**
	 * Get the adapter class prefix
	 * @return string
	 */
	public function getAdapterServiceClassPrefix();
	
	/**
	 * @return \Doctrine\ORM\EntityManager
	 */
	public function getEntityManager();
	
	/**
	 * search the cart config (espeicially the database config) to be used by the POS installer
	 *
	 * @param $dir is the directory from where the adapter will search the backend
	 * @return array
	 */
	public function searchConfig($dir);
	
	/**
	 * Find the service for the given model
	 * @param string $model
	 * 
	 * @return AbstractAPIService
	 * 
	 */
	public function getService($model);
	
	/**
	 * Return all the Urls the application provides
	 * 
	 * @return array
	 * 
	 */
	public function getUrls();
	
	/**
	 * Before calling the SQL query, perpare the calling context
	 * and return the entity manager
	 * 
	 * @return mixed
	 * 
	 */
	public function beforeQuery();
	
	/**
	 * After calling the SQL query, clean up the calling context
	 * @param mixed $entity
	 * 
	 * @return void
	 * 
	 */
	public function afterQuery($entity);
	
	/**
	 * Get the totals driver that will be used to calculate totals
	 * 
	 * @return IOrderDriver
	 */
	public function getOrderDriver();
	
	/**
	 * Login to the cart using given username and password
	 * @param string $username
	 * @param string $password
	 * 
	 * @return PosUser
	 * 
	 */
	//public function login($username, $password);
	
	/**
	 * @return Logger
	 */
	public function getLogger();
}