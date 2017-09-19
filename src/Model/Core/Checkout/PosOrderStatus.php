<?php

namespace QuickCommerce\Model\Core\Checkout;

use Doctrine\ORM\Mapping as ORM;

use QuickCommerce\Model\PosAbstractEntity;

/**
 * @ORM\Entity
 */
class PosOrderStatus extends PosAbstractEntity {
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", name="order_status_id")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="NONE")
	 */
	protected $orderStatusId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", name="language_id")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="NONE")
	 */
	protected $languageId;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=32, nullable=false, name="name")
	 */
	protected $name;
	
	public function getOrderStatusId() {
		return $this->orderStatusId;
	}
	public function setOrderStatusId($orderStatusId) {
		$this->orderStatusId = $orderStatusId;
		return $this;
	}
	public function getLanguageId() {
		return $this->languageId;
	}
	public function setLanguageId($languageId) {
		$this->languageId = $languageId;
		return $this;
	}
	public function getName() {
		return $this->name;
	}
	public function setName($name) {
		$this->name = $name;
		return $this;
	}

	public function getLangInfo() {
		return array($this->orderStatusId => $this->name);
	}
}

