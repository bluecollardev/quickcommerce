<?php

namespace QuickCommerce\Adapter\OC2\Service;

use QuickCommerce\API\Service\AbstractCategoryService;
use Doctrine\ORM\EntityManager;
use QuickCommerce\Util\PosUtil;
use QuickCommerce\Model\Core\Product\PosCategory;
use QuickCommerce\Model\Core\Product\PosCategoryPath;
use QuickCommerce\Model\Core\Product\PosProduct;
use QuickCommerce\Model\Core\Product\PosProductToCategory;
use QuickCommerce\Model\Core\Product\PosProductOption;
use QuickCommerce\Model\Core\Product\PosProductSpecial;
use QuickCommerce\Model\Core\Product\PosProductDescription;
use QuickCommerce\Model\Core\Product\PosCategoryDescription;
use QuickCommerce\Model\View\PosOrderCategory;
use QuickCommerce\Model\View\PosOrderCategoryProduct;

/**
 * The category service
 * @author Administrator
 *
 */
define ('PAGE_SIZE', 19);

class Oc2CategoryService extends AbstractCategoryService {
	/**
	 * {@inheritDoc}
	 * @see \QuickCommerce\API\Service\AbstractCategoryService::getCategoryDetails()
	 */
	public function getCategoryDetails($categoryId, $customerGroupId, $numberOfLoadedSubCategories, $numberOfLoadedProducts, $languageId) {
		try {
			$em = $this->adapter->getEntityManager();
			
			$subCategories = array();
			$products = array();
			$paths = array();
			$fullyLoaded = false;
		
			$numberOfItemsTobeLoaded = PAGE_SIZE;
		
			$totalSubCategories = $this->getTotalSubCategories($em, $categoryId);
			$totalProducts = $this->getTotalProducts($em, $categoryId);
		
			if ($numberOfLoadedProducts == 0) {
				// Only when no products loaded, will check if we have loaded all sub categories
				if ($totalSubCategories > $numberOfLoadedSubCategories) {
					// Still not finishing loading sub categories
					$numberOfSubCategoriesTobeLoaded = min($totalSubCategories - $numberOfLoadedSubCategories, $numberOfItemsTobeLoaded);
		
					$numberOfItemsTobeLoaded -= $numberOfSubCategoriesTobeLoaded;
		
					$subCategories = $this->getSubCategories($em, $categoryId, $numberOfLoadedSubCategories, $numberOfSubCategoriesTobeLoaded, $languageId);
				}
			}
		
			if ($numberOfItemsTobeLoaded > 0) {
				if ($totalProducts > $numberOfLoadedProducts) {
					// Still not finishing loading products
					$numberOfProductsTobeLoaded = min($totalProducts - $numberOfLoadedProducts, $numberOfItemsTobeLoaded);
		
					$numberOfItemsTobeLoaded -= $numberOfProductsTobeLoaded;
		
					$products = $this->getProducts($em, $categoryId, $customerGroupId, $numberOfLoadedProducts, $numberOfProductsTobeLoaded, $languageId);
				}
			}
		
			if ($numberOfLoadedSubCategories == 0) {
				// Only get paths for the first call
				$sql = "SELECT model.pathId FROM " . PosCategoryPath::class . " model WHERE model.categoryId = ?1 ORDER BY model.level";
				$query = $em->createQuery($sql);
				$query->setParameter(1, $categoryId);
				$serverPaths = $query->getArrayResult();
				foreach ($serverPaths as $serverPath) {
					// Get the name of this path
					$sql = "SELECT model.name FROM " . PosCategoryDescription::class . " model WHERE model.categoryId = ?1 AND model.languageId = ?2";
					$query = $em->createQuery($sql);
					$query->setParameter(1, $serverPath['pathId']);
					$query->setParameter(2, $languageId);
					$names = $query->getArrayResult();
					$name = '';
					if (!empty($names)) {
						$name = htmlspecialchars_decode($names[0]['name']);
					}
					$paths[] = array('pathId' => $serverPath['pathId'], 'name' => $name);
				}
			}
		
			if ($numberOfLoadedSubCategories + $numberOfLoadedProducts + PAGE_SIZE >= $totalSubCategories + $totalProducts) {
				// Finishing load all items for the given category
				$fullyLoaded = true;
			}
			
			// Get the name of this category
			$sql = "SELECT model.name FROM " . PosCategoryDescription::class . " model WHERE model.categoryId = ?1 AND model.languageId = ?2";
			$query = $em->createQuery($sql);
			$query->setParameter(1, $categoryId);
			$query->setParameter(2, $languageId);
			$names = $query->getArrayResult();
			$name = '';
			if (!empty($names)) {
				$name = htmlspecialchars_decode($names[0]['name']);
			}

			$orderCategory = new PosOrderCategory();
			$orderCategory->setCategoryId($categoryId);
			$orderCategory->setSubCategories($subCategories);
			$orderCategory->setProducts($products);
			$orderCategory->setPaths($paths);
			$orderCategory->setFullyLoaded($fullyLoaded);
			$orderCategory->setName($name);
			
			return $orderCategory;
		} catch (\Exception $exception) {
			$log->addError($exception->getTraceAsString());
			return array('error' => $exception->getMessage());
		}
	}
	
