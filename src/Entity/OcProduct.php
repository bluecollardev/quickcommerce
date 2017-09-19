<?php


/**
 * OcProduct
 *
 * @ORM\Table(name="oc2_product", indexes={@ORM\Index(name="IDX_64A8B053F36AE655",
 * columns={"stock_status_id"}), @ORM\Index(name="IDX_64A8B053A23B42D",
 * columns={"manufacturer_id"}), @ORM\Index(name="IDX_64A8B053A94AAAE",
 * columns={"tax_class_id"}), @ORM\Index(name="IDX_64A8B053A0206A65",
 * columns={"weight_class_id"}), @ORM\Index(name="IDX_64A8B053DEBB62E6",
 * columns={"length_class_id"})})
 * @ORM\Entity
 */
class OcProduct
{
	/**
     * @var string
     *
     * @ORM\Column(name="qbname", type="string", length=255, nullable=false)
     */
    private $qbname = null;
	
	/**
     * @var string
     *
     * @ORM\Column(name="parent_id", type="integer", nullable=false)
     */
    private $parentId = null;
    
	/**
     * @var string
     *
     * @ORM\Column(name="model", type="string", length=64, nullable=false)
     */
    private $model = null;

    /**
     * @var string
     *
     * @ORM\Column(name="sku", type="string", length=64, nullable=false)
     */
    private $sku = null;

    /**
     * @var string
     *
     * @ORM\Column(name="upc", type="string", length=12, nullable=false)
     */
    private $upc = null;

    /**
     * @var string
     *
     * @ORM\Column(name="ean", type="string", length=14, nullable=false)
     */
    private $ean = null;

    /**
     * @var string
     *
     * @ORM\Column(name="jan", type="string", length=13, nullable=false)
     */
    private $jan = null;

    /**
     * @var string
     *
     * @ORM\Column(name="isbn", type="string", length=17, nullable=false)
     */
    private $isbn = null;

    /**
     * @var string
     *
     * @ORM\Column(name="mpn", type="string", length=64, nullable=false)
     */
    private $mpn = null;

