<?php

namespace QuickCommerce\Model\Core\Currency;

use Doctrine\ORM\Mapping as ORM;

use QuickCommerce\Model\PosAbstractEntity;

/**
 * @ORM\Entity
 */
class PosCurrency extends PosAbstractEntity {
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", name="currency_id")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	protected $currencyId;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=32, nullable=false, name="title")
	 */
	protected $title;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=3, nullable=false, name="code")
	 */
	protected $code;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=12, nullable=false, name="symbol_left")
	 */
	protected $symbolLeft;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=12, nullable=false, name="symbol_right")
	 */
	protected $symbolRight;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="integer", length=1, nullable=false, name="decimal_place")
	 */
	protected $decimalPlace;
	
	/**
	 * @var float
	 *
	 * @ORM\Column(type="float", nullable=false, name="value", precision=15, scale=8)
	 */
	protected $value;
	
	/**
	 * @var boolean
	 *
	 * @ORM\Column(type="boolean", nullable=false, name="status")
	 */
	protected $status;
	
	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(type="datetime", nullable=false, name="date_modified")
	 */
	protected $dateModified;
	
	public function format($number, $decimal_point, $thousand_point) {
		$realValue = $number;
		
		if ($this->value) {
			$realValue = (float)$number * $this->value;
		}
		
		$string = $this->symbolLeft;
		
		$string .= number_format(round($realValue, $this->decimal_place), $this->decimal_place, $decimal_point, $thousand_point);
		
		$string .= $this->symbol_right;

		return $string;
	}
	
	public function getCurrencyId() {
		return $this->currencyId;
	}
	public function setCurrencyId($currencyId) {
		$this->currencyId = $currencyId;
		return $this;
	}
	public function getTitle() {
		return $this->title;
	}
	public function setTitle($title) {
		$this->title = $title;
		return $this;
	}
	public function getCode() {
		return $this->code;
	}
	public function setCode($code) {
		$this->code = $code;
		return $this;
	}
	public function getSymbolLeft() {
		return $this->symbolLeft;
	}
	public function setSymbolLeft($symbolLeft) {
		$this->symbolLeft = $symbolLeft;
		return $this;
	}
	public function getSymbolRight() {
		return $this->symbolRight;
	}
	public function setSymbolRight($symbolRight) {
		$this->symbolRight = $symbolRight;
		return $this;
	}
	public function getDecimalPlace() {
		return $this->decimalPlace;
	}
	public function setDecimalPlace($decimalPlace) {
		$this->decimalPlace = $decimalPlace;
		return $this;
	}
	public function getValue() {
		return $this->value;
	}
	public function setValue($value) {
		$this->value = $value;
		return $this;
	}
	public function getStatus() {
		return $this->status;
	}
	public function setStatus($status) {
		$this->status = $status;
		return $this;
	}
	public function getDateModified() {
		return $this->dateModified;
	}
	public function setDateModified(\DateTime $dateModified) {
		$this->dateModified = $dateModified;
		return $this;
	}
}
