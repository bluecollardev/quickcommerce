<?php

namespace QuickCommerce\Model\Core\Product;

use Doctrine\ORM\Mapping as ORM;

use QuickCommerce\Model\PosAbstractEntity;

/**
 * @ORM\Entity
 */
class PosProductDiscount extends PosAbstractEntity {
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", name="product_discount_id")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	protected $productDiscountId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", name="product_id")
	 */
	protected $productId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", nullable=false, name="customer_group_id")
	 */
	protected $customerGroupId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", nullable=false, name="quantity", options={"default":0})
	 */
	protected $quantity = '0';
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", nullable=false, name="priority", options={"default":1})
	 */
	protected $priority = '1';
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="decimal", nullable=false, name="price", precision=15, scale=4, options={"default":"0.0000"})
	 */
	protected $price = '0.0000';
	
	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(type="date", nullable=false, name="date_start", options={"default":"0000-00-00"})
	 */
	protected $dateStart = '0000-00-00';
	
	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(type="date", nullable=false, name="date_end", options={"default":"0000-00-00"})
	 */
	protected $dateEnd = '0000-00-00';
	
	public function getProductDiscountId() {
		return $this->productDiscountId;
	}
	public function setProductDiscountId($productDiscountId) {
		$this->productDiscountId = $productDiscountId;
		return $this;
	}
	public function getProductId() {
		return $this->productId;
	}
	public function setProductId($productId) {
		$this->productId = $productId;
		return $this;
	}
	public function getCustomerGroupId() {
		return $this->customerGroupId;
	}
	public function setCustomerGroupId($customerGroupId) {
		$this->customerGroupId = $customerGroupId;
		return $this;
	}
	public function getQuantity() {
		return $this->quantity;
	}
	public function setQuantity($quantity) {
		$this->quantity = $quantity;
		return $this;
	}
	public function getPriority() {
		return $this->priority;
	}
	public function setPriority($priority) {
		$this->priority = $priority;
		return $this;
	}
	public function getPrice() {
		return $this->price;
	}
	public function setPrice($price) {
		$this->price = $price;
		return $this;
	}
	public function getDateStart() {
		return $this->dateStart;
	}
	public function setDateStart(\DateTime $dateStart) {
		$this->dateStart = $dateStart;
		return $this;
	}
	public function getDateEnd() {
		return $this->dateEnd;
	}
	public function setDateEnd(\DateTime $dateEnd) {
		$this->dateEnd = $dateEnd;
		return $this;
	}
	
}

