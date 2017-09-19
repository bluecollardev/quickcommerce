<?php

namespace QuickCommerce\Model\Core\Product;

use Doctrine\ORM\Mapping as ORM;

use QuickCommerce\Model\PosAbstractEntity;

/**
 * @ORM\Entity
 */
class PosProductReward extends PosAbstractEntity {
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", name="product_reward_id")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	protected $productRewardId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", name="product_id")
	 */
	protected $productId = '0';
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", nullable=false, name="customer_group_id", options={"default":0})
	 */
	protected $customerGroupId = '0';
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", nullable=false, name="points", options={"default":0})
	 */
	protected $points = '0';
	
	public function getProductRewardId() {
		return $this->productRewardId;
	}
	public function setProductRewardId($productRewardId) {
		$this->productRewardId = $productRewardId;
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
	public function getPoints() {
		return $this->points;
	}
	public function setPoints($points) {
		$this->points = $points;
		return $this;
	}
	
}

