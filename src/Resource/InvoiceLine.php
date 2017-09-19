<?php

namespace App\Resource;

use App\Resource;
use \OcInvoiceLine as Entity;

class InvoiceLine extends Resource
{
    protected static $format = array(
        'line' => array(
            'taxClass' => null,
            'product' => null
        )
    );

    public function getEntity($id, $serialize = true, $tableize = true, $format = array(), $exclude = array()) {
        return parent::getEntity($id, $serialize, $tableize, self::$format, self::$exclude);
    }

    public function getCollection($serialize = true, $tableize = true, $format = array(), $exclude = array(), $limit = 100, $offset = 0, $order = array()) {
        return parent::getCollection($serialize, $tableize, self::$format, self::$exclude, $limit, $offset, $order);
    }
}