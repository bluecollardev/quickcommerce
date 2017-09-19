<?php

namespace QuickCommerce\Adapter\Oc23;

use QuickCommerce\Adapter\AbstractOc2OrderDriver;

class Oc23OrderDriver extends AbstractOc2OrderDriver {
	/**
	 * Get total for Opencart v2.3.x
	 * @param Registry $registry
	 * @param string $code
	 * @param array $total_data
	 */
	public function getTotals($registry, $code, &$total_data) {
		$registry->get('load')->model('extension/total/' . $code);
		$registry->get('model_extension_total_' . $code)->getTotal($total_data);
	}
}