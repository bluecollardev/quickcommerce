<?php

namespace QuickCommerce\Model\Plugin;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class PosPosReturnOption extends PosAbstractEntity {
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="return_option_id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	protected $returnOptionId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="return_id", type="integer", nullable=false)
	 */
	protected $returnId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="product_option_id", type="integer", nullable=false)
	 */
	protected $productOptionId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="product_option_value_id", type="integer", nullable=false)
	 */
	protected $productOptionValueId;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="name", type="string", length=255, nullable=false)
	 */
	protected $name;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="value", type="text", length=65535, nullable=false)
	 */
	protected $value;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="type", type="string", length=32, nullable=false)
	 */
	protected $type;
}

