<?php


/**
 * OcVoucher
 *
 * @ORM\Table(name="oc2_voucher", indexes={@ORM\Index(name="IDX_A47011268D9F6D38",
 * columns={"order_id"}), @ORM\Index(name="IDX_A4701126C7A52C0E",
 * columns={"voucher_theme_id"})})
 * @ORM\Entity
 */
class OcVoucher
{

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=10, nullable=false)
     */
    private $code = null;

    /**
     * @var string
     *
     * @ORM\Column(name="from_name", type="string", length=64, nullable=false)
     */
    private $fromName = null;

    /**
     * @var string
     *
     * @ORM\Column(name="from_email", type="string", length=96, nullable=false)
     */
    private $fromEmail = null;

    /**
     * @var string
     *
     * @ORM\Column(name="to_name", type="string", length=64, nullable=false)
     */
    private $toName = null;

    /**
     * @var string
     *
     * @ORM\Column(name="to_email", type="string", length=96, nullable=false)
     */
    private $toEmail = null;

    /**
     * @var string
     *
     * @ORM\Column(name="message", type="text", length=65535, nullable=false)
     */
    private $message = null;

    /**
     * @var string
     *
     * @ORM\Column(name="amount", type="decimal", precision=15, scale=4,
     * nullable=false)
     */
    private $amount = null;

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
     * @ORM\Column(name="voucher_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $voucherId = null;

    /**
     * @var \OcVoucherTheme
     *
     * @ORM\ManyToOne(targetEntity="OcVoucherTheme")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="voucher_theme_id",
     * referencedColumnName="voucher_theme_id")
     * })
     */
    private $voucherTheme = null;

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
     * Set code
     *
     * @param string $code
     *
     * @return OcVoucher
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set fromName
     *
     * @param string $fromName
     *
     * @return OcVoucher
     */
    public function setFromName($fromName)
    {
        $this->fromName = $fromName;

        return $this;
    }

    /**
     * Get fromName
     *
     * @return string
     */
    public function getFromName()
    {
        return $this->fromName;
    }

    /**
     * Set fromEmail
     *
     * @param string $fromEmail
     *
     * @return OcVoucher
     */
    public function setFromEmail($fromEmail)
    {
        $this->fromEmail = $fromEmail;

        return $this;
    }

    /**
     * Get fromEmail
     *
     * @return string
     */
    public function getFromEmail()
    {
        return $this->fromEmail;
    }

    /**
     * Set toName
     *
     * @param string $toName
     *
     * @return OcVoucher
     */
    public function setToName($toName)
    {
        $this->toName = $toName;

        return $this;
    }

    /**
     * Get toName
     *
     * @return string
     */
    public function getToName()
    {
        return $this->toName;
    }

    /**
     * Set toEmail
     *
     * @param string $toEmail
     *
     * @return OcVoucher
     */
    public function setToEmail($toEmail)
    {
        $this->toEmail = $toEmail;

        return $this;
    }

    /**
     * Get toEmail
     *
     * @return string
     */
    public function getToEmail()
    {
        return $this->toEmail;
    }

    /**
     * Set message
     *
     * @param string $message
     *
     * @return OcVoucher
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set amount
     *
     * @param string $amount
     *
     * @return OcVoucher
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
     * Set status
     *
     * @param boolean $status
     *
     * @return OcVoucher
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
     * @return OcVoucher
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
     * Get voucherId
     *
     * @return integer
     */
    public function getVoucherId()
    {
        return $this->voucherId;
    }

    /**
     * Set voucherTheme
     *
     * @param \OcVoucherTheme $voucherTheme
     *
     * @return OcVoucher
     */
    public function setVoucherTheme(\OcVoucherTheme $voucherTheme = null)
    {
        $this->voucherTheme = $voucherTheme;

        return $this;
    }

    /**
     * Get voucherTheme
     *
     * @return \OcVoucherTheme
     */
    public function getVoucherTheme()
    {
        return $this->voucherTheme;
    }

    /**
     * Set order
     *
     * @param \OcOrder $order
     *
     * @return OcVoucher
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
