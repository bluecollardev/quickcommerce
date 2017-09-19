<?php

namespace QuickCommerce\Model\Plugin;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class PosQuoteStatus extends PosAbstractEntity {
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="quote_status_id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	protected $quoteStatusId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="language_id", type="integer", nullable=false)
	 */
	protected $languageId;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="name", type="string", length=32, nullable=true)
	 */
	protected $name;
}
