<?php


/**
 * OcRecurring
 *
 * @ORM\Table(name="oc2_recurring")
 * @ORM\Entity
 */
class OcRecurring
{

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="decimal", precision=10, scale=4, nullable=false)
     */
    private $price = null;

    /**
     * @var string
     *
     * @ORM\Column(name="frequency", type="string", nullable=false)
     */
    private $frequency = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="duration", type="integer", nullable=false)
     */
    private $duration = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="cycle", type="integer", nullable=false)
     */
    private $cycle = null;

    /**
     * @var boolean
     *
     * @ORM\Column(name="trial_status", type="boolean", nullable=false)
     */
    private $trialStatus = null;

    /**
     * @var string
     *
     * @ORM\Column(name="trial_price", type="decimal", precision=10, scale=4,
     * nullable=false)
     */
    private $trialPrice = null;

    /**
     * @var string
     *
     * @ORM\Column(name="trial_frequency", type="string", nullable=false)
     */
    private $trialFrequency = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="trial_duration", type="integer", nullable=false)
     */
    private $trialDuration = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="trial_cycle", type="integer", nullable=false)
     */
    private $trialCycle = null;

    /**
     * @var boolean
     *
     * @ORM\Column(name="status", type="boolean", nullable=false)
     */
    private $status = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="sort_order", type="integer", nullable=false)
     */
    private $sortOrder = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="recurring_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $recurringId = null;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="OcLanguage", inversedBy="recurring")
     * @ORM\JoinTable(name="oc2_recurring_description",
     *   joinColumns={
     *     @ORM\JoinColumn(name="recurring_id", referencedColumnName="recurring_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="language_id", referencedColumnName="language_id")
     *   }
     * )
     */
    private $language = null;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->language = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set price
     *
     * @param string $price
     *
     * @return OcRecurring
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set frequency
     *
     * @param string $frequency
     *
     * @return OcRecurring
     */
    public function setFrequency($frequency)
    {
        $this->frequency = $frequency;

        return $this;
    }

    /**
     * Get frequency
     *
     * @return string
     */
    public function getFrequency()
    {
        return $this->frequency;
    }

    /**
     * Set duration
     *
     * @param integer $duration
     *
     * @return OcRecurring
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get duration
     *
     * @return integer
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Set cycle
     *
     * @param integer $cycle
     *
     * @return OcRecurring
     */
    public function setCycle($cycle)
    {
        $this->cycle = $cycle;

        return $this;
    }

    /**
     * Get cycle
     *
     * @return integer
     */
    public function getCycle()
    {
        return $this->cycle;
    }

    /**
     * Set trialStatus
     *
     * @param boolean $trialStatus
     *
     * @return OcRecurring
     */
    public function setTrialStatus($trialStatus)
    {
        $this->trialStatus = $trialStatus;

        return $this;
    }

    /**
     * Get trialStatus
     *
     * @return boolean
     */
    public function getTrialStatus()
    {
        return $this->trialStatus;
    }

    /**
     * Set trialPrice
     *
     * @param string $trialPrice
     *
     * @return OcRecurring
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
     * Set trialFrequency
     *
     * @param string $trialFrequency
     *
     * @return OcRecurring
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
     * Set trialDuration
     *
     * @param integer $trialDuration
     *
     * @return OcRecurring
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
     * Set trialCycle
     *
     * @param integer $trialCycle
     *
     * @return OcRecurring
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
     * Set status
     *
     * @param boolean $status
     *
     * @return OcRecurring
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
     * Set sortOrder
     *
     * @param integer $sortOrder
     *
     * @return OcRecurring
     */
    public function setSortOrder($sortOrder)
    {
        $this->sortOrder = $sortOrder;

        return $this;
    }

    /**
     * Get sortOrder
     *
     * @return integer
     */
    public function getSortOrder()
    {
        return $this->sortOrder;
    }

    /**
     * Get recurringId
     *
     * @return integer
     */
    public function getRecurringId()
    {
        return $this->recurringId;
    }

    /**
     * Add language
     *
     * @param \OcLanguage $language
     *
     * @return OcRecurring
     */
    public function addLanguage(\OcLanguage $language)
    {
        $this->language[] = $language;

        return $this;
    }

    /**
     * Remove language
     *
     * @param \OcLanguage $language
     */
    public function removeLanguage(\OcLanguage $language)
    {
        $this->language->removeElement($language);
    }

    /**
     * Get language
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLanguage()
    {
        return $this->language;
    }


}
