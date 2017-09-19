<?php

namespace App\ResourceService;

use App\ResourceService;
use App\Resource\Product as Resource;

class Product extends ResourceService
{
    /**
     * Get user service
     */
    public function init()
    {
		// Second param needs to be defined
        $em = $this->getEntityManager();
		$this->setResource(new Resource($em, 'OcProduct'));
    }
	
	/**
     * Show options in header
     */
    public function options()
    {
        self::response(self::STATUS_OK, array(), array('GET', 'OPTIONS'));
    }
}