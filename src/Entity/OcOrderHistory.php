<?php


/**
 * OcOrderHistory
 *
 * @ORM\Table(name="oc2_order_history",
 * indexes={@ORM\Index(name="IDX_A7786E9B8D9F6D38", columns={"order_id"}),
 * @ORM\Index(name="IDX_A7786E9BD7707B45", columns={"order_status_id"})})
 * @ORM\Entity
 */
class OcOrderHistory
{

    /**
     * @var boolean
     *
     * @ORM\Column(name="notify", type="boolean", nullable=false)
     */
    private $notify = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="text", length=65535, nullable=false)
     */
    private $comment = null;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_added", type="datetime", nullable=false)
     */
    private $dateAdded = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="order_history_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $orderHistoryId = null;

    /**
     * @var \OcOrderStatus
     *
     * @ORM\ManyToOne(targetEntity="OcOrderStatus")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="order_status_id",
     * referencedColumnName="order_status_id")
     * })
     */
    private $orderStatus = null;

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
     * Set notify
     *
     * @param boolean $notify
     *
     * @return OcOrderHistory
     */
    public function setNotify($notify)
    {
        $this->notify = $notify;

        return $this;
    }

    /**
     * Get notify
     *
     * @return boolean
     */
    public function getNotify()
    {
        return $this->notify;
    }

    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return OcOrderHistory
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
     * Set dateAdded
     *
     * @param \DateTime $dateAdded
     *
     * @return OcOrderHistory
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
     * Get orderHistoryId
     *
     * @return integer
     */
    public function getOrderHistoryId()
    {
        return $this->orderHistoryId;
    }

    /**
     * Set orderStatus
     *
     * @param \OcOrderStatus $orderStatus
     *
     * @return OcOrderHistory
     */
    public function setOrderStatus(\OcOrderStatus $orderStatus = null)
    {
        $this->orderStatus = $orderStatus;

        return $this;
    }

    /**
     * Get orderStatus
     *
     * @return \OcOrderStatus
     */
    public function getOrderStatus()
    {
        return $this->orderStatus;
    }

    /**
     * Set order
     *
     * @param \OcOrder $order
     *
     * @return OcOrderHistory
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
