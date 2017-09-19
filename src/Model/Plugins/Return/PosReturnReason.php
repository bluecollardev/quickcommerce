<?php

namespace QuickCommerce\Model\Plugin;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class PosReturnReason extends PosAbstractEntity {
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="return_reason_id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="NONE")
	 */
	protected $returnReasonId;
	
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
	 * @ORM\Column(name="name", type="string", length=128, nullable=false)
	 */
	protected $name;
}