	/**
	 * Get the products for the given category
	 * @param EntityManager $em
	 * @param int $categoryId
	 * @param int $numberOfLoadedProducts
	 * @param int $numberOfProductsTobeLoaded
	 * @param int $languageId
	 * @return Array
	 */
	private function getProducts(EntityManager $em, $categoryId, $customerGroupId, $numberOfLoadedProducts, $numberOfProductsTobeLoaded, $languageId) {
		// Get category products
		$sql = "SELECT p.productId, p.price, p.quantity, p.image, p.points, p.model, p.taxClassId, p.shipping, p.subtract FROM " . PosProduct::class . " p WHERE p.productId IN (SELECT c.productId FROM " . PosProductToCategory::class . " c WHERE c.categoryId = ?1) ORDER BY p.productId ASC";
		$query = $em->createQuery($sql);
		$query->setParameter(1, $categoryId);
		$serverProducts = $query->setFirstResult($numberOfLoadedProducts)->setMaxResults($numberOfProductsTobeLoaded)->getArrayResult();
		
		$products = array();
		
		// Resize product images to 180 * 180
		foreach ($serverProducts as $serverProduct) {
			$product = new PosOrderCategoryProduct();
			
			$product->setProductId($serverProduct['productId']);
			$product->setPrice($serverProduct['price']);
			$product->setQuantity($serverProduct['quantity']);
			$product->setModel($serverProduct['model']);
			$product->setPoints($serverProduct['points']);
			$product->setTaxClassId($serverProduct['taxClassId']);
			$product->setShipping($serverProduct['shipping']);
			$product->setUpdateStock($serverProduct['subtract']);

			$product->setImage(PosUtil::resize(DIR_IMAGE, $serverProduct['image'], 180, 180));
				
			$sql = "SELECT COUNT(model.optionId) AS total FROM " . PosProductOption::class . " model WHERE model.productId = ?1";
			$query = $em->createQuery($sql);
			$query->setParameter(1, $serverProduct['productId']);
			$total = $query->getSingleScalarResult();
			$product->setHasOption($total > 0);
			
			// Get the product special price
			$specialPrice = $this->getProductSpecialPrice($em, $serverProduct['productId'], $customerGroupId);
			if ($specialPrice != null) {
				$product->setSpecialPrice($specialPrice);
			}
			
			// Get product name
			$sql = "SELECT model.name FROM " . PosProductDescription::class . " model WHERE model.productId = ?1 AND model.languageId = ?2";
			$query = $em->createQuery($sql);
			$query->setParameter(1, $serverProduct['productId']);
			$query->setParameter(2, $languageId);
			$names = $query->getArrayResult();
			$name = '';
			if (!empty($names)) {
				$name = htmlspecialchars_decode($names[0]['name']);
			}
			
			$product->setName($name);

			$products[] = $product;
		}
	
		return $products;
	}

	private function getProductSpecialPrice(EntityManager $em, $productId, $customerGroupId) {
		$sql = "SELECT ps.price FROM " . PosProductSpecial::class . " ps WHERE ps.productId = ?1 AND ps.customerGroupId = ?2 AND ((ps.dateStart = '0000-00-00' OR ps.dateStart < CURRENT_DATE()) AND (ps.dateEnd = '0000-00-00' OR ps.dateEnd > CURRENT_DATE())) ORDER BY ps.priority ASC, ps.price ASC";
		$query = $em->createQuery($sql);
		$query->setParameter(1, $productId);
		$query->setParameter(2, $customerGroupId);
		$productSpecial = $query->setMaxResults(1)->getArrayResult();
		if (!empty($productSpecial)) {
			return $productSpecial[0]['price'];
		}
	
		return null;
	}

