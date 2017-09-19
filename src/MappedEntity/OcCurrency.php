<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * OcCurrency
 *
 * @ORM\Table(name="oc_currency")
 * @ORM\Entity
 */
class OcCurrency
{
    /**
     * @var integer
     *
     * @ORM\Column(name="currency_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $currencyId;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=32, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=3, nullable=false)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="symbol_left", type="string", length=12, nullable=false)
     */
    private $symbolLeft;

    /**
     * @var string
     *
     * @ORM\Column(name="symbol_right", type="string", length=12, nullable=false)
     */
    private $symbolRight;

    /**
     * @var string
     *
     * @ORM\Column(name="decimal_place", type="string", length=1, nullable=false)
     */
    private $decimalPlace;

    /**
     * @var float
     *
     * @ORM\Column(name="value", type="float", precision=15, scale=8, nullable=false)
     */
    private $value;

    /**
     * @var boolean
     *
     * @ORM\Column(name="status", type="boolean", nullable=false)
     */
    private $status;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_modified", type="datetime", nullable=false)
     */
    private $dateModified;


}

