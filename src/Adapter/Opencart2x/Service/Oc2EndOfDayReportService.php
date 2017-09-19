<?php

namespace QuickCommerce\Adapter\OC2\Service;

use Doctrine\ORM\EntityManager;
use QuickCommerce\API\Exception\APIException;
use QuickCommerce\API\Service\AbstractReportService;
use QuickCommerce\Model\Core\Currency\PosCurrency;
use QuickCommerce\Model\Core\Checkout\PosOrder;
use QuickCommerce\Model\Core\Checkout\PosOrderOption;
use QuickCommerce\Model\Core\Checkout\PosOrderProduct;
use QuickCommerce\Model\Core\Checkout\PosOrderTotal;
use QuickCommerce\Model\Core\Product\PosProduct;
use QuickCommerce\Model\Core\Product\PosProductOptionValue;
use QuickCommerce\Model\Core\Store\PosStore;
use QuickCommerce\Model\Core\Address\PosZone;
use QuickCommerce\Model\Core\Address\PosCountry;
use QuickCommerce\Model\Core\Address\PosAddress;
use QuickCommerce\Model\Core\Customer\PosCustomer;
use QuickCommerce\Model\Core\Payment\PosOrderPayment;
use QuickCommerce\Model\Core\Payment\PosPaymentType;
use QuickCommerce\Model\View\PosOrderAction;
use QuickCommerce\Model\View\PosOrderDetails;
use QuickCommerce\Model\View\PosCustomerDetails;
use QuickCommerce\Model\View\PosOrderPaymentDetails;
use QuickCommerce\Model\View\PosOrderProductDetails;

/**
 * The order service
 * @author Administrator
 *
 */
class Oc2EndOfDayReportService extends AbstractReportService {
	/**
	 * {@inheritDoc}
	 * @see \QuickCommerce\API\Service\AbstractOrderService::getOrderDetails()
	 *
	 * @return PosOrderDetails
	 *
	 */
	public function getReport($date) {
		$em = $this->adapter->getEntityManager();

		try {
			$report = array();

			$sql = $this->getPurchasedSql();
			$query = $em->createQuery($sql);

			//echo $query->getSQL() . "\n";

			$purchased = $query->getArrayResult();

			$report['purchased_products'] = $purchased;

			$sql = $this->getTotalPurchasedSql();
			$totalQuery = $em->createQuery($sql);

			//echo $totalQuery->getSQL() . "\n";

			$total = $totalQuery->getArrayResult();

			$report['total_products'] = $total[0]['total'];

			/*$sql = $this->getOrdersSql();
			$query = $em->createQuery($sql);

			//echo $query->getSQL() . "\n";

			$orders = $query->getArrayResult();

			$report['orders'] = $orders;

			$sql = $this->getTotalOrdersSql();
			$totalOrdersQuery = $em->createQuery($sql);

			$totalOrders = $totalOrdersQuery->getArrayResult();

			$report['total_orders'] = $totalOrders[0]['total'];

			var_dump($report);*/

			return $report;

		} catch (\Exception $exception) {
			echo $exception->getMessage();
			echo $exception->getTraceAsString(); // Fuck logging dump to the goddamn window

			$log = $this->adapter->getLogger();
			$log->debug($exception->getMessage());
			$log->debug($exception->getTraceAsString());
		}

		return null;
	}

	public function getPurchasedSql($data = array()) {
		if (empty($data['filter_date_start'])) {
			$date = new \DateTime();
			$data['filter_date_start'] = $date->format('Y-m-d'); // Use today
		}

		//$sql = "SELECT op.productId, op.name, op.model, SUM(op.quantity) AS quantity, SUM((op.total + op.tax) * op.quantity) AS total FROM " . DB_PREFIX . "order_product op LEFT JOIN " . DB_PREFIX . "order o ON (op.orderId = o.orderId)";
		// Fixing bug in OC 2.0.1.1
		$sql = "SELECT op.productId, op.name, op.model, SUM(op.quantity) AS quantity, SUM((op.price + op.tax) * op.quantity) AS total FROM " . PosOrderProduct::class . " op LEFT JOIN " . PosOrder::class . " o WITH op.orderId = o.orderId";

		if (!empty($data['filter_order_status_id'])) {
			$sql .= " WHERE o.orderStatusId = '" . (int)$data['filter_order_status_id'] . "'";
		} else {
			$sql .= " WHERE o.orderStatusId > '0'";
		}

		if (!empty($data['filter_date_start'])) {
			$sql .= " AND o.dateAdded >= '" . $data['filter_date_start'] . "'";
		}

		if (!empty($data['filter_date_end'])) {
			$sql .= " AND o.dateAdded <= '" . $data['filter_date_end'] . "'";
		}

		$sql .= " GROUP BY op.productId ORDER BY total DESC";

		if (isset($data['start']) || isset($data['limit'])) {
			if ($data['start'] < 0) {
				$data['start'] = 0;
			}

			if ($data['limit'] < 1) {
				$data['limit'] = 20;
			}

			$sql .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];
		}

