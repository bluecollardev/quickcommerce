<?php
namespace QuickCommerce\API\Service;

use Doctrine\ORM\EntityManager;
use QuickCommerce\API\Exception\APIException;
use QuickCommerce\Model\Core\Product\PosProduct;
use QuickCommerce\Model\View\PosProductDetails;
use QuickCommerce\Model\Core\Product\PosProductOption;
use QuickCommerce\Model\Core\Product\PosProductOptionValue;
use QuickCommerce\Model\Core\Product\PosProductSpecial;
use QuickCommerce\Model\Core\Product\PosProductDescription;
use QuickCommerce\Model\Core\Product\PosOptionDescription;
use QuickCommerce\Model\Core\Product\PosOptionValueDescription;
use QuickCommerce\Model\Core\Product\PosManufacturer;
use QuickCommerce\Model\View\PosOrderProductOption;
use QuickCommerce\Model\View\PosOrderProductOptionValue;

/**
 * The abstract order services

 *
 */
abstract class AbstractProductService extends AbstractAPIService {
	/**
	 * {@inheritDoc}
	 * @see \QuickCommerce\API\IAPIService::retrieve()
	 */
	public function retrieve($id, $filters) {
		// return prodcut details
		try {

		$languageId = isset($filters['languageId']) ? (int)$filters['languageId'] : 1;
		
		/** @var $productDetails PosProductDetails */
		$productDetails = new PosProductDetails();
		
		$em = $this->adapter->getEntityManager();

		/** @var $product PosProduct */
		$product = $em->find(PosProduct::class, $id);
		
		$productDetails->setProduct($product);
		
		// Get the name of the product
		$sql = "SELECT model.name FROM " . PosProductDescription::class . " model WHERE model.productId = ?1 AND model.languageId = ?2";
		$query = $em->createQuery($sql);
		$query->setParameter(1, $id);
		$query->setParameter(2, $languageId);
		$names = $query->getArrayResult();
		if (!empty($names)) {
			$productDetails->setName(htmlspecialchars_decode($names[0]['name']));
		}
		
		// Get the name of the manufacturer
		$sql = "SELECT model.name FROM " . PosManufacturer::class . " model WHERE model.manufacturerId = ?1";
		$query = $em->createQuery($sql);
		$query->setParameter(1, $product->getManufacturerId());
		$names = $query->getArrayResult();
		if (!empty($names)) {
			$productDetails->setManufacturer(htmlspecialchars_decode($names[0]['name']));
		}
		
		// Find a list of product optionId, optionValueId and value
		$productOptions = $em->getRepository(PosProductOption::class)->findBy(array('productId' => $id));
		$options = array();
		
		foreach ($productOptions as $productOption) {
			/** @var $productOption PosProductOption */
			$optionId = $productOption->getOptionId();
			$value = $productOption->getValue();
			$required = $productOption->getRequired();
			$productOptionId = $productOption->getProductOptionId();
			
			// Get the name of the option
			$sql = "SELECT model.name FROM " . PosOptionDescription::class . " model WHERE model.optionId = ?1 AND model.languageId = ?2";
			$query = $em->createQuery($sql);
			$query->setParameter(1, $optionId);
			$query->setParameter(2, $languageId);
			$names = $query->getArrayResult();
			$name = '';
			if (!empty($names)) {
				$name = htmlspecialchars_decode($names[0]['name']);
			}
				
			$options[$optionId] = array('required' => $required, 'values' => array(), 'name' => $name);
			
			$productOptionValueIds = $em->getRepository(PosProductOptionValue::class)->findBy(array('productOptionId' => $productOptionId, 'optionId' => $optionId));
			if (!empty($productOptionValueIds)) {
				foreach ($productOptionValueIds as $productOptionValueId) {
					/** @var $productOptionValueId PosProductOptionValue */
					// Get the name of the option value
					$sql = "SELECT model.name FROM " . PosOptionValueDescription::class . " model WHERE model.optionValueId = ?1 AND model.languageId = ?2";
					$query = $em->createQuery($sql);
					$query->setParameter(1, $productOptionValueId->getOptionValueId());
					$query->setParameter(2, $languageId);
					$names = $query->getArrayResult();
					$name = '';
					if (!empty($names)) {
						$name = htmlspecialchars_decode($names[0]['name']);
					}
					$options[$optionId]['values'][] = array('optionValueId' => $productOptionValueId->getOptionValueId(), 'value' => '', 'required' => $required, 'name' => $name);
				}
			} else {
				$options[$optionId]['values'][] = array('optionValueId' => 0, 'value' => $value, 'required' => $required);
			}
		}
		
		$productDetails->setOptions($options);
		
		return $productDetails;
		
		} catch (\Exception $exception) {
			$log = $this->adapter->getLogger();
			$log->debug($exception->getMessage());
			$log->debug($exception->getTraceAsString());
		}
	}
	
