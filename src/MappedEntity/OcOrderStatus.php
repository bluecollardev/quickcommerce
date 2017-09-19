<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * OcOrderStatus
 *
 * @ORM\Table(name="oc_order_status")
 * @ORM\Entity
 */
class OcOrderStatus
{
    /**
     * @var integer
     *
     * @ORM\Column(name="order_status_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $orderStatusId;

    /**
     * @var integer
     *
     * @ORM\Column(name="language_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $languageId;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=32, nullable=false)
     */
    private $name;


}

