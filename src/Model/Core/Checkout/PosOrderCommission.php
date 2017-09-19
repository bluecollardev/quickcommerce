<?php

namespace QuickCommerce\Model\Core\Checkout;

use Doctrine\ORM\Mapping as ORM;

use QuickCommerce\Model\PosAbstractEntity;

/**
 * @ORM\Entity
 */
class PosOrderCommission extends PosAbstractEntity {
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="order_id", type="integer", nullable=false)
	 * @ORM\Id
	 * 
	 */
	protected $orderId;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="decimal", nullable=true, name="commission", precision=8, scale=2, options={"default":"0.00"})
	 */
	protected $commission = '0.00';
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", nullable=false, name="user_id")
	 */
	//protected $userId;
	
	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(type="datetime", nullable=true, name="date_modified")
	 */
	protected $dateModified;
	
	public function getOrderId() {
		return $this->orderId;
	}
	public function setOrderId($orderId) {
		$this->orderId = $orderId;
		return $this;
	}
	public function getCommission() {
		return $this->commission;
	}
	public function setCommission($commission) {
		$this->commission = $commission;
		return $this;
	}
	public function getUserId() {
		return $this->userId;
	}
	public function setUserId($userId) {
		$this->userId = $userId;
		return $this;
	}
	public function getDateModified() {
		return $this->dateModified;
	}
	public function setDateModified(\DateTime $dateModified) {
		$this->dateModified = $dateModified;
		return $this;
	}
	
}

