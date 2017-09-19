<?php


/**
 * OcInvoiceStatus
 *
 * @ORM\Table(name="oc2_qctr_invoice_status",
 * indexes={@ORM\Index(name="IDX_DC797E8982F1BAF4", columns={"language_id"})})
 * @ORM\Entity
 */
class OcInvoiceStatus
{

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=32, nullable=false)
     */
    private $name = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="invoice_status_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $invoiceStatusId = null;

    /**
     * @var \OcLanguage
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="OcLanguage")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="language_id", referencedColumnName="language_id")
     * })
     */
    private $language = null;

    /**
     * Set name
     *
     * @param string $name
     *
     * @return OcInvoiceStatus
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set invoiceStatusId
     *
     * @param integer $invoiceStatusId
     *
     * @return OcInvoiceStatus
     */
    public function setInvoiceStatusId($invoiceStatusId)
    {
        $this->invoiceStatusId = $invoiceStatusId;

        return $this;
    }

    /**
     * Get invoiceStatusId
     *
     * @return integer
     */
    public function getInvoiceStatusId()
    {
        return $this->invoiceStatusId;
    }

    /**
     * Set language
     *
     * @param \OcLanguage $language
     *
     * @return OcInvoiceStatus
     */
    public function setLanguage(\OcLanguage $language)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language
     *
     * @return \OcLanguage
     */
    public function getLanguage()
    {
        return $this->language;
    }


}
