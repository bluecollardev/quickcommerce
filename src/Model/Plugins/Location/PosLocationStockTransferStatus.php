<?php

namespace QuickCommerce\Model\Plugin;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class PosLocationStockTransferStatus extends PosAbstractEntity {
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="status_id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	protected $statusId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="language_id", type="integer", nullable=false)
	 */
	protected $languageId;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="status_name", type="string", length=25, nullable=true)
	 */
	protected $statusName;
}

