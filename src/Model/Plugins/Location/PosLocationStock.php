<?php

namespace QuickCommerce\Model\Plugin;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class PosLocationStock extends PosAbstractEntity {
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="location_stock_id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	protected $locationStockId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="location_id", type="integer", nullable=true)
	 */
	protected $locationId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="product_id", type="integer", nullable=false)
	 */
	protected $productId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="product_option_value_id", type="integer", nullable=true)
	 */
	protected $productOptionValueId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="quantity", type="integer", nullable=true)
	 */
	protected $quantity;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="low_stock", type="integer", nullable=true, options={"default":3})
	 */
	//protected $lowStock = '3';
}

