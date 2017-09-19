<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * OcOrderRecurringTransaction
 *
 * @ORM\Table(name="oc_order_recurring_transaction")
 * @ORM\Entity
 */
class OcOrderRecurringTransaction
{
    /**
     * @var integer
     *
     * @ORM\Column(name="order_recurring_transaction_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $orderRecurringTransactionId;

    /**
     * @var integer
     *
     * @ORM\Column(name="order_recurring_id", type="integer", nullable=false)
     */
    private $orderRecurringId;

    /**
     * @var string
     *
     * @ORM\Column(name="reference", type="string", length=255, nullable=false)
     */
    private $reference;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=false)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="amount", type="decimal", precision=10, scale=4, nullable=false)
     */
    private $amount;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_added", type="datetime", nullable=false)
     */
    private $dateAdded;


}

