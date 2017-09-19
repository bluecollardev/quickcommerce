<?php

namespace QuickCommerce\Model\Plugin;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class PosProductSnPacking extends PosAbstractEntity {
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="sn_packing_id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	protected $snPackingId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="packing_id", type="integer", nullable=false)
	 */
	protected $packingId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="product_sn_id", type="integer", nullable=false)
	 */
	protected $productSnId;
}

