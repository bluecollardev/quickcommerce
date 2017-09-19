<?php

namespace QuickCommerce\API\Service;

/**
 * The abstract version services

 *
 */
abstract class AbstractVersionService extends AbstractAPIService {
	/**
	 * The version serivce
	 * {@inheritDoc}
	 * @see \QuickCommerce\API\IAPIService::retrieve()
	 */
	public function retrieve($id, $filters) {
		// return the installed version, $id is not required for this service
		$installed = false;
		
		$file = realpath(__DIR__ . '/../../../config/pos.adapter');
		if (file_exists($file)) {
			$adapterId = file_get_contents($file);
			if ($adapterId) {
				$installed = true;
			}
		}
		
		if (!$installed) {
			return array('version' => 0);
		}
		
		return array('version' => POS_VERSION);
	}
}