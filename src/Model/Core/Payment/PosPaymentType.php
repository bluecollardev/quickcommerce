<?php

namespace QuickCommerce\Model\Core\Payment;

use Doctrine\ORM\Mapping as ORM;

use QuickCommerce\Model\PosAbstractEntity;

/**
 * @ORM\Entity
 */
class PosPaymentType extends PosAbstractEntity {
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", name="payment_type_id")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	protected $paymentTypeId;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=32, nullable=true, name="type")
	 */
	protected $type;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=256, nullable=true, name="name")
	 */
	protected $name;
	
	/**
	 * @var boolean
	 *
	 * @ORM\Column(type="boolean", nullable=false, name="enabled", options={"default":0})
	 */
	protected $enabled = 0;
	
	public function getPaymentTypeId() {
		return $this->paymentTypeId;
	}
	public function setPaymentTypeId($paymentTypeId) {
		$this->paymentTypeId = $paymentTypeId;
		return $this;
	}
	public function getType() {
		return $this->type;
	}
	public function setType($type) {
		$this->type = $type;
		return $this;
	}
	public function getName() {
		return $this->name;
	}
	public function setName($name) {
		$this->name = $name;
		return $this;
	}
	public function getEnabled() {
		return $this->enabled;
	}
	public function setEnabled($enabled) {
		$this->enabled = $enabled;
		return $this;
	}
}