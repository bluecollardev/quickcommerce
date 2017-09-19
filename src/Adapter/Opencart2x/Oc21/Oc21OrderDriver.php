<?php

namespace QuickCommerce\Adapter\Oc21;

use QuickCommerce\Adapter\AbstractOc2OrderDriver;

class Oc21OrderDriver extends AbstractOc2OrderDriver {
	/**
	 * Get total for Opencart v2.1.x
	 * @param Registry $registry
	 * @param string $code
	 * @param array $total_data
	 */
	public function getTotals($registry, $code, &$total_data) {
		$registry->get('load')->model('total/' . $code);
		$registry->get('model_total_' . $code)->getTotal($total_data['totals'], $total_data['total'], $total_data['taxes']);
	}
}