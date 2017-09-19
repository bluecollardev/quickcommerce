<?php
namespace QuickCommerce\Util;
use QuickCommerce\Util\Image;
use QuickCommerce\Model\PosAbstractEntity;
use QuickCommerce\Model\Core\Setting\PosSetting;
use QuickCommerce\API\Exception\APIException;

class PosUtil {
	/** @param string $value **/
	public static function get_boolean_value($value) {
		$booleanValue = null;
		
		if ($value !== null) {
			if (is_string($value)) {
				$booleanValue = in_array(strtolower($value), array (
						'false',
						'off',
						'-',
						'no',
						'n',
						'0',
						''
				)) ? false : true;
			} else {
				$booleanValue = ( boolean ) $value;
			}
		}
		
		return $booleanValue;
	}
	
	public static function resize($imagePath, $filename, $width, $height) {
		if (!is_file($imagePath . $filename)) {
			return '';
		}
	
		$extension = pathinfo($filename, PATHINFO_EXTENSION);
	
		$old_image = $filename;
		$new_image = 'cache/' . substr($filename, 0, strrpos($filename, '.')) . '-' . $width . 'x' . $height . '.' . $extension;
	
		if (!is_file($imagePath . $new_image) || (filectime($imagePath . $old_image) > filectime($imagePath . $new_image))) {
			$path = '';
	
			$directories = explode('/', dirname(str_replace('../', '', $new_image)));
	
			foreach ($directories as $directory) {
				$path = $path . '/' . $directory;
	
				if (!is_dir($imagePath . $path)) {
					@mkdir($imagePath . $path, 0777);
				}
			}
	
			list($width_orig, $height_orig) = getimagesize($imagePath . $old_image);
	
			if ($width_orig != $width || $height_orig != $height) {
				$image = new Image($imagePath . $old_image);
				$image->resize($width, $height);
				$image->save($imagePath . $new_image);
			} else {
				copy($imagePath . $old_image, $imagePath . $new_image);
			}
		}
	
		return $new_image;
	}
	
	/**
	 * @param PosAbstractEntity $entity
	 * @param array $data
	 */
	public static function array2Entity(PosAbstractEntity &$entity, $data) {
		if (empty($data)) return;
		
		try {
			$classname = get_class($entity);
			$methodNames = get_class_methods($classname);
			$class = new \ReflectionClass($classname);
			
			foreach ($methodNames as $methodName) {
				if (substr($methodName, 0, 3) === 'set') {
					$property = lcfirst(substr($methodName, 3));
					if (isset($data[$property])) {
						$method = $class->getMethod($methodName);
						$parameters = $method->getParameters();
						// Entity set method only has one parameter
						/** @var $parameter \ReflectionParameter */
						$parameter = $parameters[0];
						if ($parameter->getClass() && $parameter->getClass()->isSubclassOf(PosAbstractEntity::class)) {
							$paramInstance = $parameter->getClass()->newInstanceWithoutConstructor();
							PosUtil::array2Entity($paramInstance, $data[$property]);
							
							$entity->$methodName($paramInstance);
						} else {
							$entity->$methodName($data[$property]);
						}
					}
				}
			}
		} catch (\Exception $exception) {
			throw APIException::cannotConvertArrayToEntity(get_class($entity), $exception->getMessage());
		}
	}
	
	public static function settingsToCartSettings($settings, &$cartSettings) {
		if (empty($settings)) return;
		
		$required = array(
			'config_admin_language',
			'config_country_id',
			'config_zone_id',
			'config_name',
			'config_email',
			'config_address',
			'config_telephone',
			'config_fax',
			'config_currency',
			'config_customer_group_id',
			'config_order_status_id',
			'config_url',
			'config_tax_default',
			'config_tax_customer'
		);
		
		// Settings is an array of PosSetting object
		foreach ($settings as $setting) {
			/** @var $setting PosSetting */
			$key = $setting->getKey();
			if (strpos($key, '_sort_order') > 0
					|| strpos($key, '_status') > 0
					|| in_array($key, $required)) {
				$value = $setting->getValue();
				if ($setting->getSerialized()) {
					$value = json_decode($value, true);
				}
				
				$cartSettings[$setting->getKey()] = $value;
			}
		}
	}

	public static function settingsToPosSettings($settings, &$posSettings) {
		if (empty($settings)) return;
	
		// Settings is an array of PosSetting object
		foreach ($settings as $setting) {
			/** @var $setting PosSetting */
			$key = $setting->getKey();
			if (strpos($key, 'POS_') === 0) {
				$value = $setting->getValue();
				if ($setting->getSerialized()) {
					$value = json_decode($value, true);
				}
	
				$posSettings[$setting->getKey()] = $value;
			}
		}
	}
	
	public static function entityToArray($entity) {
		if (is_a($entity, PosAbstractEntity::class)) {
			/** @var $entity PosAbstractEntity */
			return $entity->getLeveledValues();
		} else if (is_array($entity)) {
			$values = array();
			foreach ($entity as $key => $child) {
				if (is_a($child, PosAbstractEntity::class)) {
					/** @var $child PosAbstractEntity */
					$values[$key] = $child->getLeveledValues();
				} else {
					$values[$key] = $child;
				}
			}
			
			return $values;
		}
		
		return $entity;
	}
}