		return $sql;
	}

	public function getTotalPurchasedSql($data = array()) {
		if (empty($data['filter_date_start'])) {
			$date = new \DateTime();
			$data['filter_date_start'] = $date->format('Y-m-d'); // Use today
		}

		$sql = "SELECT COUNT(DISTINCT op.productId) AS total FROM " . PosOrderProduct::class . " op LEFT JOIN " . PosOrder::class . " o WITH op.orderId = o.orderId";

		if (!empty($data['filter_order_status_id'])) {
			$sql .= " WHERE o.orderStatusId = '" . (int)$data['filter_order_status_id'] . "'";
		} else {
			$sql .= " WHERE o.orderStatusId > '0'";
		}

		if (!empty($data['filter_date_start'])) {
			$sql .= " AND o.dateAdded >= '" . $data['filter_date_start'] . "'";
		}

		if (!empty($data['filter_date_end'])) {
			$sql .= " AND o.dateAdded <= '" . $data['filter_date_end'] . "'";
		}

		return $sql;
	}

	public function getOrdersSql($data = array()) {
		$sql = "SELECT MIN(o.dateAdded) AS date_start, MAX(o.dateAdded) AS date_end, COUNT(op) AS orders, SUM((SELECT SUM(op.quantity) FROM " . PosOrderProduct::class . " op WHERE op.orderId = o.orderId GROUP BY op.orderId))";

		//, SUM((SELECT SUM(ot.value) FROM " . PosOrderTotal::class . " ot WHERE ot.orderId = o.orderId AND ot.code = 'tax' GROUP BY ot.orderId)) //AS tax, SUM(o.total) AS total FROM " . PosOrder::class . " o";

		if (!empty($data['filter_order_status_id'])) {
			$sql .= " WHERE o.orderStatusId = '" . (int)$data['filter_order_status_id'] . "'";
		} else {
			$sql .= " WHERE o.orderStatusId > '0'";
		}

		if (!empty($data['filter_date_start'])) {
			$sql .= " AND o.dateAdded >= '" . $data['filter_date_start'] . "'";
		}

		if (!empty($data['filter_date_end'])) {
			$sql .= " AND o.dateAdded <= '" . $data['filter_date_end'] . "'";
		}

		if (!empty($data['filter_group'])) {
			$group = $data['filter_group'];
		} else {
			$group = 'week';
		}

		switch($group) {
			case 'day';
				//$sql .= " GROUP BY YEAR(o.date_added), MONTH(o.date_added), DAY(o.date_added)";
				break;
			default:
			case 'week':
				//$sql .= " GROUP BY YEAR(o.date_added), WEEK(o.date_added)";
				break;
			case 'month':
				//$sql .= " GROUP BY YEAR(o.date_added), MONTH(o.date_added)";
				break;
			case 'year':
				//$sql .= " GROUP BY YEAR(o.date_added)";
				break;
		}

		$sql .= " ORDER BY o.dateAdded DESC";

		/*if (isset($data['start']) || isset($data['limit'])) {
			if ($data['start'] < 0) {
				$data['start'] = 0;
			}

			if ($data['limit'] < 1) {
				$data['limit'] = 20;
			}

			$sql .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];
		}*/

		return $sql;
	}

	public function getTotalOrdersSql($data = array()) {
		if (!empty($data['filter_group'])) {
			$group = $data['filter_group'];
		} else {
			$group = 'week';
		}

		$sql = "SELECT COUNT(DISTINCT dateAdded) AS total FROM " . PosOrder::class; // Temp

		switch($group) {
			case 'day';
				//$sql = "SELECT COUNT(DISTINCT YEAR(date_added), MONTH(date_added), DAY(date_added)) AS total FROM " . PosOrder::class;
				break;
			default:
			case 'week':
				//$sql = "SELECT COUNT(DISTINCT YEAR(date_added), WEEK(date_added)) AS total FROM " . PosOrder::class;
				break;
			case 'month':
				//$sql = "SELECT COUNT(DISTINCT YEAR(date_added), MONTH(date_added)) AS total FROM " . PosOrder::class;
				break;
			case 'year':
				//$sql = "SELECT COUNT(DISTINCT YEAR(date_added)) AS total FROM " . PosOrder::class;
				break;
		}

		if (!empty($data['filter_order_status_id'])) {
			$sql .= " WHERE orderStatusId = '" . (int)$data['filter_order_status_id'] . "'";
		} else {
			$sql .= " WHERE orderStatusId > '0'";
		}

		if (!empty($data['filter_date_start'])) {
			$sql .= " AND dateAdded >= '" . $data['filter_date_start'] . "'";
		}

		if (!empty($data['filter_date_end'])) {
			$sql .= " AND dateAdded <= '" . $data['filter_date_end'] . "'";
		}

		return $sql;
	}
}
