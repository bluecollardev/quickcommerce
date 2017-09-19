<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * OcProductPackaging
 *
 * @ORM\Table(name="oc_product_packaging")
 * @ORM\Entity
 */
class OcProductPackaging
{
    /**
     * @var integer
     *
     * @ORM\Column(name="packaging_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $packagingId;

    /**
     * @var string
     *
     * @ORM\Column(name="packaging_slip", type="string", length=50, nullable=false)
     */
    private $packagingSlip;

    /**
     * @var string
     *
     * @ORM\Column(name="order_number", type="string", length=50, nullable=false)
     */
    private $orderNumber;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=true)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="note", type="string", length=100, nullable=true)
     */
    private $note;


}

