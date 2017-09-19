<?php

namespace QuickCommerce\Model\Core\Setting;

use Doctrine\ORM\Mapping as ORM;

use QuickCommerce\Model\PosAbstractEntity;

/**
 * @ORM\Entity
 */
class PosSetting extends PosAbstractEntity {
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", name="setting_id")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	protected $settingId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", nullable=false, name="store_id", options={"default":0})
	 */
	protected $storeId = '0';
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=32, nullable=false, name="code")
	 */
	protected $code;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=64, nullable=false, name="`key`")
	 */
	protected $key;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="text", length=65535, nullable=false, name="value")
	 */
	protected $value;
	
	/**
	 * @var boolean
	 *
	 * @ORM\Column(type="boolean", nullable=false, name="serialized")
	 */
	protected $serialized;
	
	public function getSettingId() {
		return $this->settingId;
	}
	public function setSettingId($settingId) {
		$this->settingId = $settingId;
		return $this;
	}
	public function getStoreId() {
		return $this->storeId;
	}
	public function setStoreId($storeId) {
		$this->storeId = $storeId;
		return $this;
	}
	public function getCode() {
		return $this->code;
	}
	public function setCode($code) {
		$this->code = $code;
		return $this;
	}
	public function getKey() {
		return $this->key;
	}
	public function setKey($key) {
		$this->key = $key;
		return $this;
	}
	public function getValue() {
		return $this->value;
	}
	public function setValue($value) {
		$this->value = $value;
		return $this;
	}
	public function getSerialized() {
		return $this->serialized;
	}
	public function setSerialized($serialized) {
		$this->serialized = $serialized;
		return $this;
	}
	
}

