<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * OcProductSn
 *
 * @ORM\Table(name="oc_product_sn")
 * @ORM\Entity
 */
class OcProductSn
{
    /**
     * @var integer
     *
     * @ORM\Column(name="product_sn_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $productSnId;

    /**
     * @var integer
     *
     * @ORM\Column(name="product_id", type="integer", nullable=false)
     */
    private $productId;

    /**
     * @var string
     *
     * @ORM\Column(name="sn", type="string", length=32, nullable=false)
     */
    private $sn;

    /**
     * @var boolean
     *
     * @ORM\Column(name="status", type="boolean", nullable=true)
     */
    private $status = '1';

    /**
     * @var integer
     *
     * @ORM\Column(name="order_product_id", type="integer", nullable=true)
     */
    private $orderProductId;

    /**
     * @var integer
     *
     * @ORM\Column(name="order_id", type="integer", nullable=true)
     */
    private $orderId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_modified", type="datetime", nullable=true)
     */
    private $dateModified;

    /**
     * @var string
     *
     * @ORM\Column(name="cost", type="decimal", precision=8, scale=2, nullable=true)
     */
    private $cost = '0.00';

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="string", length=256, nullable=true)
     */
    private $comment;


}

