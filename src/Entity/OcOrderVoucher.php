<?php


/**
 * OcOrderVoucher
 *
 * @ORM\Table(name="oc2_order_voucher",
 * indexes={@ORM\Index(name="IDX_9350BB088D9F6D38", columns={"order_id"}),
 * @ORM\Index(name="IDX_9350BB0828AA1B6F", columns={"voucher_id"}),
 * @ORM\Index(name="IDX_9350BB08C7A52C0E", columns={"voucher_theme_id"})})
 * @ORM\Entity
 */
class OcOrderVoucher
{

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description = null;

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
     * @var integer
     *
     * @ORM\Column(name="order_voucher_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $orderVoucherId = null;

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
     * @var \OcVoucher
     *
     * @ORM\ManyToOne(targetEntity="OcVoucher")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="voucher_id", referencedColumnName="voucher_id")
     * })
     */
    private $voucher = null;

    /**
     * Set description
     *
     * @param string $description
     *
     * @return OcOrderVoucher
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
     * Set code
     *
     * @param string $code
     *
     * @return OcOrderVoucher
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
     * @return OcOrderVoucher
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
     * @return OcOrderVoucher
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
     * @return OcOrderVoucher
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
     * @return OcOrderVoucher
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
     * @return OcOrderVoucher
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
     * @return OcOrderVoucher
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
     * Get orderVoucherId
     *
     * @return integer
     */
    public function getOrderVoucherId()
    {
        return $this->orderVoucherId;
    }

    /**
     * Set voucherTheme
     *
     * @param \OcVoucherTheme $voucherTheme
     *
     * @return OcOrderVoucher
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
     * @return OcOrderVoucher
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
     * @return OcOrderVoucher
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
