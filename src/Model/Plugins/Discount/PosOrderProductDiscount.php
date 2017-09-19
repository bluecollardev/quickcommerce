<?php

namespace QuickCommerce\Model\Plugin;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class PosOrderProductDiscount extends PosAbstractEntity {
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="order_product_id", type="integer", nullable=false)
	 * @ORM\Id
	 */
	protected $orderProductId;
	
	/**
	 * @var boolean
	 *
	 * @ORM\Column(name="discount_type", type="boolean", nullable=true)
	 */
	protected $discountType;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="discount_value", type="decimal", precision=15, scale=2, nullable=true, options={"default":"0.00"})
	 */
	protected $discountValue = '0.00';
	
	/**
	 * @var boolean
	 *
	 * @ORM\Column(name="include_tax", type="boolean", nullable=true)
	 */
	protected $includeTax;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="discounted_price", type="decimal", precision=15, scale=4, nullable=true, options={"default":"0.0000"})
	 */
	protected $discountedPrice = '0.0000';
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="discounted_tax", type="decimal", precision=15, scale=4, nullable=true, options={"default":"0.0000"})
	 */
	protected $discountedTax = '0.0000';
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="discounted_total", type="decimal", precision=15, scale=4, nullable=true, options={"default":"0.0000"})
	 */
	protected $discountedTotal = '0.0000';
}

