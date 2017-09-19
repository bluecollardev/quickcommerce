<?php

namespace QuickCommerce\Model\Plugin;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class PosQuote extends ModelOrder {	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="quote_status_id", type="integer", nullable=true, options={"default":0})
	 */
	protected $quoteStatusId = '0';

	/**
	 * @var integer
	 *
	 * @ORM\Column(name="quote_id", type="integer", nullable=true, options={"default":0})
	 */
	protected $quoteId = '0';
}
