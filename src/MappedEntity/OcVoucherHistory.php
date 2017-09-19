<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * OcVoucherHistory
 *
 * @ORM\Table(name="oc_voucher_history")
 * @ORM\Entity
 */
class OcVoucherHistory
{
    /**
     * @var integer
     *
     * @ORM\Column(name="voucher_history_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $voucherHistoryId;

    /**
     * @var integer
     *
     * @ORM\Column(name="voucher_id", type="integer", nullable=false)
     */
    private $voucherId;

    /**
     * @var integer
     *
     * @ORM\Column(name="order_id", type="integer", nullable=false)
     */
    private $orderId;

    /**
     * @var string
     *
     * @ORM\Column(name="amount", type="decimal", precision=15, scale=4, nullable=false)
     */
    private $amount;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_added", type="datetime", nullable=false)
     */
    private $dateAdded;


}

