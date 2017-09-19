<?php

namespace QuickCommerce\Model\Plugin;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class PosProductPacking extends PosAbstractEntity {
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="packing_id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	protected $packingId;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="packing_slip", type="string", length=50, nullable=false)
	 */
	protected $packingSlip;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="order_number", type="string", length=50, nullable=false)
	 */
	protected $orderNumber;
	
	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="date", type="datetime", nullable=true)
	 */
	protected $date;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="note", type="string", length=100, nullable=true)
	 */
	protected $note;
}

