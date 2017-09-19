<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * OcTaxRule
 *
 * @ORM\Table(name="oc_tax_rule")
 * @ORM\Entity
 */
class OcTaxRule
{
    /**
     * @var integer
     *
     * @ORM\Column(name="tax_rule_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $taxRuleId;

    /**
     * @var integer
     *
     * @ORM\Column(name="tax_class_id", type="integer", nullable=false)
     */
    private $taxClassId;

    /**
     * @var integer
     *
     * @ORM\Column(name="tax_rate_id", type="integer", nullable=false)
     */
    private $taxRateId;

    /**
     * @var string
     *
     * @ORM\Column(name="based", type="string", length=10, nullable=false)
     */
    private $based;

    /**
     * @var integer
     *
     * @ORM\Column(name="priority", type="integer", nullable=false)
     */
    private $priority = '1';


}

