<?php

namespace App\ResourceService;

use App\ResourceService;
use App\Resource\ProductRecurring as Resource;

class ProductRecurring extends ResourceService
{
    /**
     * Get user service
     */
    public function init()
    {
		// Second param needs to be defined
		$this->setResource(new Resource($this->getEntityManager(), 'OcProductRecurring'));
    }
	
	/**
     * Show Recurrings in header
     */
    public function options()
    {
        self::response(self::STATUS_OK, array(), array('GET', 'RecurringS'));
    }
}