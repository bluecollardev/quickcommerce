<?php

namespace QuickCommerce\API\Service;

use QuickCommerce\Model\Core\Payment\PosPaymentType;

/**
 * The abstract installation services

 *
 */
abstract class AbstractInstallService extends AbstractAPIService {
	/**
	 * {@inheritDoc}
	 * @see \QuickCommerce\API\Service\AbstractAPIService::create()
	 */
	public function create($data) {
		$success = false;
		
		if ($this->install()) {
			$file = realpath(__DIR__ . '/../../../config/');
			$this->adapter->getLogger()->debug($file);
			file_put_contents($file . '/pos.adapter', $this->adapter->getAdapterId());
			
			$em = $this->adapter->getEntityManager();
			
			$cashType = $em->getRepository(PosPaymentType::class)->findOneBy(array('type' => 'cash'));
			if (!$cashType) {
				// add built-in payment types
				$cashType = new PosPaymentType();
				$cashType->setType('cash');
				$cashType->setName('Cash');
				$cashType->setEnabled(true);
				
				$em->persist($cashType);
			}
			
			$creditCardType = $em->getRepository(PosPaymentType::class)->findOneBy(array('type' => 'credit_card'));
			if (!$creditCardType) {
				$creditCardType = new PosPaymentType();
				$creditCardType->setType('credit_card');
				$creditCardType->setName('Credit Card');
				$creditCardType->setEnabled(true);
					
				$em->persist($creditCardType);
			}
			
			$em->flush();
				
			$success = true;
		}

		return array('success' => $success, 'version' => POS_VERSION);
	}
	
	abstract protected function install();
}