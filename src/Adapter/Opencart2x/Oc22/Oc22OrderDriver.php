<?php

namespace QuickCommerce\Adapter\Oc22;

use QuickCommerce\Adapter\AbstractOc2OrderDriver;

class Oc22OrderDriver extends AbstractOc2OrderDriver {
	/**
	 * Get total for Opencart v2.2.x
	 * @param Registry $registry
	 * @param string $code
	 * @param array $total_data
	 */
	public function getTotals($registry, $code, &$total_data) {
		$registry->get('load')->model('total/' . $code);
		$registry->get('model_total_' . $code)->getTotal($total_data);
	}
}