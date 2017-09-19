<?php

namespace QuickCommerce\API\Service;

use QuickCommerce\Model\View\PosOrderAction;
use QuickCommerce\Util\PosUtil;
use QuickCommerce\Model\Core\Checkout\PosOrder;
use QuickCommerce\Model\Core\Setting\PosSetting;

/**
 * The abstract order services

 *
 */
abstract class AbstractOrderService extends AbstractAPIService {
	/**
	 * {@inheritDoc}
	 * @see \QuickCommerce\API\IAPIService::retrieve()
	 */
	public function retrieve($id, $filters) {
		// return order details, only for pattern "GET /order/orderId" ($filters and $attributes are not used for now)
		return $this->getOrderDetails($id);
	}
	
	public abstract function getOrderDetails($orderId);
	
	/**
	 * {@inheritDoc}
	 * @see \QuickCommerce\API\IAPIService::create()
	 */
	public function create($data) {
		// return order list, only for pattern "POST /order" with filters
		$ordersSearch = array('model' => 'Core\\Checkout\\PosOrder', 'page' => $data['page'], 'sort' => array(array('orderId', 'desc')));
		if (isset($data['filters'])) {
			$ordersSearch['filters'] = $data['filters'];
		}
        
		$orders = $this->adapter->getService('searchList')->create($ordersSearch);
		
		return $orders;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \QuickCommerce\API\Service\AbstractAPIService::patch()
	 */
	public function patch($data, $id, $attribute) {
		if ($attribute == null) {
			// For pattern "PATCH /order/orderId"
			// convert from $data to PosOrderAction
			// create a new order if $id is 0, otherwise update the order
			$orderAction = new PosOrderAction();
			PosUtil::array2Entity($orderAction, $data);
			
			return $this->modifyOrder($id, $orderAction);
		} else {
			// For pattern "PATCH /order/orderId/{attribute}"
			// update the attribute for the order only
			$em = $this->adapter->getEntityManager();
			
			$value = $data[$attribute];
			$sql = "UPDATE " . PosOrder::class . " model SET model." . $attribute . " = ?1 WHERE model.orderId = ?2";
			$query = $em->createQuery($sql);
			$query->setParameter(1, $value);
			$query->setParameter(2, $id);
			$query->execute();

			$result = array($attribute => $value);
			if ($attribute == 'orderStatusId') {
				$close = false;
				
				// in case it's changing order status id, need to inform the front end to close the order
				// if the order status id is in the closable status list
				$closableStatusList = array('POS_void_status_id', 'POS_parking_status_id', 'POS_complete_status_id');
				$sql = "SELECT model.value FROM " . PosSetting::class . " model WHERE model.key IN ('" . implode("','", $closableStatusList) . "')";
				$query = $em->createQuery($sql);
				$statuses = $query->getArrayResult();
				foreach ($statuses as $status) {
					if ((int)$status['value'] == (int)$value) {
						$close = true;
						break;
					}
				}
				
				$result['close'] = $close;
			}
			
			return $result;
		}
	}
	
	public abstract function modifyOrder($orderId, PosOrderAction $orderAction);
}