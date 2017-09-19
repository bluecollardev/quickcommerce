<?php

namespace QuickCommerce\Model\Plugin;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class PosPosTable extends PosAbstractEntity {
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="table_id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	protected $tableId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="location_id", type="integer", nullable=false)
	 */
	protected $locationId;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="coors", type="string", length=32, nullable=true)
	 */
	protected $coors;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="name", type="string", length=32, nullable=false)
	 */
	protected $name;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="description", type="string", length=100, nullable=true)
	 */
	protected $description;
}

