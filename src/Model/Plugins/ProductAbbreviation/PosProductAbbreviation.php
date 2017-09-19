<?php

namespace QuickCommerce\Model\Plugin;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class PosProductAbbreviation extends PosProduct {
	/**
	 * @var string
	 *
	 * @ORM\Column(name="abbreviation", type="string", length=10, nullable=true, options={"default":""})
	 */
	protected $abbreviation = '';
}