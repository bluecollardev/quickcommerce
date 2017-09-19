<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * OcLocationStockTransfer
 *
 * @ORM\Table(name="oc_location_stock_transfer")
 * @ORM\Entity
 */
class OcLocationStockTransfer
{
    /**
     * @var integer
     *
     * @ORM\Column(name="transfer_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $transferId;

    /**
     * @var integer
     *
     * @ORM\Column(name="product_id", type="integer", nullable=false)
     */
    private $productId;

    /**
     * @var string
     *
     * @ORM\Column(name="product_option_value_ids", type="string", length=100, nullable=true)
     */
    private $productOptionValueIds = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="product_option_value_names", type="string", length=500, nullable=true)
     */
    private $productOptionValueNames = '';

    /**
     * @var integer
     *
     * @ORM\Column(name="quantity", type="integer", nullable=false)
     */
    private $quantity;

    /**
     * @var integer
     *
     * @ORM\Column(name="order_id", type="integer", nullable=true)
     */
    private $orderId;

    /**
     * @var integer
     *
     * @ORM\Column(name="from_location_id", type="integer", nullable=true)
     */
    private $fromLocationId;

    /**
     * @var integer
     *
     * @ORM\Column(name="status_id", type="integer", nullable=true)
     */
    private $statusId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_added", type="datetime", nullable=true)
     */
    private $dateAdded;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_modified", type="datetime", nullable=true)
     */
    private $dateModified;


}

