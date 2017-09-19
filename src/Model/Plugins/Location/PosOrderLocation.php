<?php

namespace QuickCommerce\Model\Plugin;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class PosOrderLocation extends ModelOrder {
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="location_id", type="integer", nullable=true, options={"default":0})
	 */
	protected $locationId = '0';
}