<?php

namespace QuickCommerce\Model\Core\Setting;

use Doctrine\ORM\Mapping as ORM;

use QuickCommerce\Model\PosAbstractEntity;

/**
 * @ORM\Entity
 */
class PosExtension extends PosAbstractEntity {
	/**
	 * @var integer
	 * 
	 * @ORM\Column(name="extension_id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	private $extensionId;

	/**
	 * @var string
	 * 
	 * @ORM\Column(name="type", type="string", length=32, nullable=false)
	 */
	private $type;

	/**
	 * @var string
	 * 
	 * @ORM\Column(name="code", type="string", length=32, nullable=false)
	 */
	private $code;

	public function getExtensionId() {
		return $this->extensionId;
	}
	public function setExtensionId($extensionId) {
		$this->extensionId = $extensionId;
		return $this;
	}
	public function getType() {
		return $this->type;
	}
	public function setType($type) {
		$this->type = $type;
		return $this;
	}
	public function getCode() {
		return $this->code;
	}
	public function setCode($code) {
		$this->code = $code;
		return $this;
	}
	
}