	/**
	 * Get number of sub categories for the given category
	 *
	 * @param EntityManager $em
	 * @param int $categoryId
	 * @param int $numberOfLoadedSubCategories
	 * @param int $numberOfSubCategoriesTobeLoaded
	 * @param int $languageId
	 *
	 * @return Array
	 */
	private function getSubCategories(EntityManager $em, $categoryId, $numberOfLoadedSubCategories, $numberOfSubCategoriesTobeLoaded, $languageId) {
		// The Category loading operations will be performed more frequently, use Read Only Array result
		$sql = "SELECT model.categoryId, model.image FROM " . PosCategory::class . " model WHERE model.parentId = ?1 ORDER BY model.categoryId ASC";
		$query = $em->createQuery($sql);
		$query->setParameter(1, $categoryId);
		$serverSubCategories = $query->setFirstResult($numberOfLoadedSubCategories)->setMaxResults($numberOfSubCategoriesTobeLoaded)->getArrayResult();

		$subCategories = array();
		
		foreach ($serverSubCategories as $serverSubCategory) {
			$subCategory = new PosOrderCategory();
			
			// resize category image
			$subCategory->setImage(PosUtil::resize(DIR_IMAGE, $serverSubCategory['image'], 180, 180));
	
			$total = $this->getTotalSubCategories($em, $serverSubCategory['categoryId']);
			$total += $this->getTotalProducts($em, $serverSubCategory['categoryId']);
	
			$subCategory->setCategoryId($serverSubCategory['categoryId']);
			$subCategory->setTotalItems($total);
			
			// Get the name of this category
			$sql = "SELECT model.name FROM " . PosCategoryDescription::class . " model WHERE model.categoryId = ?1 AND model.languageId = ?2";
			$query = $em->createQuery($sql);
			$query->setParameter(1, $serverSubCategory['categoryId']);
			$query->setParameter(2, $languageId);
			$names = $query->getArrayResult();
			if (!empty($names)) {
				$subCategory->setName(htmlspecialchars_decode($names[0]['name']));
			}

			$subCategories[] = $subCategory;
		}
	
		return $subCategories;
	}
	
	/**
	 * Get number of sub categories of the given category
	 * @param EntityManager $em
	 * @param int $categoryId
	 *
	 * @return int
	 */
	private function getTotalSubCategories(EntityManager $em, $categoryId) {
		$sql = "SELECT COUNT(model.categoryId) AS total FROM " . PosCategory::class . " model WHERE model.parentId = ?1";
		$query = $em->createQuery($sql);
		$query->setParameter(1, $categoryId);
		$total = $query->getSingleScalarResult();
	
		return $total;
	}
	
	/**
	 * Get number of products of the given category
	 * @param EntityManager $em
	 * @param int $categoryId
	 *
	 * @return int
	 */
	private function getTotalProducts(EntityManager $em, $categoryId) {
		$sql = "SELECT COUNT(model.productId) AS total FROM " . PosProductToCategory::class . " model WHERE model.categoryId = ?1";
		$query = $em->createQuery($sql);
		$query->setParameter(1, $categoryId);
		$total = $query->getSingleScalarResult();
	
		return $total;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \QuickCommerce\API\Service\AbstractCategoryService::searchProducts()
	 */
	public function searchProducts($filters) {
		$orderCategory = new PosOrderCategory();
	
		if (!empty($filters['productName'])) {
			$em = $this->adapter->getEntityManager();
			
			$languageId = isset($filters['languageId']) ? $filters['languageId'] : 1;
			
			$sql = "SELECT model.productId FROM " . PosProductDescription::class . " model WHERE model.name LIKE ?1";
			$query = $em->createQuery($sql);
			$query->setParameter(1, '%' . $filters['productName'] . '%');
			$result = $query->getArrayResult();
			
			$productIds = array();
			if (!empty($result)) {
				foreach ($result as $record) {
					$productIds[] = $record['productId'];
				}
				
				$sql = "SELECT model FROM " . PosProduct::class . " model WHERE model.productId IN (" . implode(',', $productIds) . ")";
				$query = $em->createQuery($sql);
				$result = $query->getResult();
				
				$products = array();
				
				foreach ($result as $record) {
					/** @var $record PosProduct */
					$product = new PosOrderCategoryProduct();
					
					$product->setProductId($record->getProductId());
					$product->setPrice($record->getPrice());
					$product->setQuantity($record->getQuantity());
					$product->setModel($record->getModel());
					$product->setPoints($record->getPoints());
					$product->setTaxClassId($record->getTaxClassId());
					$product->setShipping($record->getShipping());
					$product->setUpdateStock($record->getSubtract());
					
					// Get the name of this product
					$sql = "SELECT model.name FROM " . PosProductDescription::class . " model WHERE model.productId = ?1 AND model.languageId = ?2";
					$query = $em->createQuery($sql);
					$query->setParameter(1, $record->getProductId());
					$query->setParameter(2, $languageId);
					$names = $query->getArrayResult();
					if (!empty($names)) {
						$product->setName(htmlspecialchars_decode($names[0]['name']));
					}
						
					$product->setImage(PosUtil::resize(DIR_IMAGE, $record->getImage(), 180, 180));
						
					$sql = "SELECT COUNT(model.optionId) AS total FROM " . PosProductOption::class . " model WHERE model.productId = ?1";
					$query = $em->createQuery($sql);
					$query->setParameter(1, $record->getProductId());
					$total = $query->getSingleScalarResult();
					$product->setHasOption($total > 0);
					
					// Get the product special price
					$customerGroupId = isset($filters['customerGroupId']) ? (int)$filters['customerGroupId'] : 1;
					$specialPrice = $this->getProductSpecialPrice($em, $record->getProductId(), $customerGroupId);
					if ($specialPrice != null) {
						$product->setSpecialPrice($specialPrice);
					}
					
					$products[] = $product;
				}
				
				$orderCategory->setProducts($products);
			}
		}
		
		$orderCategory->setFullyLoaded(true);
		return $orderCategory;
	}
}