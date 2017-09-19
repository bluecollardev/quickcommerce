<?php

namespace QuickCommerce\Model\Plugin;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class PosReturnHistory extends PosAbstractEntity {
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="return_history_id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	protected $returnHistoryId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="return_id", type="integer", nullable=false)
	 */
	protected $returnId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="return_status_id", type="integer", nullable=false)
	 */
	protected $returnStatusId;
	
	/**
	 * @var boolean
	 *
	 * @ORM\Column(name="notify", type="boolean", nullable=false)
	 */
	protected $notify;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="comment", type="text", length=65535, nullable=false)
	 */
	protected $comment;
	
	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="date_added", type="datetime", nullable=false)
	 */
	protected $dateAdded;
}

