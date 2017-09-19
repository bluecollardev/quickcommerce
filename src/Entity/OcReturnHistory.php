<?php


/**
 * OcReturnHistory
 *
 * @ORM\Table(name="oc2_return_history",
 * indexes={@ORM\Index(name="IDX_563990EF227416D5", columns={"return_id"}),
 * @ORM\Index(name="IDX_563990EF9EEEBE0D", columns={"return_status_id"})})
 * @ORM\Entity
 */
class OcReturnHistory
{

    /**
     * @var boolean
     *
     * @ORM\Column(name="notify", type="boolean", nullable=false)
     */
    private $notify = null;

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
     * @ORM\Column(name="return_history_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $returnHistoryId = null;

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
     * @var \OcReturn
     *
     * @ORM\ManyToOne(targetEntity="OcReturn")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="return_id", referencedColumnName="return_id")
     * })
     */
    private $return = null;

    /**
     * Set notify
     *
     * @param boolean $notify
     *
     * @return OcReturnHistory
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
     * @return OcReturnHistory
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
     * @return OcReturnHistory
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
     * Get returnHistoryId
     *
     * @return integer
     */
    public function getReturnHistoryId()
    {
        return $this->returnHistoryId;
    }

    /**
     * Set returnStatus
     *
     * @param \OcReturnStatus $returnStatus
     *
     * @return OcReturnHistory
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
     * Set return
     *
     * @param \OcReturn $return
     *
     * @return OcReturnHistory
     */
    public function setReturn(\OcReturn $return = null)
    {
        $this->return = $return;

        return $this;
    }

    /**
     * Get return
     *
     * @return \OcReturn
     */
    public function getReturn()
    {
        return $this->return;
    }


}