    /**
     * @var string
     *
     * @ORM\Column(name="location", type="string", length=128, nullable=false)
     */
    private $location = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantity", type="integer", nullable=false)
     */
    private $quantity = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=true)
     */
    private $image = null;

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
     * @var string
     *
     * @ORM\Column(name="cost", type="decimal", precision=15, scale=4, nullable=false)
     */
    private $cost = '0.0000';

    /**
     * @var integer
     *
     * @ORM\Column(name="points", type="integer", nullable=false)
     */
    private $points = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_available", type="date", nullable=false)
     */
    private $dateAvailable = '0000-00-00';

    /**
     * @var string
     *
     * @ORM\Column(name="weight", type="decimal", precision=15, scale=8,
     * nullable=false)
     */
    private $weight = '0.00000000';

    /**
     * @var string
     *
     * @ORM\Column(name="length", type="decimal", precision=15, scale=8,
     * nullable=false)
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
     * @ORM\Column(name="height", type="decimal", precision=15, scale=8,
     * nullable=false)
     */
    private $height = '0.00000000';

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
    private $dateAdded = null;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_modified", type="datetime", nullable=false)
     */
    private $dateModified = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="product_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $productId = null;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="OcProductDescription", mappedBy="product")
     */
    private $description = null;

    /**
     * @var \OcWeightClass
     *
     * @ORM\ManyToOne(targetEntity="OcWeightClass")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="weight_class_id",
     * referencedColumnName="weight_class_id")
     * })
     */
    private $weightClass = null;

    /**
     * @var \OcLengthClass
     *
     * @ORM\ManyToOne(targetEntity="OcLengthClass")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="length_class_id",
     * referencedColumnName="length_class_id")
     * })
     */
    private $lengthClass = null;
	
	/**
     * @var \OcStockStatus
     *
     * @ORM\ManyToOne(targetEntity="OcStockStatus")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="stock_status_id",
     * referencedColumnName="stock_status_id")
     * })
     */
    private $stockStatus = null;

    /**
     * @var \OcTaxClass
     *
     * @ORM\ManyToOne(targetEntity="OcTaxClass")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tax_class_id", referencedColumnName="tax_class_id")
     * })
     */
    private $taxClass = null;

    /**
     * @var \OcManufacturer
     *
     * @ORM\ManyToOne(targetEntity="OcManufacturer")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="manufacturer_id",
     * referencedColumnName="manufacturer_id")
     * })
     */
    private $manufacturer = null;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="OcStore", inversedBy="product")
     * @ORM\JoinTable(name="oc2_product_to_store",
     *   joinColumns={
     *     @ORM\JoinColumn(name="product_id", referencedColumnName="product_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="store_id", referencedColumnName="store_id")
     *   }
     * )
     */
    private $store = null;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="OcFilter", inversedBy="product")
     * @ORM\JoinTable(name="oc2_product_filter",
     *   joinColumns={
     *     @ORM\JoinColumn(name="product_id", referencedColumnName="product_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="filter_id", referencedColumnName="filter_id")
     *   }
     * )
     */
    private $filter = null;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="OcCategory", inversedBy="product")
     * @ORM\JoinTable(name="oc2_product_to_category",
     *   joinColumns={
     *     @ORM\JoinColumn(name="product_id", referencedColumnName="product_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="category_id", referencedColumnName="category_id")
     *   }
     * )
     */
    private $category = null;
    
	private $attribute = null;
	
	private $option = null;
	
	private $images = null; // TODO: This doesn't match convention but I have a colliding property...
	
	/**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="OcDownload", inversedBy="product")
     * @ORM\JoinTable(name="oc2_product_to_download",
     *   joinColumns={
     *     @ORM\JoinColumn(name="product_id", referencedColumnName="product_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="download_id", referencedColumnName="download_id")
     *   }
     * )
     */
    private $download = null;
	
	private $discount = null;
	
	private $special = null;
	
	private $reward = null;
	
	private $poCost = null;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->description = new \Doctrine\Common\Collections\ArrayCollection();
        $this->store = new \Doctrine\Common\Collections\ArrayCollection();
        $this->filter = new \Doctrine\Common\Collections\ArrayCollection();
        $this->category = new \Doctrine\Common\Collections\ArrayCollection();
        $this->attribute = new \Doctrine\Common\Collections\ArrayCollection();
        $this->option = new \Doctrine\Common\Collections\ArrayCollection();
        $this->images = new \Doctrine\Common\Collections\ArrayCollection();  // TODO: This doesn't match convention but I have a colliding property...
		$this->download = new \Doctrine\Common\Collections\ArrayCollection();
		$this->discount = new \Doctrine\Common\Collections\ArrayCollection();
        $this->special = new \Doctrine\Common\Collections\ArrayCollection();
        $this->reward = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set model
     *
     * @param string $model
     *
     * @return OcProduct
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get model
     *
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }
	
	/**
     * Set qbname
     *
     * @param string $qbname
     *
     * @return OcProduct
     */
    public function setQbname($qbname)
    {
        $this->qbname = $qbname;

        return $this;
    }

    /**
     * Get qbname
     *
     * @return string
     */
    public function getQbname()
    {
        return $this->qbname;
    }
	
	/**
     * Set parentId
     *
     * @param string $parentId
     *
     * @return OcProduct
     */
    public function setParentId($parentId)
    {
        $this->parentId = $parentId;

        return $this;
    }

    /**
     * Get parentId
     *
     * @return string
     */
    public function getParentId()
    {
        return $this->parentId;
    }

    /**
     * Set sku
     *
     * @param string $sku
     *
     * @return OcProduct
     */
    public function setSku($sku)
    {
        $this->sku = $sku;

        return $this;
    }

    /**
     * Get sku
     *
     * @return string
     */
    public function getSku()
    {
        return $this->sku;
    }

    /**
     * Set upc
     *
     * @param string $upc
     *
     * @return OcProduct
     */
    public function setUpc($upc)
    {
        $this->upc = $upc;

        return $this;
    }

    /**
     * Get upc
     *
     * @return string
     */
    public function getUpc()
    {
        return $this->upc;
    }

    /**
     * Set ean
     *
     * @param string $ean
     *
     * @return OcProduct
     */
    public function setEan($ean)
    {
        $this->ean = $ean;

        return $this;
    }

    /**
     * Get ean
     *
     * @return string
     */
    public function getEan()
    {
        return $this->ean;
    }

    /**
     * Set jan
     *
     * @param string $jan
     *
     * @return OcProduct
     */
    public function setJan($jan)
    {
        $this->jan = $jan;

        return $this;
    }

    /**
     * Get jan
     *
     * @return string
     */
    public function getJan()
    {
        return $this->jan;
    }

    /**
     * Set isbn
     *
     * @param string $isbn
     *
     * @return OcProduct
     */
    public function setIsbn($isbn)
    {
        $this->isbn = $isbn;

        return $this;
    }

    /**
     * Get isbn
     *
     * @return string
     */
    public function getIsbn()
    {
        return $this->isbn;
    }

    /**
     * Set mpn
     *
     * @param string $mpn
     *
     * @return OcProduct
     */
    public function setMpn($mpn)
    {
        $this->mpn = $mpn;

        return $this;
    }

    /**
     * Get mpn
     *
     * @return string
     */
    public function getMpn()
    {
        return $this->mpn;
    }

    /**
     * Set location
     *
     * @param string $location
     *
     * @return OcProduct
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     *
     * @return OcProduct
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return OcProduct
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set shipping
     *
     * @param boolean $shipping
     *
     * @return OcProduct
     */
    public function setShipping($shipping)
    {
        $this->shipping = $shipping;

        return $this;
    }

    /**
     * Get shipping
     *
     * @return boolean
     */
    public function getShipping()
    {
        return $this->shipping;
    }

    /**
     * Set price
     *
     * @param string $price
     *
     * @return OcProduct
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Get cost
     *
     * @return string
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * Set cost
     *
     * @param string $cost
     *
     * @return OcProduct
     */
    public function setCost($cost)
    {
        $this->cost = $cost;

        return $this;
    }

    /**
     * Set points
     *
     * @param integer $points
     *
     * @return OcProduct
     */
    public function setPoints($points)
    {
        $this->points = $points;

        return $this;
    }

    /**
     * Get points
     *
     * @return integer
     */
    public function getPoints()
    {
        return $this->points;
    }

    /**
     * Set dateAvailable
     *
     * @param \DateTime $dateAvailable
     *
     * @return OcProduct
     */
    public function setDateAvailable($dateAvailable)
    {
        $this->dateAvailable = $dateAvailable;

        return $this;
    }

    /**
     * Get dateAvailable
     *
     * @return \DateTime
     */
    public function getDateAvailable()
    {
        return $this->dateAvailable;
    }

    /**
     * Set weight
     *
     * @param string $weight
     *
     * @return OcProduct
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get weight
     *
     * @return string
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set length
     *
     * @param string $length
     *
     * @return OcProduct
     */
    public function setLength($length)
    {
        $this->length = $length;

        return $this;
    }

    /**
     * Get length
     *
     * @return string
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * Set width
     *
     * @param string $width
     *
     * @return OcProduct
     */
    public function setWidth($width)
    {
        $this->width = $width;

        return $this;
    }

    /**
     * Get width
     *
     * @return string
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Set height
     *
     * @param string $height
     *
     * @return OcProduct
     */
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * Get height
     *
     * @return string
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set subtract
     *
     * @param boolean $subtract
     *
     * @return OcProduct
     */
    public function setSubtract($subtract)
    {
        $this->subtract = $subtract;

        return $this;
    }

    /**
     * Get subtract
     *
     * @return boolean
     */
    public function getSubtract()
    {
        return $this->subtract;
    }

    /**
     * Set minimum
     *
     * @param integer $minimum
     *
     * @return OcProduct
     */
    public function setMinimum($minimum)
    {
        $this->minimum = $minimum;

        return $this;
    }

    /**
     * Get minimum
     *
     * @return integer
     */
    public function getMinimum()
    {
        return $this->minimum;
    }

    /**
     * Set sortOrder
     *
     * @param integer $sortOrder
     *
     * @return OcProduct
     */
    public function setSortOrder($sortOrder)
    {
        $this->sortOrder = $sortOrder;

        return $this;
    }

    /**
     * Get sortOrder
     *
     * @return integer
     */
    public function getSortOrder()
    {
        return $this->sortOrder;
    }

    /**
     * Set status
     *
     * @param boolean $status
     *
     * @return OcProduct
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return boolean
     */
    public function getStatus()
    {
        return $this->status;
    }
	
	/**
     * Set stockStatus
     *
     * @param boolean $stockStatus
     *
     * @return OcProduct
     */
    public function setStockStatus($stockStatus)
    {
        $this->stockStatus = $stockStatus;

        return $this;
    }

    /**
     * Get stockStatus
     *
     * @return boolean
     */
    public function getStockStatus()
    {
        return $this->stockStatus;
    }

    /**
     * Set viewed
     *
     * @param integer $viewed
     *
     * @return OcProduct
     */
    public function setViewed($viewed)
    {
        $this->viewed = $viewed;

        return $this;
    }

    /**
     * Get viewed
     *
     * @return integer
     */
    public function getViewed()
    {
        return $this->viewed;
    }

    /**
     * Set dateAdded
     *
     * @param \DateTime $dateAdded
     *
     * @return OcProduct
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
     * Set dateModified
     *
     * @param \DateTime $dateModified
     *
     * @return OcProduct
     */
    public function setDateModified($dateModified)
    {
        $this->dateModified = $dateModified;

        return $this;
    }

    /**
     * Get dateModified
     *
     * @return \DateTime
     */
    public function getDateModified()
    {
        return $this->dateModified;
    }

    /**
     * Get productId
     *
     * @return integer
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * Add description
     *
     * @param \OcProductDescription $description
     *
     * @return OcProduct
     */
    public function addDescription(\OcProductDescription $description)
    {
        $this->description[] = $description;

        return $this;
    }

    /**
     * Remove description
     *
     * @param \OcProductDescription $description
     */
    public function removeDescription(\OcProductDescription $description)
    {
        $this->description->removeElement($description);
    }

    /**
     * Get description
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set weightClass
     *
     * @param \OcWeightClass $weightClass
     *
     * @return OcProduct
     */
    public function setWeightClass(\OcWeightClass $weightClass = null)
    {
        $this->weightClass = $weightClass;

        return $this;
    }

    /**
     * Get weightClass
     *
     * @return \OcWeightClass
     */
    public function getWeightClass()
    {
        return $this->weightClass;
    }

    /**
     * Set lengthClass
     *
     * @param \OcLengthClass $lengthClass
     *
     * @return OcProduct
     */
    public function setLengthClass(\OcLengthClass $lengthClass = null)
    {
        $this->lengthClass = $lengthClass;

        return $this;
    }

    /**
     * Get lengthClass
     *
     * @return \OcLengthClass
     */
    public function getLengthClass()
    {
        return $this->lengthClass;
    }

    /**
     * Set taxClass
     *
     * @param \OcTaxClass $taxClass
     *
     * @return OcProduct
     */
    public function setTaxClass(\OcTaxClass $taxClass = null)
    {
        $this->taxClass = $taxClass;

        return $this;
    }

    /**
     * Get taxClass
     *
     * @return \OcTaxClass
     */
    public function getTaxClass()
    {
        return $this->taxClass;
    }

    /**
     * Set manufacturer
     *
     * @param \OcManufacturer $manufacturer
     *
     * @return OcProduct
     */
    public function setManufacturer(\OcManufacturer $manufacturer = null)
    {
        $this->manufacturer = $manufacturer;

        return $this;
    }

    /**
     * Get manufacturer
     *
     * @return \OcManufacturer
     */
    public function getManufacturer()
    {
        return $this->manufacturer;
    }

    /**
     * Add store
     *
     * @param \OcStore $store
     *
     * @return OcProduct
     */
    public function addStore(\OcStore $store)
    {
        $this->store[] = $store;

        return $this;
    }

    /**
     * Remove store
     *
     * @param \OcStore $store
     */
    public function removeStore(\OcStore $store)
    {
        $this->store->removeElement($store);
    }

    /**
     * Get store
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getStore()
    {
        return $this->store;
    }

    /**
     * Add filter
     *
     * @param \OcFilter $filter
     *
     * @return OcProduct
     */
    public function addFilter(\OcFilter $filter)
    {
        $this->filter[] = $filter;

        return $this;
    }

    /**
     * Remove filter
     *
     * @param \OcFilter $filter
     */
    public function removeFilter(\OcFilter $filter)
    {
        $this->filter->removeElement($filter);
    }

    /**
     * Get filter
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFilter()
    {
        return $this->filter;
    }

    /**
     * Add category
     *
     * @param \OcCategory $category
     *
     * @return OcProduct
     */
    public function addCategory(\OcCategory $category)
    {
        $this->category[] = $category;

        return $this;
    }

    /**
     * Remove category
     *
     * @param \OcCategory $category
     */
    public function removeCategory(\OcCategory $category)
    {
        $this->category->removeElement($category);
    }

    /**
     * Get category
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategory()
    {
        return $this->category;
    }
	
	/**
     * Add attribute
     *
     * @param \OcProductAttribute $attribute
     *
     * @return OcProduct
     */
    public function addAttribute(\OcProductAttribute $attribute)
    {
        $this->attribute[] = $attribute;

        return $this;
    }

    /**
     * Remove attribute
     *
     * @param \OcProductAttribute $attribute
     */
    public function removeAttribute(\OcProductAttribute $attribute)
    {
        $this->attribute->removeElement($attribute);
    }

    /**
     * Get attribute
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAttribute()
    {
        return $this->attribute;
    }
	
	/**
     * Add option
     *
     * @param \OcProductOption $option
     *
     * @return OcProduct
     */
    public function addOption(\OcProductOption $option)
    {
        $this->option[] = $option;

        return $this;
    }

    /**
     * Remove option
     *
     * @param \OcProductOption $option
     */
    public function removeOption(\OcProductOption $option)
    {
        $this->option->removeElement($option);
    }

    /**
     * Get option
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOption()
    {
        return $this->option;
    }
	
	/**
     * Add image
     *
     * @param \OcProductImage $image
     *
     * @return OcProduct
     */
    public function addImages(\OcProductImage $image)
    {
        $this->images[] = $image;

        return $this;
    }

    /**
     * Remove image
     *
     * @param \OcProductImage $image
     */
    public function removeImages(\OcProductImage $image)
    {
        $this->images->removeElement($image);
    }

    /**
     * Get image
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getImages()
    {
        return $this->images;
    }
	
	 /**
     * Add download
     *
     * @param \OcDownload $download
     *
     * @return OcProduct
     */
    public function addDownload(\OcDownload $download)
    {
        $this->download[] = $download;

        return $this;
    }

    /**
     * Remove download
     *
     * @param \OcDownload $download
     */
    public function removeDownload(\OcDownload $download)
    {
        $this->download->removeElement($download);
    }

    /**
     * Get download
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDownload()
    {
        return $this->download;
    }
	
	/**
     * Add discount
     *
     * @param \OcProductDiscount $discount
     *
     * @return OcProduct
     */
    public function addDiscount(\OcProductDiscount $discount)
    {
        $this->discount[] = $discount;

        return $this;
    }

    /**
     * Remove discount
     *
     * @param \OcProductDiscount $discount
     */
    public function removeDiscount(\OcProductDiscount $discount)
    {
        $this->discount->removeElement($discount);
    }

    /**
     * Get discount
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDiscount()
    {
        return $this->discount;
    }
	
	/**
     * Add special
     *
     * @param \OcProductSpecial $special
     *
     * @return OcProduct
     */
    public function addSpecial(\OcProductSpecial $special)
    {
        $this->special[] = $special;

        return $this;
    }

    /**
     * Remove special
     *
     * @param \OcProductSpecial $special
     */
    public function removeSpecial(\OcProductSpecial $special)
    {
        $this->special->removeElement($special);
    }

    /**
     * Get special
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSpecial()
    {
        return $this->special;
    }
	
	/**
     * Add reward
     *
     * @param \OcProductReward $reward
     *
     * @return OcProduct
     */
    public function addReward(\OcProductReward $reward)
    {
        $this->reward[] = $reward;

        return $this;
    }

    /**
     * Remove reward
     *
     * @param \OcProductReward $reward
     */
    public function removeReward(\OcProductReward $reward)
    {
        $this->reward->removeElement($reward);
    }

    /**
     * Get reward
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getReward()
    {
        return $this->reward;
    }

}
