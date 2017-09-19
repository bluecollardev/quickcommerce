<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * OcLocationStock
 *
 * @ORM\Table(name="oc_location_stock")
 * @ORM\Entity
 */
class OcLocationStock
{
    /**
     * @var integer
     *
     * @ORM\Column(name="location_stock_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $locationStockId;

    /**
     * @var integer
     *
     * @ORM\Column(name="location_id", type="integer", nullable=true)
     */
    private $locationId;

    /**
     * @var integer
     *
     * @ORM\Column(name="product_id", type="integer", nullable=false)
     */
    private $productId;

    /**
     * @var integer
     *
     * @ORM\Column(name="product_option_value_id", type="integer", nullable=true)
     */
    private $productOptionValueId;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantity", type="integer", nullable=true)
     */
    private $quantity;

    /**
     * @var integer
     *
     * @ORM\Column(name="low_stock", type="integer", nullable=true)
     */
    //private $lowStock = '3';


}

