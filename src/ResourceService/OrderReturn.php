<?php

namespace App\ResourceService;

use App\ResourceService;
use App\Resource\OrderReturn as Resource;

class OrderReturn extends ResourceService
{
    /**
     * Get user service
     */
    public function init()
    {
		// Second param needs to be defined
		$this->setResource(new Resource($this->getEntityManager(), 'OcOrderReturn'));
    }
	
	/**
     * Show options in header
     */
    public function options()
    {
        self::response(self::STATUS_OK, array(), array('GET', 'OPTIONS'));
    }
}