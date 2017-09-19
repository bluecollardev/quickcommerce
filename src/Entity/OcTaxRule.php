<?php


/**
 * OcTaxRule
 *
 * @ORM\Table(name="oc2_tax_rule", indexes={@ORM\Index(name="IDX_E59E9BA94AAAE",
 * columns={"tax_class_id"}), @ORM\Index(name="IDX_E59E9BFDD13F95",
 * columns={"tax_rate_id"})})
 * @ORM\Entity
 */
class OcTaxRule
{

    /**
     * @var string
     *
     * @ORM\Column(name="based", type="string", length=10, nullable=false)
     */
    private $based = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="priority", type="integer", nullable=false)
     */
    private $priority = '1';

    /**
     * @var integer
     *
     * @ORM\Column(name="tax_rule_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $taxRuleId = null;

    /**
     * @var \OcTaxRate
     *
     * @ORM\ManyToOne(targetEntity="OcTaxRate")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tax_rate_id", referencedColumnName="tax_rate_id")
     * })
     */
    private $taxRate = null;

    /**
     * @var \OcTaxClass
     *
     * @ORM\ManyToOne(targetEntity="OcTaxClass")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tax_class_id", referencedColumnName="tax_class_id")
     * })
     */
    private $taxClass = null;

    /**
     * Set based
     *
     * @param string $based
     *
     * @return OcTaxRule
     */
    public function setBased($based)
    {
        $this->based = $based;

        return $this;
    }

    /**
     * Get based
     *
     * @return string
     */
    public function getBased()
    {
        return $this->based;
    }

    /**
     * Set priority
     *
     * @param integer $priority
     *
     * @return OcTaxRule
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;

        return $this;
    }

    /**
     * Get priority
     *
     * @return integer
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * Get taxRuleId
     *
     * @return integer
     */
    public function getTaxRuleId()
    {
        return $this->taxRuleId;
    }

    /**
     * Set taxRate
     *
     * @param \OcTaxRate $taxRate
     *
     * @return OcTaxRule
     */
    public function setTaxRate(\OcTaxRate $taxRate = null)
    {
        $this->taxRate = $taxRate;

        return $this;
    }

    /**
     * Get taxRate
     *
     * @return \OcTaxRate
     */
    public function getTaxRate()
    {
        return $this->taxRate;
    }

    /**
     * Set taxClass
     *
     * @param \OcTaxClass $taxClass
     *
     * @return OcTaxRule
     */
    public function setTaxClass(\OcTaxClass $taxClass = null)
    {
        $this->taxClass = $taxClass;

        return $this;
    }

    /**
     * Get taxClass
     *
     * @return \OcTaxClass
     */
    public function getTaxClass()
    {
        return $this->taxClass;
    }


}
