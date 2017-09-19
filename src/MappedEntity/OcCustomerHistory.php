<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * OcCustomerHistory
 *
 * @ORM\Table(name="oc_customer_history")
 * @ORM\Entity
 */
class OcCustomerHistory
{
    /**
     * @var integer
     *
     * @ORM\Column(name="customer_history_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $customerHistoryId;

    /**
     * @var integer
     *
     * @ORM\Column(name="customer_id", type="integer", nullable=false)
     */
    private $customerId;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="text", length=65535, nullable=false)
     */
    private $comment;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_added", type="datetime", nullable=false)
     */
    private $dateAdded;


}

