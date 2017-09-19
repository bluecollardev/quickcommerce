<?php

namespace QuickCommerce\API\Service;

use QuickCommerce\Model\View\PosCartAction;
use QuickCommerce\Util\PosUtil;
use QuickCommerce\Model\Core\Checkout\PosCart;
use QuickCommerce\Model\Core\Setting\PosSetting;

/**
 * The abstract cart services

 *
 */
abstract class AbstractCartService extends AbstractAPIService {
	/**
	 * {@inheritDoc}
	 * @see \QuickCommerce\API\IAPIService::retrieve()
	 */
	public function retrieve($id, $filters) {
		// return cart details, only for pattern "GET /cart/cartId" ($filters and $attributes are not used for now)
		return $this->getCartDetails($id);
	}
	
	public abstract function getCartDetails($cartId);
	
	/**
	 * {@inheritDoc}
	 * @see \QuickCommerce\API\IAPIService::create()
	 */
	public function create($data) {
		// return cart list, only for pattern "POST /cart" with filters
		$cartsSearch = array('model' => 'Core\\Checkout\\PosCart', 'page' => $data['page'], 'sort' => array(array('cartId', 'desc')));
		if (isset($data['filters'])) {
			$cartsSearch['filters'] = $data['filters'];
		}
        
		$carts = $this->adapter->getService('searchList')->create($cartsSearch);
		
		return $carts;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \QuickCommerce\API\Service\AbstractAPIService::patch()
	 */
	public function patch($data, $id, $attribute) {
		if ($attribute == null) {
			// For pattern "PATCH /cart/cartId"
			// convert from $data to PosCartAction
			// create a new cart if $id is 0, otherwise update the cart
			$cartAction = new PosCartAction();
			PosUtil::array2Entity($cartAction, $data);
			
			return $this->modifyCart($id, $cartAction);
		} else {
			// For pattern "PATCH /cart/cartId/{attribute}"
			// update the attribute for the cart only
			$em = $this->adapter->getEntityManager();
			
			$value = $data[$attribute];
			$sql = "UPDATE " . PosCart::class . " model SET model." . $attribute . " = ?1 WHERE model.cartId = ?2";
			$query = $em->createQuery($sql);
			$query->setParameter(1, $value);
			$query->setParameter(2, $id);
			$query->execute();

			$result = array($attribute => $value);
			if ($attribute == 'cartStatusId') {
				$close = false;
				
				// in case it's changing cart status id, need to inform the front end to close the cart
				// if the cart status id is in the closable status list
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
	
	public abstract function modifyCart($cartId, PosCartAction $cartAction);
}