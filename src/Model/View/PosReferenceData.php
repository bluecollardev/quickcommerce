<?php

namespace QuickCommerce\Model\View;

use QuickCommerce\Model\PosAbstractEntity;

class PosReferenceData extends PosAbstractEntity {
	/**
	 * The shopping cart configuration data
	 * @var CartConfig
	 */
	protected $cartConfig;
	
	/**
	 * The POS configuration data
	 * @var PosConfig
	 */
	protected $posConfig;
	
	public function getCartConfig() {
		return $this->cartConfig;
	}
	public function setCartConfig(CartConfig $cartConfig) {
		$this->cartConfig = $cartConfig;
		return $this;
	}
	public function getPosConfig() {
		return $this->posConfig;
	}
	public function setPosConfig(PosConfig $posConfig) {
		$this->posConfig = $posConfig;
		return $this;
	}
}

