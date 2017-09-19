<?php

namespace QuickCommerce\Model\Plugin;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class PosReturnStatus extends PosAbstractEntity {
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="return_status_id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="NONE")
	 */
	protected $returnStatusId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="language_id", type="integer", nullable=false, options={"default":0})
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="NONE")
	 */
	protected $languageId = '0';
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="name", type="string", length=32, nullable=false)
	 */
	protected $name;
}

