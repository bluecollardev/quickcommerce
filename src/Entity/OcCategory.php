<?php


/**
 * OcCategory
 *
 * @ORM\Table(name="oc2_category", indexes={@ORM\Index(name="parent_id",
 * columns={"parent_id"})})
 * @ORM\Entity
 */
class OcCategory
{

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=true)
     */
    private $image = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="parent_id", type="integer", nullable=false)
     */
    private $parentId = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="top", type="boolean", nullable=false)
     */
    private $top = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="column", type="integer", nullable=false)
     */
    private $column = null;

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
    private $status = null;

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
     * @ORM\Column(name="category_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $categoryId = null;
	
	/**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="OcProductDescription", mappedBy="product")
     */
    private $description = null;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="OcProduct", mappedBy="category")
     */
    private $product = null;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="OcCoupon", mappedBy="category")
     */
    private $coupon = null;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="OcStore", inversedBy="category")
     * @ORM\JoinTable(name="oc2_category_to_store",
     *   joinColumns={
     *     @ORM\JoinColumn(name="category_id", referencedColumnName="category_id")
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
     * @ORM\ManyToMany(targetEntity="OcFilter", inversedBy="category")
     * @ORM\JoinTable(name="oc2_category_filter",
     *   joinColumns={
     *     @ORM\JoinColumn(name="category_id", referencedColumnName="category_id")
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
     * @ORM\ManyToMany(targetEntity="OcLanguage", inversedBy="category")
     * @ORM\JoinTable(name="oc2_category_description",
     *   joinColumns={
     *     @ORM\JoinColumn(name="category_id", referencedColumnName="category_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="language_id", referencedColumnName="language_id")
     *   }
     * )
     */
    private $language = null;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->description = new \Doctrine\Common\Collections\ArrayCollection();
		$this->product = new \Doctrine\Common\Collections\ArrayCollection();
        $this->coupon = new \Doctrine\Common\Collections\ArrayCollection();
        $this->store = new \Doctrine\Common\Collections\ArrayCollection();
        $this->filter = new \Doctrine\Common\Collections\ArrayCollection();
        $this->language = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return OcCategory
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
     * Set parentId
     *
     * @param integer $parentId
     *
     * @return OcCategory
     */
    public function setParentId($parentId)
    {
        $this->parentId = $parentId;

        return $this;
    }

    /**
     * Get parentId
     *
     * @return integer
     */
    public function getParentId()
    {
        return $this->parentId;
    }

    /**
     * Set top
     *
     * @param boolean $top
     *
     * @return OcCategory
     */
    public function setTop($top)
    {
        $this->top = $top;

        return $this;
    }

    /**
     * Get top
     *
     * @return boolean
     */
    public function getTop()
    {
        return $this->top;
    }

    /**
     * Set column
     *
     * @param integer $column
     *
     * @return OcCategory
     */
    public function setColumn($column)
    {
        $this->column = $column;

        return $this;
    }

    /**
     * Get column
     *
     * @return integer
     */
    public function getColumn()
    {
        return $this->column;
    }

    /**
     * Set sortOrder
     *
     * @param integer $sortOrder
     *
     * @return OcCategory
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
     * @return OcCategory
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
     * Set dateAdded
     *
     * @param \DateTime $dateAdded
     *
     * @return OcCategory
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
     * @return OcCategory
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
     * Get categoryId
     *
     * @return integer
     */
    public function getCategoryId()
    {
        return $this->categoryId;
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
     * Add product
     *
     * @param \OcProduct $product
     *
     * @return OcCategory
     */
    public function addProduct(\OcProduct $product)
    {
        $this->product[] = $product;

        return $this;
    }

    /**
     * Remove product
     *
     * @param \OcProduct $product
     */
    public function removeProduct(\OcProduct $product)
    {
        $this->product->removeElement($product);
    }

    /**
     * Get product
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Add coupon
     *
     * @param \OcCoupon $coupon
     *
     * @return OcCategory
     */
    public function addCoupon(\OcCoupon $coupon)
    {
        $this->coupon[] = $coupon;

        return $this;
    }

    /**
     * Remove coupon
     *
     * @param \OcCoupon $coupon
     */
    public function removeCoupon(\OcCoupon $coupon)
    {
        $this->coupon->removeElement($coupon);
    }

    /**
     * Get coupon
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCoupon()
    {
        return $this->coupon;
    }

    /**
     * Add store
     *
     * @param \OcStore $store
     *
     * @return OcCategory
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
     * @return OcCategory
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
     * Add language
     *
     * @param \OcLanguage $language
     *
     * @return OcCategory
     */
    public function addLanguage(\OcLanguage $language)
    {
        $this->language[] = $language;

        return $this;
    }

    /**
     * Remove language
     *
     * @param \OcLanguage $language
     */
    public function removeLanguage(\OcLanguage $language)
    {
        $this->language->removeElement($language);
    }

    /**
     * Get language
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLanguage()
    {
        return $this->language;
    }


}
