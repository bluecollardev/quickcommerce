<?php

namespace QuickCommerce\Model\Plugin;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class PosArea extends PosAbstractEntity {
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="area_id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	protected $areaId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="zone_id", type="integer", nullable=true)
	 */
	protected $zoneId;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="name", type="string", length=128, nullable=false)
	 */
	protected $name;
}
