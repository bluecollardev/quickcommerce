<?php

namespace QuickCommerce\API\Service;

use QuickCommerce\Model\PosZone;

/**
 * The abstract zone services

 *
 */
abstract class AbstractZoneService extends AbstractAPIService {
	/**
	 * {@inheritDoc}
	 * @see \QuickCommerce\API\Service\AbstractAPIService::create()
	 */
	public function create($data) {
		// Only support POST /zone
		// Get a list of zones
		$zones = array();
		
		if (!empty($data['countryId'])) {
			$countryId = $data['countryId'];
			$em = $this->adapter->getEntityManager();
			
			$serverZones = $em->getRepository(PosZone::class)->findBy(array('countryId' => $countryId));

			if (!empty($serverZones)) {
				foreach ($serverZones as $serverZone) {
					/** @var $serverZone PosZone */
					$zones[$serverZone->getZoneId()] = $serverZone->getName();
				}
			}
		}
		
		return $zones;
	}
}