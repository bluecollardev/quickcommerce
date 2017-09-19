<?php


/**
 * OcOrderRecurring
 *
 * @ORM\Table(name="oc2_order_recurring",
 * indexes={@ORM\Index(name="IDX_175B7A538D9F6D38", columns={"order_id"}),
 * @ORM\Index(name="IDX_175B7A534584665A", columns={"product_id"}),
 * @ORM\Index(name="IDX_175B7A53B149C95E", columns={"recurring_id"})})
 * @ORM\Entity
 */
class OcOrderRecurring
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
     * @ORM\Column(name="product_name", type="string", length=255, nullable=false)
     */
    private $productName = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="product_quantity", type="integer", nullable=false)
     */
    private $productQuantity = null;

    /**
     * @var string
     *
     * @ORM\Column(name="recurring_name", type="string", length=255, nullable=false)
     */
    private $recurringName = null;

    /**
     * @var string
     *
     * @ORM\Column(name="recurring_description", type="string", length=255,
     * nullable=false)
     */
    private $recurringDescription = null;

    /**
     * @var string
     *
     * @ORM\Column(name="recurring_frequency", type="string", length=25,
     * nullable=false)
     */
    private $recurringFrequency = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="recurring_cycle", type="smallint", nullable=false)
     */
    private $recurringCycle = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="recurring_duration", type="smallint", nullable=false)
     */
    private $recurringDuration = null;

    /**
     * @var string
     *
     * @ORM\Column(name="recurring_price", type="decimal", precision=10, scale=4,
     * nullable=false)
     */
    private $recurringPrice = null;

    /**
     * @var boolean
     *
     * @ORM\Column(name="trial", type="boolean", nullable=false)
     */
    private $trial = null;

    /**
     * @var string
     *
     * @ORM\Column(name="trial_frequency", type="string", length=25, nullable=false)
     */
    private $trialFrequency = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="trial_cycle", type="smallint", nullable=false)
     */
    private $trialCycle = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="trial_duration", type="smallint", nullable=false)
     */
    private $trialDuration = null;

    /**
     * @var string
     *
     * @ORM\Column(name="trial_price", type="decimal", precision=10, scale=4,
     * nullable=false)
     */
    private $trialPrice = null;

    /**
     * @var boolean
     *
     * @ORM\Column(name="status", type="boolean", nullable=false)
     */
    private $status = null;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_added", type="datetime", nullable=false)
     */
    private $dateAdded = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="order_recurring_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $orderRecurringId = null;

    /**
     * @var \OcRecurring
     *
     * @ORM\ManyToOne(targetEntity="OcRecurring")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="recurring_id", referencedColumnName="recurring_id")
     * })
     */
    private $recurring = null;

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
     * @var \OcProduct
     *
     * @ORM\ManyToOne(targetEntity="OcProduct")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="product_id", referencedColumnName="product_id")
     * })
     */
    private $product = null;

    /**
     * Set reference
     *
     * @param string $reference
     *
     * @return OcOrderRecurring
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
     * Set productName
     *
     * @param string $productName
     *
     * @return OcOrderRecurring
     */
    public function setProductName($productName)
    {
        $this->productName = $productName;

        return $this;
    }

    /**
     * Get productName
     *
     * @return string
     */
    public function getProductName()
    {
        return $this->productName;
    }

    /**
     * Set productQuantity
     *
     * @param integer $productQuantity
     *
     * @return OcOrderRecurring
     */
    public function setProductQuantity($productQuantity)
    {
        $this->productQuantity = $productQuantity;

        return $this;
    }

    /**
     * Get productQuantity
     *
     * @return integer
     */
    public function getProductQuantity()
    {
        return $this->productQuantity;
    }

    /**
     * Set recurringName
     *
     * @param string $recurringName
     *
     * @return OcOrderRecurring
     */
    public function setRecurringName($recurringName)
    {
        $this->recurringName = $recurringName;

        return $this;
    }

    /**
     * Get recurringName
     *
     * @return string
     */
    public function getRecurringName()
    {
        return $this->recurringName;
    }

    /**
     * Set recurringDescription
     *
     * @param string $recurringDescription
     *
     * @return OcOrderRecurring
     */
    public function setRecurringDescription($recurringDescription)
    {
        $this->recurringDescription = $recurringDescription;

        return $this;
    }

    /**
     * Get recurringDescription
     *
     * @return string
     */
    public function getRecurringDescription()
    {
        return $this->recurringDescription;
    }

    /**
     * Set recurringFrequency
     *
     * @param string $recurringFrequency
     *
     * @return OcOrderRecurring
     */
    public function setRecurringFrequency($recurringFrequency)
    {
        $this->recurringFrequency = $recurringFrequency;

        return $this;
    }

    /**
     * Get recurringFrequency
     *
     * @return string
     */
    public function getRecurringFrequency()
    {
        return $this->recurringFrequency;
    }

    /**
     * Set recurringCycle
     *
     * @param integer $recurringCycle
     *
     * @return OcOrderRecurring
     */
    public function setRecurringCycle($recurringCycle)
    {
        $this->recurringCycle = $recurringCycle;

        return $this;
    }

    /**
     * Get recurringCycle
     *
     * @return integer
     */
    public function getRecurringCycle()
    {
        return $this->recurringCycle;
    }

    /**
     * Set recurringDuration
     *
     * @param integer $recurringDuration
     *
     * @return OcOrderRecurring
     */
    public function setRecurringDuration($recurringDuration)
    {
        $this->recurringDuration = $recurringDuration;

        return $this;
    }

    /**
     * Get recurringDuration
     *
     * @return integer
     */
    public function getRecurringDuration()
    {
        return $this->recurringDuration;
    }

    /**
     * Set recurringPrice
     *
     * @param string $recurringPrice
     *
     * @return OcOrderRecurring
     */
    public function setRecurringPrice($recurringPrice)
    {
        $this->recurringPrice = $recurringPrice;

        return $this;
    }

    /**
     * Get recurringPrice
     *
     * @return string
     */
    public function getRecurringPrice()
    {
        return $this->recurringPrice;
    }

    /**
     * Set trial
     *
     * @param boolean $trial
     *
     * @return OcOrderRecurring
     */
    public function setTrial($trial)
    {
        $this->trial = $trial;

        return $this;
    }

    /**
     * Get trial
     *
     * @return boolean
     */
    public function getTrial()
    {
        return $this->trial;
    }

    /**
     * Set trialFrequency
     *
     * @param string $trialFrequency
     *
     * @return OcOrderRecurring
     */
    public function setTrialFrequency($trialFrequency)
    {
        $this->trialFrequency = $trialFrequency;

        return $this;
    }

    /**
     * Get trialFrequency
     *
     * @return string
     */
    public function getTrialFrequency()
    {
        return $this->trialFrequency;
    }

    /**
     * Set trialCycle
     *
     * @param integer $trialCycle
     *
     * @return OcOrderRecurring
     */
    public function setTrialCycle($trialCycle)
    {
        $this->trialCycle = $trialCycle;

        return $this;
    }

    /**
     * Get trialCycle
     *
     * @return integer
     */
    public function getTrialCycle()
    {
        return $this->trialCycle;
    }

    /**
     * Set trialDuration
     *
     * @param integer $trialDuration
     *
     * @return OcOrderRecurring
     */
    public function setTrialDuration($trialDuration)
    {
        $this->trialDuration = $trialDuration;

        return $this;
    }

    /**
     * Get trialDuration
     *
     * @return integer
     */
    public function getTrialDuration()
    {
        return $this->trialDuration;
    }

    /**
     * Set trialPrice
     *
     * @param string $trialPrice
     *
     * @return OcOrderRecurring
     */
    public function setTrialPrice($trialPrice)
    {
        $this->trialPrice = $trialPrice;

        return $this;
    }

    /**
     * Get trialPrice
     *
     * @return string
     */
    public function getTrialPrice()
    {
        return $this->trialPrice;
    }

    /**
     * Set status
     *
     * @param boolean $status
     *
     * @return OcOrderRecurring
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
     * Set dateAdded
     *
     * @param \DateTime $dateAdded
     *
     * @return OcOrderRecurring
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
     * Get orderRecurringId
     *
     * @return integer
     */
    public function getOrderRecurringId()
    {
        return $this->orderRecurringId;
    }

    /**
     * Set recurring
     *
     * @param \OcRecurring $recurring
     *
     * @return OcOrderRecurring
     */
    public function setRecurring(\OcRecurring $recurring = null)
    {
        $this->recurring = $recurring;

        return $this;
    }

    /**
     * Get recurring
     *
     * @return \OcRecurring
     */
    public function getRecurring()
    {
        return $this->recurring;
    }

    /**
     * Set order
     *
     * @param \OcOrder $order
     *
     * @return OcOrderRecurring
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

    /**
     * Set product
     *
     * @param \OcProduct $product
     *
     * @return OcOrderRecurring
     */
    public function setProduct(\OcProduct $product = null)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return \OcProduct
     */
    public function getProduct()
    {
        return $this->product;
    }


}
