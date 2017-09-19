<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * OcOrderCommission
 *
 * @ORM\Table(name="oc_order_commission")
 * @ORM\Entity
 */
class OcOrderCommission
{
    /**
     * @var integer
     *
     * @ORM\Column(name="order_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $orderId;

    /**
     * @var string
     *
     * @ORM\Column(name="commission", type="decimal", precision=8, scale=2, nullable=true)
     */
    private $commission = '0.00';

    /**
     * @var integer
     *
     * @ORM\Column(name="user_id", type="integer", nullable=false)
     */
    private $userId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_modified", type="datetime", nullable=true)
     */
    private $dateModified;


}

