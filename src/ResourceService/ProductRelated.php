<?php

namespace App\ResourceService;

use App\ResourceService;
use App\Resource\ProductRelated as Resource;

class ProductRelated extends ResourceService
{
    /**
     * Get user service
     */
    public function init()
    {
		// Second param needs to be defined
		$this->setResource(new Resource($this->getEntityManager(), 'OcProductRelated'));
    }
	
	/**
     * Show Relateds in header
     */
    public function options()
    {
        self::response(self::STATUS_OK, array(), array('GET', 'RelatedS'));
    }
}