<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * OcProduct
 *
 * @ORM\Table(name="oc_product")
 * @ORM\Entity
 */
class OcProduct
{
    /**
     * @var integer
     *
     * @ORM\Column(name="product_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $productId;

    /**
     * @var string
     *
     * @ORM\Column(name="model", type="string", length=64, nullable=false)
     */
    private $model;

    /**
     * @var string
     *
     * @ORM\Column(name="sku", type="string", length=64, nullable=false)
     */
    private $sku;

    /**
     * @var string
     *
     * @ORM\Column(name="upc", type="string", length=12, nullable=false)
     */
    private $upc;

    /**
     * @var string
     *
     * @ORM\Column(name="ean", type="string", length=14, nullable=false)
     */
    private $ean;

    /**
     * @var string
     *
     * @ORM\Column(name="jan", type="string", length=13, nullable=false)
     */
    private $jan;

    /**
     * @var string
     *
     * @ORM\Column(name="isbn", type="string", length=17, nullable=false)
     */
    private $isbn;

    /**
     * @var string
     *
     * @ORM\Column(name="mpn", type="string", length=64, nullable=false)
     */
    private $mpn;

    /**
     * @var string
     *
     * @ORM\Column(name="location", type="string", length=128, nullable=false)
     */
    private $location;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantity", type="integer", nullable=false)
     */
    private $quantity = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="stock_status_id", type="integer", nullable=false)
     */
    private $stockStatusId;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @var integer
     *
     * @ORM\Column(name="manufacturer_id", type="integer", nullable=false)
     */
    private $manufacturerId;

    /**
     * @var boolean
     *
     * @ORM\Column(name="shipping", type="boolean", nullable=false)
     */
    private $shipping = '1';

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="decimal", precision=15, scale=4, nullable=false)
     */
    private $price = '0.0000';

    /**
     * @var integer
     *
     * @ORM\Column(name="points", type="integer", nullable=false)
     */
    private $points = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="tax_class_id", type="integer", nullable=false)
     */
    private $taxClassId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_available", type="date", nullable=false)
     */
    private $dateAvailable = '0000-00-00';

    /**
     * @var string
     *
     * @ORM\Column(name="weight", type="decimal", precision=15, scale=8, nullable=false)
     */
    private $weight = '0.00000000';

    /**
     * @var integer
     *
     * @ORM\Column(name="weight_class_id", type="integer", nullable=false)
     */
    private $weightClassId = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="length", type="decimal", precision=15, scale=8, nullable=false)
     */
    private $length = '0.00000000';

    /**
     * @var string
     *
     * @ORM\Column(name="width", type="decimal", precision=15, scale=8, nullable=false)
     */
    private $width = '0.00000000';

    /**
     * @var string
     *
     * @ORM\Column(name="height", type="decimal", precision=15, scale=8, nullable=false)
     */
    private $height = '0.00000000';

    /**
     * @var integer
     *
     * @ORM\Column(name="length_class_id", type="integer", nullable=false)
     */
    private $lengthClassId = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="subtract", type="boolean", nullable=false)
     */
    private $subtract = '1';

    /**
     * @var integer
     *
     * @ORM\Column(name="minimum", type="integer", nullable=false)
     */
    private $minimum = '1';

    /**
     * @var integer
     *
     * @ORM\Column(name="sort_order", type="integer", nullable=false)
     */
    private $sortOrder = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="status", type="boolean", nullable=false)
     */
    private $status = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="viewed", type="integer", nullable=false)
     */
    private $viewed = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_added", type="datetime", nullable=false)
     */
    private $dateAdded;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_modified", type="datetime", nullable=false)
     */
    private $dateModified;

    /**
     * @var string
     *
     * @ORM\Column(name="abbreviation", type="string", length=10, nullable=true)
     */
    private $abbreviation = '';

    /**
     * @var integer
     *
     * @ORM\Column(name="quick_sale", type="integer", nullable=true)
     */
    private $quickSale = '1';

    /**
     * @var boolean
     *
     * @ORM\Column(name="weight_price", type="boolean", nullable=true)
     */
    private $weightPrice = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="weight_name", type="string", length=20, nullable=true)
     */
    private $weightName = 'Weight';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="best_before", type="date", nullable=true)
     */
    //private $bestBefore = '0000-00-00';

    /**
     * @var integer
     *
     * @ORM\Column(name="low_stock", type="integer", nullable=true)
     */
    //private $lowStock = '3';


}

