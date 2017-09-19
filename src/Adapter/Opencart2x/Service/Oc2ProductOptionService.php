<?php

namespace QuickCommerce\Adapter\OC2\Service;

use QuickCommerce\API\Service\AbstractProductOptionService;
use QuickCommerce\Model\Core\Product\PosOption;
use QuickCommerce\Model\Core\Product\PosProductOptionValue;
use QuickCommerce\Model\Core\Product\PosProductOption;
use QuickCommerce\Model\View\PosOrderProductOption;
use QuickCommerce\Model\View\PosOrderProductOptionValue;
use QuickCommerce\Model\Core\Product\PosOptionDescription;
use QuickCommerce\Model\Core\Product\PosOptionValueDescription;

/**
 * The product option service
 * @author Administrator
 *
 */
class Oc2ProductOptionService extends AbstractProductOptionService {
	/**
	 * {@inheritDoc}
	 * @see \QuickCommerce\API\Service\AbstractProductOptionService::getProductOptions()
	 */
	public function getProductOptions($productId, $languageId) {
		try {
			$em = $this->adapter->getEntityManager();
			
			$options = array();
			
			// Get all the option details for the product, as this method is not called very frequently
			// just use the object
			$serverOptions = $em->getRepository(PosProductOption::class)->findBy(array('productId' => $productId));
			
			foreach ($serverOptions as $serverOption) {
				/** @var $optionInfo PosOption */
				$optionInfo = $em->find(PosOption::class, $serverOption->getOptionId());
				$optionType = $optionInfo->getType();
				if ($optionType == 'file') {
					// do not handle file type option in POS
					continue;
				}
				
				$option = new PosOrderProductOption();
				
				/** @var $serverOption PosProductOption */
				$option->setProductOptionId($serverOption->getProductOptionId());
				$option->setOptionId($serverOption->getOptionId());
				$option->setRequired($serverOption->getRequired());
				
				// Get the name of this option
				$sql = "SELECT model.name FROM " . PosOptionDescription::class . " model WHERE model.optionId = ?1 AND model.languageId = ?2";
				$query = $em->createQuery($sql);
				$query->setParameter(1, $serverOption->getOptionId());
				$query->setParameter(2, $languageId);
				$names = $query->getArrayResult();
				if (!empty($names)) {
					$option->setName(htmlspecialchars_decode($names[0]['name']));
				}

				$option->setRawType($optionType);
				
				if ($optionType == 'select' || $optionType == 'radio' || $optionType == 'checkbox' || $optionType == 'image') {
					// Get all option values for each option if multiple choice is there
					$query = "SELECT pov.productOptionValueId, pov.optionValueId, pov.price, pov.pricePrefix FROM " . PosProductOptionValue::class . " pov WHERE pov.productOptionId = ?1";
					$query = $em->createQuery($query);
					$serverOptionValues = $query->setParameter(1, $serverOption->getProductOptionId())->getArrayResult();
					
					$optionValues = array();
					foreach ($serverOptionValues as $serverOptionValue) {
						$optionValue = new PosOrderProductOptionValue();
						$optionValue->setProductOptionValueId($serverOptionValue['productOptionValueId']);
						$optionValue->setOptionValueId($serverOptionValue['optionValueId']);
						$optionValue->setPrice($serverOptionValue['price']);
						$optionValue->setPricePrefix($serverOptionValue['pricePrefix']);
						
						// Get the name of this option value
						$sql = "SELECT model.name FROM " . PosOptionValueDescription::class . " model WHERE model.optionValueId = ?1 AND model.languageId = ?2";
						$query = $em->createQuery($sql);
						$query->setParameter(1, $serverOptionValue['optionValueId']);
						$query->setParameter(2, $languageId);
						$names = $query->getArrayResult();
						if (!empty($names)) {
							$optionValue->setName(htmlspecialchars_decode($names[0]['name']));
						}

						$optionValues[] = $optionValue;
					}
					
					$option->setProductOptionValue($optionValues);
					
					$optionType = ($optionType == 'checkbox') ? 'MultipleChoices' : 'SingleChoice';
				} else {
					$option->setProductOptionValue($serverOption->getValue());
					
					$optionType = ucfirst($optionType);
				}
				
				$option->setType($optionType);
				$options[] = $option;
			}
			
			return $options;
		} catch (\Exception $exception) {
			$this->adapter->getLogger()->debug($exception->getTraceAsString());
			return array();
		}
	}
}