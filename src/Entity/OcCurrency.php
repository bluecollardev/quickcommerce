<?php


/**
 * OcCurrency
 *
 * @ORM\Table(name="oc2_currency")
 * @ORM\Entity
 */
class OcCurrency
{

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=32, nullable=false)
     */
    private $title = null;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=3, nullable=false)
     */
    private $code = null;

    /**
     * @var string
     *
     * @ORM\Column(name="symbol_left", type="string", length=12, nullable=false)
     */
    private $symbolLeft = null;

    /**
     * @var string
     *
     * @ORM\Column(name="symbol_right", type="string", length=12, nullable=false)
     */
    private $symbolRight = null;

    /**
     * @var string
     *
     * @ORM\Column(name="decimal_place", type="string", length=1, nullable=false)
     */
    private $decimalPlace = null;

    /**
     * @var float
     *
     * @ORM\Column(name="value", type="float", precision=15, scale=8, nullable=false)
     */
    private $value = null;

    /**
     * @var boolean
     *
     * @ORM\Column(name="status", type="boolean", nullable=false)
     */
    private $status = null;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_modified", type="datetime", nullable=false)
     */
    private $dateModified = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="currency_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $currencyId = null;

    /**
     * Set title
     *
     * @param string $title
     *
     * @return OcCurrency
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set code
     *
     * @param string $code
     *
     * @return OcCurrency
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set symbolLeft
     *
     * @param string $symbolLeft
     *
     * @return OcCurrency
     */
    public function setSymbolLeft($symbolLeft)
    {
        $this->symbolLeft = $symbolLeft;

        return $this;
    }

    /**
     * Get symbolLeft
     *
     * @return string
     */
    public function getSymbolLeft()
    {
        return $this->symbolLeft;
    }

    /**
     * Set symbolRight
     *
     * @param string $symbolRight
     *
     * @return OcCurrency
     */
    public function setSymbolRight($symbolRight)
    {
        $this->symbolRight = $symbolRight;

        return $this;
    }

    /**
     * Get symbolRight
     *
     * @return string
     */
    public function getSymbolRight()
    {
        return $this->symbolRight;
    }

    /**
     * Set decimalPlace
     *
     * @param string $decimalPlace
     *
     * @return OcCurrency
     */
    public function setDecimalPlace($decimalPlace)
    {
        $this->decimalPlace = $decimalPlace;

        return $this;
    }

    /**
     * Get decimalPlace
     *
     * @return string
     */
    public function getDecimalPlace()
    {
        return $this->decimalPlace;
    }

    /**
     * Set value
     *
     * @param float $value
     *
     * @return OcCurrency
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return float
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set status
     *
     * @param boolean $status
     *
     * @return OcCurrency
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return boolean
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set dateModified
     *
     * @param \DateTime $dateModified
     *
     * @return OcCurrency
     */
    public function setDateModified($dateModified)
    {
        $this->dateModified = $dateModified;

        return $this;
    }

    /**
     * Get dateModified
     *
     * @return \DateTime
     */
    public function getDateModified()
    {
        return $this->dateModified;
    }

    /**
     * Get currencyId
     *
     * @return integer
     */
    public function getCurrencyId()
    {
        return $this->currencyId;
    }


}
