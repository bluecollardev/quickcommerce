<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * OcReturn
 *
 * @ORM\Table(name="oc_return")
 * @ORM\Entity
 */
class OcReturn
{
    /**
     * @var integer
     *
     * @ORM\Column(name="return_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $returnId;

    /**
     * @var integer
     *
     * @ORM\Column(name="order_id", type="integer", nullable=false)
     */
    private $orderId;

    /**
     * @var integer
     *
     * @ORM\Column(name="product_id", type="integer", nullable=false)
     */
    private $productId;

    /**
     * @var integer
     *
     * @ORM\Column(name="customer_id", type="integer", nullable=false)
     */
    private $customerId;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=32, nullable=false)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=32, nullable=false)
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=96, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=32, nullable=false)
     */
    private $telephone;

    /**
     * @var string
     *
     * @ORM\Column(name="product", type="string", length=255, nullable=false)
     */
    private $product;

    /**
     * @var string
     *
     * @ORM\Column(name="model", type="string", length=64, nullable=false)
     */
    private $model;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantity", type="integer", nullable=false)
     */
    private $quantity;

    /**
     * @var boolean
     *
     * @ORM\Column(name="opened", type="boolean", nullable=false)
     */
    private $opened;

    /**
     * @var integer
     *
     * @ORM\Column(name="return_reason_id", type="integer", nullable=false)
     */
    private $returnReasonId;

    /**
     * @var integer
     *
     * @ORM\Column(name="return_action_id", type="integer", nullable=false)
     */
    private $returnActionId;

    /**
     * @var integer
     *
     * @ORM\Column(name="return_status_id", type="integer", nullable=false)
     */
    private $returnStatusId;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="text", length=65535, nullable=true)
     */
    private $comment;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_ordered", type="date", nullable=false)
     */
    private $dateOrdered = '0000-00-00';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_added", type="datetime", nullable=false)
     */
    private $dateAdded;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_modified", type="datetime", nullable=false)
     */
    private $dateModified;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="decimal", precision=15, scale=4, nullable=true)
     */
    private $price;

    /**
     * @var string
     *
     * @ORM\Column(name="tax", type="decimal", precision=15, scale=4, nullable=true)
     */
    private $tax;

    /**
     * @var integer
     *
     * @ORM\Column(name="order_product_id", type="integer", nullable=true)
     */
    private $orderProductId;

    /**
     * @var integer
     *
     * @ORM\Column(name="pos_return_id", type="integer", nullable=true)
     */
    private $posReturnId = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="weight", type="decimal", precision=8, scale=2, nullable=true)
     */
    private $weight = '1.00';

    /**
     * @var string
     *
     * @ORM\Column(name="weight_name", type="string", length=20, nullable=true)
     */
    private $weightName;

    /**
     * @var string
     *
     * @ORM\Column(name="sn", type="string", length=32, nullable=true)
     */
    private $sn;


}

