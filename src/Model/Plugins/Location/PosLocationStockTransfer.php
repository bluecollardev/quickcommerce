<?php

namespace QuickCommerce\Model\Plugin;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class PosLocationStockTransfer extends PosAbstractEntity {
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="transfer_id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	protected $transferId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="product_id", type="integer", nullable=false)
	 */
	protected $productId;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="product_option_value_ids", type="string", length=100, nullable=true, options={"default":0})
	 */
	protected $productOptionValueIds = '0';
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="product_option_value_names", type="string", length=500, nullable=true, options={"default":""})
	 */
	protected $productOptionValueNames = '';
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="quantity", type="integer", nullable=false)
	 */
	protected $quantity;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="order_id", type="integer", nullable=true)
	 */
	protected $orderId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="from_location_id", type="integer", nullable=true)
	 */
	protected $fromLocationId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="status_id", type="integer", nullable=true)
	 */
	protected $statusId;
	
	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="date_added", type="datetime", nullable=true)
	 */
	protected $dateAdded;
	
	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="date_modified", type="datetime", nullable=true)
	 */
	protected $dateModified;
}

