<?php


/**
 * OcOrderRecurringTransaction
 *
 * @ORM\Table(name="oc2_order_recurring_transaction",
 * indexes={@ORM\Index(name="IDX_F2B767A3B5895D34",
 * columns={"order_recurring_id"})})
 * @ORM\Entity
 */
class OcOrderRecurringTransaction
{

    /**
     * @var string
     *
     * @ORM\Column(name="reference", type="string", length=255, nullable=false)
     */
    private $reference = null;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=false)
     */
    private $type = null;

    /**
     * @var string
     *
     * @ORM\Column(name="amount", type="decimal", precision=10, scale=4,
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
     * @ORM\Column(name="order_recurring_transaction_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $orderRecurringTransactionId = null;

    /**
     * @var \OcOrderRecurring
     *
     * @ORM\ManyToOne(targetEntity="OcOrderRecurring")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="order_recurring_id",
     * referencedColumnName="order_recurring_id")
     * })
     */
    private $orderRecurring = null;

    /**
     * Set reference
     *
     * @param string $reference
     *
     * @return OcOrderRecurringTransaction
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get reference
     *
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return OcOrderRecurringTransaction
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set amount
     *
     * @param string $amount
     *
     * @return OcOrderRecurringTransaction
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
     * @return OcOrderRecurringTransaction
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
     * Get orderRecurringTransactionId
     *
     * @return integer
     */
    public function getOrderRecurringTransactionId()
    {
        return $this->orderRecurringTransactionId;
    }

    /**
     * Set orderRecurring
     *
     * @param \OcOrderRecurring $orderRecurring
     *
     * @return OcOrderRecurringTransaction
     */
    public function setOrderRecurring(\OcOrderRecurring $orderRecurring = null)
    {
        $this->orderRecurring = $orderRecurring;

        return $this;
    }

    /**
     * Get orderRecurring
     *
     * @return \OcOrderRecurring
     */
    public function getOrderRecurring()
    {
        return $this->orderRecurring;
    }


}
