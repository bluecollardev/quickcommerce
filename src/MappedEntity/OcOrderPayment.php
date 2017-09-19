<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * OcOrderPayment
 *
 * @ORM\Table(name="oc_order_payment", indexes={@ORM\Index(name="order_id", columns={"order_id"})})
 * @ORM\Entity
 */
class OcOrderPayment
{
    /**
     * @var integer
     *
     * @ORM\Column(name="order_payment_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $orderPaymentId;

    /**
     * @var integer
     *
     * @ORM\Column(name="order_id", type="integer", nullable=false)
     */
    private $orderId = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="pos_return_id", type="integer", nullable=false)
     */
    private $posReturnId = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="user_id", type="integer", nullable=false)
     */
    private $userId;

    /**
     * @var string
     *
     * @ORM\Column(name="payment_type", type="string", length=100, nullable=true)
     */
    private $paymentType;

    /**
     * @var float
     *
     * @ORM\Column(name="tendered_amount", type="float", precision=10, scale=0, nullable=false)
     */
    private $tenderedAmount;

    /**
     * @var string
     *
     * @ORM\Column(name="payment_note", type="string", length=256, nullable=true)
     */
    private $paymentNote;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="payment_time", type="datetime", nullable=true)
     */
    private $paymentTime;


}

