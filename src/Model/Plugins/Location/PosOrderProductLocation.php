<?php

namespace QuickCommerce\Model\Plugin;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class PosOrderProductLocation extends PosOrderProduct {
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="location_id", type="integer", nullable=true, options={"default":1})
	 */
	protected $locationId = '1';
}