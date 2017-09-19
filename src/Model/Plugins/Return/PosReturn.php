<?php

namespace QuickCommerce\Model\Plugin;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class PosReturn extends PosAbstractEntity {
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="return_id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	protected $returnId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="order_id", type="integer", nullable=false)
	 */
	protected $orderId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="product_id", type="integer", nullable=false)
	 */
	protected $productId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="customer_id", type="integer", nullable=false)
	 */
	protected $customerId;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="firstname", type="string", length=32, nullable=false)
	 */
	protected $firstname;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="lastname", type="string", length=32, nullable=false)
	 */
	protected $lastname;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="email", type="string", length=96, nullable=false)
	 */
	protected $email;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="telephone", type="string", length=32, nullable=false)
	 */
	protected $telephone;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="product", type="string", length=255, nullable=false)
	 */
	protected $product;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="model", type="string", length=64, nullable=false)
	 */
	protected $model;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="quantity", type="integer", nullable=false)
	 */
	protected $quantity;
	
	/**
	 * @var boolean
	 *
	 * @ORM\Column(name="opened", type="boolean", nullable=false)
	 */
	protected $opened;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="return_reason_id", type="integer", nullable=false)
	 */
	protected $returnReasonId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="return_action_id", type="integer", nullable=false)
	 */
	protected $returnActionId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="return_status_id", type="integer", nullable=false)
	 */
	protected $returnStatusId;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="comment", type="text", length=65535, nullable=true)
	 */
	protected $comment;
	
	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="date_ordered", type="date", nullable=false, options={"default":"0000-00-00"})
	 */
	protected $dateOrdered = '0000-00-00';
	
	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="date_added", type="datetime", nullable=false)
	 */
	protected $dateAdded;
	
	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="date_modified", type="datetime", nullable=false)
	 */
	protected $dateModified;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="price", type="decimal", precision=15, scale=4, nullable=true)
	 */
	protected $price;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="tax", type="decimal", precision=15, scale=4, nullable=true)
	 */
	protected $tax;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="order_product_id", type="integer", nullable=true)
	 */
	protected $orderProductId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="pos_return_id", type="integer", nullable=true, options={"default":0})
	 */
	protected $posReturnId = '0';
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="weight", type="decimal", precision=8, scale=2, nullable=true, options={"default":"1.00"})
	 */
	protected $weight = '1.00';
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="weight_name", type="string", length=20, nullable=true)
	 */
	protected $weightName;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="sn", type="string", length=32, nullable=true)
	 */
	protected $sn;
	
	/**
	 * @var boolean
	 *
	 * @ORM\Column(name="update_stock", type="boolean", nullable=false, options={"default":0})
	 */
	protected $updateStock;
}

