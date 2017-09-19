<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * OcRecurring
 *
 * @ORM\Table(name="oc_recurring")
 * @ORM\Entity
 */
class OcRecurring
{
    /**
     * @var integer
     *
     * @ORM\Column(name="recurring_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $recurringId;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="decimal", precision=10, scale=4, nullable=false)
     */
    private $price;

    /**
     * @var string
     *
     * @ORM\Column(name="frequency", type="string", nullable=false)
     */
    private $frequency;

    /**
     * @var integer
     *
     * @ORM\Column(name="duration", type="integer", nullable=false)
     */
    private $duration;

    /**
     * @var integer
     *
     * @ORM\Column(name="cycle", type="integer", nullable=false)
     */
    private $cycle;

    /**
     * @var boolean
     *
     * @ORM\Column(name="trial_status", type="boolean", nullable=false)
     */
    private $trialStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="trial_price", type="decimal", precision=10, scale=4, nullable=false)
     */
    private $trialPrice;

    /**
     * @var string
     *
     * @ORM\Column(name="trial_frequency", type="string", nullable=false)
     */
    private $trialFrequency;

    /**
     * @var integer
     *
     * @ORM\Column(name="trial_duration", type="integer", nullable=false)
     */
    private $trialDuration;

    /**
     * @var integer
     *
     * @ORM\Column(name="trial_cycle", type="integer", nullable=false)
     */
    private $trialCycle;

    /**
     * @var boolean
     *
     * @ORM\Column(name="status", type="boolean", nullable=false)
     */
    private $status;

    /**
     * @var integer
     *
     * @ORM\Column(name="sort_order", type="integer", nullable=false)
     */
    private $sortOrder;


}

