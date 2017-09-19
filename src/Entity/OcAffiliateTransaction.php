<?php


/**
 * OcAffiliateTransaction
 *
 * @ORM\Table(name="oc2_affiliate_transaction",
 * indexes={@ORM\Index(name="IDX_A63959C69F12C49A", columns={"affiliate_id"}),
 * @ORM\Index(name="IDX_A63959C68D9F6D38", columns={"order_id"})})
 * @ORM\Entity
 */
class OcAffiliateTransaction
{

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=false)
     */
    private $description = null;

    /**
     * @var string
     *
     * @ORM\Column(name="amount", type="decimal", precision=15, scale=4,
     * nullable=false)
     */
    private $amount = null;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_added", type="datetime", nullable=false)
     */
    private $dateAdded = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="affiliate_transaction_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $affiliateTransactionId = null;

    /**
     * @var \OcAffiliate
     *
     * @ORM\ManyToOne(targetEntity="OcAffiliate")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="affiliate_id", referencedColumnName="affiliate_id")
     * })
     */
    private $affiliate = null;

    /**
     * @var \OcOrder
     *
     * @ORM\ManyToOne(targetEntity="OcOrder")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="order_id", referencedColumnName="order_id")
     * })
     */
    private $order = null;

    /**
     * Set description
     *
     * @param string $description
     *
     * @return OcAffiliateTransaction
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set amount
     *
     * @param string $amount
     *
     * @return OcAffiliateTransaction
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return string
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set dateAdded
     *
     * @param \DateTime $dateAdded
     *
     * @return OcAffiliateTransaction
     */
    public function setDateAdded($dateAdded)
    {
        $this->dateAdded = $dateAdded;

        return $this;
    }

    /**
     * Get dateAdded
     *
     * @return \DateTime
     */
    public function getDateAdded()
    {
        return $this->dateAdded;
    }

    /**
     * Get affiliateTransactionId
     *
     * @return integer
     */
    public function getAffiliateTransactionId()
    {
        return $this->affiliateTransactionId;
    }

    /**
     * Set affiliate
     *
     * @param \OcAffiliate $affiliate
     *
     * @return OcAffiliateTransaction
     */
    public function setAffiliate(\OcAffiliate $affiliate = null)
    {
        $this->affiliate = $affiliate;

        return $this;
    }

    /**
     * Get affiliate
     *
     * @return \OcAffiliate
     */
    public function getAffiliate()
    {
        return $this->affiliate;
    }

    /**
     * Set order
     *
     * @param \OcOrder $order
     *
     * @return OcAffiliateTransaction
     */
    public function setOrder(\OcOrder $order = null)
    {
        $this->order = $order;

        return $this;
    }

    /**
     * Get order
     *
     * @return \OcOrder
     */
    public function getOrder()
    {
        return $this->order;
    }


}
