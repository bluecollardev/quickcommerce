<?php

namespace QuickCommerce\Model\Plugin;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class PosOrderPackingDate extends ModelOrder {
	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="date_sold", type="datetime", nullable=true)
	 */
	protected $dateSold;
	
	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="date_delivery", type="datetime", nullable=true)
	 */
	protected $dateDelivery;
}