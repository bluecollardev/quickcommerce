<?php

namespace QuickCommerce\API\Service;

use QuickCommerce\Model\Core\Payment\PosOrderPayment;
use QuickCommerce\Util\PosUtil;
use QuickCommerce\Model\View\PosOrderPaymentDetails;
use QuickCommerce\Model\Core\Payment\PosPaymentType;

/**
 * The abstract order payment services

 *
 */
abstract class AbstractOrderPaymentService extends AbstractAPIService {
	/**
	 * {@inheritDoc}
	 * @see \QuickCommerce\API\IAPIService::create()
	 */
	public function create($data) {
		// create order payment, only for pattern "POST /orderPayment"
		$orderPayment = new PosOrderPayment();
		PosUtil::array2Entity($orderPayment, $data);
		
		$orderPayment->setPaymentTime(new \DateTime());
		$orderPayment->setUserId(1);
		
		$em = $this->adapter->getEntityManager();
		$em->persist($orderPayment);
		$em->flush();
		
		$orderPaymentDetail = new PosOrderPaymentDetails();
		$orderPaymentDetail->setOrderPayment($orderPayment);
		/** @var $orderPaymentType PosPaymentType */
		$orderPaymentType = $em->find(PosPaymentType::class, $orderPayment->getPaymentTypeId());
		$orderPaymentDetail->setType($orderPaymentType->getType());
		$orderPaymentDetail->setName($orderPaymentType->getName());
		
		return PosUtil::entityToArray($orderPaymentDetail);
	}
	
	/**
	 * {@inheritDoc}
	 * @see \QuickCommerce\API\Service\AbstractAPIService::delete()
	 */
	public function delete($filters, $id) {
		// delete order payment by id, only for pattern "DELETE /orderPayment/{orderPaymentId}"
		$em = $this->adapter->getEntityManager();
		
		$orderPayment = $em->getReference(PosOrderPayment::class, $id);
		$em->remove($orderPayment);
		$em->flush();
		
		return array('orderPaymentId' => $id);
	}
}