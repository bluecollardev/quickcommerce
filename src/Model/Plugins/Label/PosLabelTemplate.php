<?php

namespace QuickCommerce\Model\Plugin;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class PosLabelTemplate extends PosAbstractEntity {
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="label_template_id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	protected $labelTemplateId;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="name", type="string", length=64, nullable=false)
	 */
	protected $name;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="top_margin", type="integer", nullable=true)
	 */
	protected $topMargin;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="side_margin", type="integer", nullable=true)
	 */
	protected $sideMargin;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="vertical_pitch", type="integer", nullable=true)
	 */
	protected $verticalPitch;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="horizontal_pitch", type="integer", nullable=true)
	 */
	protected $horizontalPitch;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="height", type="integer", nullable=true)
	 */
	protected $height;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="width", type="integer", nullable=true)
	 */
	protected $width;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="number_across", type="integer", nullable=true)
	 */
	protected $numberAcross;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="number_down", type="integer", nullable=true)
	 */
	protected $numberDown;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="content", type="string", length=65535, nullable=false)
	 */
	protected $content;
}
