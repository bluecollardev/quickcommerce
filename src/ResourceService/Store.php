<?php

namespace App\ResourceService;

use App\ResourceService;
use App\Resource\ProductDiscount as Resource;

class Store extends ResourceService
{
    /**
     * Get user service
     */
    public function init()
    {
		// Second param needs to be defined
        $em = $this->getEntityManager();
		$this->setResource(new Resource($em, 'OcStore'));
    }
	
	/**
     * Show options in header
     */
    public function options()
    {
        self::response(self::STATUS_OK, array(), array('GET', 'OPTIONS'));
    }
}