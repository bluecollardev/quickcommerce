<?php

namespace QuickCommerce\Model\Plugin;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class PosLoyalCustomer extends PosCustomer {
	/**
	 * @var string
	 *
	 * @ORM\Column(name="card_number", type="string", length=20, nullable=true, options={"default":""})
	 */
	protected $cardNumber = '';
	
	public function getCardNumber() {
		return $this->cardNumber;
	}
	public function setCardNumber($cardNumber) {
		$this->cardNumber = $cardNumber;
		return $this;
	}
	
}