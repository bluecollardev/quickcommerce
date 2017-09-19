<?php


/**
 * OcVoucherHistory
 *
 * @ORM\Table(name="oc2_voucher_history",
 * indexes={@ORM\Index(name="IDX_23C7590A28AA1B6F", columns={"voucher_id"}),
 * @ORM\Index(name="IDX_23C7590A8D9F6D38", columns={"order_id"})})
 * @ORM\Entity
 */
class OcVoucherHistory
{

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
     * @ORM\Column(name="voucher_history_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $voucherHistoryId = null;

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
     * @var \OcVoucher
     *
     * @ORM\ManyToOne(targetEntity="OcVoucher")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="voucher_id", referencedColumnName="voucher_id")
     * })
     */
    private $voucher = null;

    /**
     * Set amount
     *
     * @param string $amount
     *
     * @return OcVoucherHistory
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
     * @return OcVoucherHistory
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
     * Get voucherHistoryId
     *
     * @return integer
     */
    public function getVoucherHistoryId()
    {
        return $this->voucherHistoryId;
    }

    /**
     * Set order
     *
     * @param \OcOrder $order
     *
     * @return OcVoucherHistory
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
     * Set voucher
     *
     * @param \OcVoucher $voucher
     *
     * @return OcVoucherHistory
     */
    public function setVoucher(\OcVoucher $voucher = null)
    {
        $this->voucher = $voucher;

        return $this;
    }

    /**
     * Get voucher
     *
     * @return \OcVoucher
     */
    public function getVoucher()
    {
        return $this->voucher;
    }


}
