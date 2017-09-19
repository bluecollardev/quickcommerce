<?php

namespace QuickCommerce\Model\Plugin;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class PosUserLocation extends PosUser {
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="location_id", type="integer", nullable=true, options={"default":1})
	 */
	protected $locationId = '1';
}