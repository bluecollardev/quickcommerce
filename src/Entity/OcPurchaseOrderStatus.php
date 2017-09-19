<?php


/**
 * OcPurchaseOrderStatus
 *
 * @ORM\Table(name="oc2_qctr_purchase_order_status",
 * indexes={@ORM\Index(name="IDX_DC797E8982F1BAF4", columns={"language_id"})})
 * @ORM\Entity
 */
class OcPurchaseOrderStatus
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
     * @ORM\Column(name="purchase_order_status_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $purchaseOrderStatusId = null;

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
     * @return OcPurchaseOrderStatus
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
     * Set purchaseOrderStatusId
     *
     * @param integer $purchaseOrderStatusId
     *
     * @return OcPurchaseOrderStatus
     */
    public function setPurchaseOrderStatusId($purchaseOrderStatusId)
    {
        $this->purchaseOrderStatusId = $purchaseOrderStatusId;

        return $this;
    }

    /**
     * Get purchaseOrderStatusId
     *
     * @return integer
     */
    public function getPurchaseOrderStatusId()
    {
        return $this->purchaseOrderStatusId;
    }

    /**
     * Set language
     *
     * @param \OcLanguage $language
     *
     * @return OcPurchaseOrderStatus
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
