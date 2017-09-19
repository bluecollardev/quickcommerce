<?php

namespace App\Resource;

use App\Resource;
use OcProduct as Entity;

class Product extends Resource
{
    protected static $format = array(
        'product' => array(
            'description' => null,
            'attribute' => array(
                'attribute' => array(
                    'description' => null,
                    'attributeGroup' => array(
                        'description' => null
                    )
                )
            ),
            'option' => array(
                'description',
                'option' => array(
                    'optionValues' => null
                ),
                'productOptionValues' => array(
                    'optionValue' => array(
                        'description' => null
                    )
                )
            ),
            'taxClass' => null,
            'manufacturer' => null
        )
    );

    protected static $exclude = array('language', 'productOption');

    public function getEntity($id, $serialize = true, $tableize = true, $format = array(), $exclude = array()) {
        return parent::getEntity($id, $serialize, $tableize, self::$format, self::$exclude);
    }

    public function getCollection($serialize = true, $tableize = true, $format = array(), $exclude = array(), $limit = 150, $offset = 0, $order = array()) {
        return parent::getCollection($serialize, $tableize, self::$format, self::$exclude, $limit, $offset, $order);
    }
}