<?php

namespace QuickCommerce\Model\Plugin;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class PosNonCatalogProduct extends PosProduct {
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="quick_sale", type="integer", nullable=true, options={"default":1})
	 */
	protected $quickSale = '1';
}