<?php

namespace QuickCommerce\Model\Plugin;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class PosDecimalQuantity extends PosProduct {
	/**
	 * @var boolean
	 *
	 * @ORM\Column(name="weight_price", type="boolean", nullable=true, options={"default":0})
	 */
	protected $weightPrice = '0';
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="weight_name", type="string", length=20, nullable=true, options={"default":"Weight"})
	 */
	protected $weightName = 'Weight';
}