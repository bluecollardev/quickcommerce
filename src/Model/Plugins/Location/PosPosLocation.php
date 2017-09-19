<?php

namespace QuickCommerce\Model\Plugin;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class PosPosLocation extends PosAbstractEntity {
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="location_id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	protected $locationId;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="code", type="string", length=1, nullable=false)
	 */
	protected $code;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="name", type="string", length=32, nullable=true)
	 */
	protected $name;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="description", type="string", length=1000, nullable=true)
	 */
	protected $description;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="order", type="integer", nullable=true, options={"default":0})
	 */
	protected $order = '0';
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="email", type="string", length=96, nullable=true)
	 */
	protected $email;
}