	/**
	 * Check if the product (with options) has stock
	 * @param integer $productId
	 * @param array $options
	 * @param integer $quantity
	 * @param boolean $useCallerContext
	 * @return boolean
	 */
	public function checkStock($productId, $options, $quantity) {
		// check if the product with given options has stock
		$hasStock = true;
		
		$em = $this->adapter->getEntityManager();
		
		if (!empty($options)) {
			// has option, check the option stock first
			foreach ($options as $option) {
				/** @var $option PosOrderProductOption */
				if (($option->getType() == 'SingleChoice' || $option->getType() == 'MultipleChoices') && !empty($option->getProductOptionValues())) {
					foreach ($option->getProductOptionValues() as $productOptionValue) {
						/** @var $productOptionValue PosOrderProductOptionValue */
						$hasStock = $this->checkOptionStock($em, $productOptionValue->getProductOptionValueId(), $quantity);
						if (!$hasStock) {
							break 2;
						}
					}
				}
			}
		}
		
		if ($hasStock) {
			// check the product level stock as well
			$hasStock = $this->checkProductStock($em, $productId, $quantity);
		}
		
		return $hasStock;
	}
	
	/**
	 * Check if the product option has stock
	 * @param EntityManager $em
	 * @param integer $productOptionValueId
	 * @param integer $quantity
	 * 
	 * @return boolean
	 */
	private function checkOptionStock(EntityManager $em, $productOptionValueId, $quantity) {
		/** @var $productOptionValue PosProductOptionValue */
		$productOptionValue = $em->find(PosProductOptionValue::class, $productOptionValueId);
		if (!empty($productOptionValue) 
				&& $productOptionValue->getSubtract() 
				&& $productOptionValue->getQuantity() > $quantity) {
			return true;
		}
		
		return false;
	}
	
	/**
	 * Check if the product has stock
	 * @param EntityManager $em
	 * @param integer $productId
	 * @param integer $quantity
	 * @return boolean
	 */
	private function checkProductStock(EntityManager $em, $productId, $quantity) {
		/** @var $product PosProduct */
		$product = $em->find(PosProduct::class, $productId);
		if (!empty($product) && $product->getSubtract() && $product->getQuantity() > $quantity) {
			return true;
		}
		
		return false;
	}
	
	/**
	 * Get the product entity for order
	 * @param integer $productId
	 * @param array $options
	 * @param integer $customerGroupId
	 * @param boolean $useCallerContext
	 * @return \QuickCommerce\Model\PosProduct
	 */
	public function getProductForOrder($productId, $options, $customerGroupId) {
		// check if the product with given options has stock
		$em = $this->adapter->getEntityManager();
		
		/** @var $product PosProduct */
		$product = $em->find(PosProduct::class, $productId);
		
		// Check product special prices
		$productSpecialPrice = $this->getProductSpecialPrice($em, $productId, $customerGroupId);
		if ($productSpecialPrice !== null) {
			$product->setPrice($productSpecialPrice);
		}
		
		// Check the option price
		$product->setPrice($this->getOptionPrice($em, $options, $product->getPrice()));
		
		return $product;
	}
	
	private function getProductSpecialPrice(EntityManager $em, $productId, $customerGroupId) {
		$sql = "SELECT ps.price FROM " . PosProductSpecial::class . " ps WHERE ps.productId = ?1 AND ps.customerGroupId = ?2 AND ((ps.dateStart = '0000-00-00' OR ps.dateStart < CURRENT_DATE()) AND (ps.dateEnd = '0000-00-00' OR ps.dateEnd > CURRENT_DATE())) ORDER BY ps.priority ASC, ps.price ASC";
		$query = $em->createQuery($sql);
		$query->setParameter(1, $productId);
		$query->setParameter(1, $customerGroupId);
		$productSpecial = $query->setMaxResults(1)->getArrayResult();
		if (!empty($productSpecial)) {
			return $productSpecial['price'];
		}
		
		return null;
	}
	
	/**
	 * Get option price
	 * @param EntityManager $em
	 * @param array $options
	 * @param float $basePrice
	 * @return float
	 */
	private function getOptionPrice(EntityManager $em, $options, $basePrice) {
		$price = $basePrice;
		
		foreach ($options as $option) {
			/** @var $option PosOrderProductOption */
			$optionValues = $option->getProductOptionValues();
			if (!empty($optionValues)) {
				foreach ($optionValues as $optionValue) {
					/** @var $optionValue PosOrderProductOptionValue */
					if ($optionValue->getPricePrefix() && $optionValue->getPrice()) {
						if ($optionValue->getPricePrefix() == '+') {
							$price += $optionValue->getPrice();
						} elseif ($optionValue->getPricePrefix() == '-') {
							$price -= $optionValue->getPrice();
						}
					}
				}
			}
		}
		return $price;
	}
}