<?php

namespace QuickCommerce\Model\Plugin;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class PosProductSn extends PosAbstractEntity {
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="product_sn_id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	protected $productSnId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="product_id", type="integer", nullable=false)
	 */
	protected $productId;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="sn", type="string", length=32, nullable=false)
	 */
	protected $sn;
	
	/**
	 * @var boolean
	 *
	 * @ORM\Column(name="status", type="boolean", nullable=true, options={"default":1})
	 */
	protected $status = '1';
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="order_product_id", type="integer", nullable=true)
	 */
	protected $orderProductId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="order_id", type="integer", nullable=true)
	 */
	protected $orderId;
	
	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="date_modified", type="datetime", nullable=true)
	 */
	protected $dateModified;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="cost", type="decimal", precision=8, scale=2, nullable=true, options={"default":"0.00"})
	 */
	protected $cost = '0.00';
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="comment", type="string", length=256, nullable=true)
	 */
	protected $comment;
}

