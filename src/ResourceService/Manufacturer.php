<?php

namespace App\ResourceService;

use App\ResourceService;
use App\Resource\Manufacturer as Resource;

class Manufacturer extends ResourceService
{
    /**
     * Get user service
     */
    public function init()
    {
		// Second param needs to be defined
        $em = $this->getEntityManager();
		$this->setResource(new Resource($em, 'OcManufacturer'));
    }
	
	/**
     * Show options in header
     */
    public function options()
    {
        self::response(self::STATUS_OK, array(), array('GET', 'OPTIONS'));
    }
}