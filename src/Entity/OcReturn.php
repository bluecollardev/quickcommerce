<?php


/**
 * OcReturn
 *
 * @ORM\Table(name="oc2_return", indexes={@ORM\Index(name="IDX_F876FA718D9F6D38",
 * columns={"order_id"}), @ORM\Index(name="IDX_F876FA714584665A",
 * columns={"product_id"}), @ORM\Index(name="IDX_F876FA719395C3F3",
 * columns={"customer_id"}), @ORM\Index(name="IDX_F876FA71ACA2AB22",
 * columns={"return_reason_id"}), @ORM\Index(name="IDX_F876FA71682B4E85",
 * columns={"return_action_id"}), @ORM\Index(name="IDX_F876FA719EEEBE0D",
 * columns={"return_status_id"})})
 * @ORM\Entity
 */
class OcReturn
{

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=32, nullable=false)
     */
    private $firstname = null;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=32, nullable=false)
     */
    private $lastname = null;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=96, nullable=false)
     */
    private $email = null;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=32, nullable=false)
     */
    private $telephone = null;

    /**
     * @var string
     *
     * @ORM\Column(name="product", type="string", length=255, nullable=false)
     */
    private $product = null;

    /**
     * @var string
     *
     * @ORM\Column(name="model", type="string", length=64, nullable=false)
     */
    private $model = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantity", type="integer", nullable=false)
     */
    private $quantity = null;

    /**
     * @var boolean
     *
     * @ORM\Column(name="opened", type="boolean", nullable=false)
     */
    private $opened = null;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="text", length=65535, nullable=true)
     */
    private $comment = null;

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
    private $dateAdded = null;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_modified", type="datetime", nullable=false)
     */
    private $dateModified = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="return_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $returnId = null;

    /**
     * @var \OcReturnStatus
     *
     * @ORM\ManyToOne(targetEntity="OcReturnStatus")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="return_status_id",
     * referencedColumnName="return_status_id")
     * })
     */
    private $returnStatus = null;

    /**
     * @var \OcReturnReason
     *
     * @ORM\ManyToOne(targetEntity="OcReturnReason")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="return_reason_id",
     * referencedColumnName="return_reason_id")
     * })
     */
    private $returnReason = null;

    /**
     * @var \OcCustomer
     *
     * @ORM\ManyToOne(targetEntity="OcCustomer")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="customer_id", referencedColumnName="customer_id")
     * })
     */
    private $customer = null;

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
     * @var \OcReturnAction
     *
     * @ORM\ManyToOne(targetEntity="OcReturnAction")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="return_action_id",
     * referencedColumnName="return_action_id")
     * })
     */
    private $returnAction = null;

    /**
     * @var \OcProduct
     *
     * @ORM\ManyToOne(targetEntity="OcProduct")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="product_id", referencedColumnName="product_id")
     * })
     */
    private $product2 = null;

    /**
     * Set firstname
     *
     * @param string $firstname
     *
     * @return OcReturn
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return OcReturn
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return OcReturn
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     *
     * @return OcReturn
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set product
     *
     * @param string $product
     *
     * @return OcReturn
     */
    public function setProduct($product)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return string
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Set model
     *
     * @param string $model
     *
     * @return OcReturn
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get model
     *
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     *
     * @return OcReturn
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set opened
     *
     * @param boolean $opened
     *
     * @return OcReturn
     */
    public function setOpened($opened)
    {
        $this->opened = $opened;

        return $this;
    }

    /**
     * Get opened
     *
     * @return boolean
     */
    public function getOpened()
    {
        return $this->opened;
    }

    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return OcReturn
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set dateOrdered
     *
     * @param \DateTime $dateOrdered
     *
     * @return OcReturn
     */
    public function setDateOrdered($dateOrdered)
    {
        $this->dateOrdered = $dateOrdered;

        return $this;
    }

    /**
     * Get dateOrdered
     *
     * @return \DateTime
     */
    public function getDateOrdered()
    {
        return $this->dateOrdered;
    }

    /**
     * Set dateAdded
     *
     * @param \DateTime $dateAdded
     *
     * @return OcReturn
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
     * Set dateModified
     *
     * @param \DateTime $dateModified
     *
     * @return OcReturn
     */
    public function setDateModified($dateModified)
    {
        $this->dateModified = $dateModified;

        return $this;
    }

    /**
     * Get dateModified
     *
     * @return \DateTime
     */
    public function getDateModified()
    {
        return $this->dateModified;
    }

    /**
     * Get returnId
     *
     * @return integer
     */
    public function getReturnId()
    {
        return $this->returnId;
    }

    /**
     * Set returnStatus
     *
     * @param \OcReturnStatus $returnStatus
     *
     * @return OcReturn
     */
    public function setReturnStatus(\OcReturnStatus $returnStatus = null)
    {
        $this->returnStatus = $returnStatus;

        return $this;
    }

    /**
     * Get returnStatus
     *
     * @return \OcReturnStatus
     */
    public function getReturnStatus()
    {
        return $this->returnStatus;
    }

    /**
     * Set returnReason
     *
     * @param \OcReturnReason $returnReason
     *
     * @return OcReturn
     */
    public function setReturnReason(\OcReturnReason $returnReason = null)
    {
        $this->returnReason = $returnReason;

        return $this;
    }

    /**
     * Get returnReason
     *
     * @return \OcReturnReason
     */
    public function getReturnReason()
    {
        return $this->returnReason;
    }

    /**
     * Set customer
     *
     * @param \OcCustomer $customer
     *
     * @return OcReturn
     */
    public function setCustomer(\OcCustomer $customer = null)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * Get customer
     *
     * @return \OcCustomer
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Set order
     *
     * @param \OcOrder $order
     *
     * @return OcReturn
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
     * Set returnAction
     *
     * @param \OcReturnAction $returnAction
     *
     * @return OcReturn
     */
    public function setReturnAction(\OcReturnAction $returnAction = null)
    {
        $this->returnAction = $returnAction;

        return $this;
    }

    /**
     * Get returnAction
     *
     * @return \OcReturnAction
     */
    public function getReturnAction()
    {
        return $this->returnAction;
    }

    /**
     * Set product2
     *
     * @param \OcProduct $product2
     *
     * @return OcReturn
     */
    public function setProduct2(\OcProduct $product2 = null)
    {
        $this->product2 = $product2;

        return $this;
    }

    /**
     * Get product2
     *
     * @return \OcProduct
     */
    public function getProduct2()
    {
        return $this->product2;
    }


}
