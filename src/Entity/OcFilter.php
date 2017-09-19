<?php


/**
 * OcFilter
 *
 * @ORM\Table(name="oc2_filter", indexes={@ORM\Index(name="IDX_202C9A63C33BDCE7",
 * columns={"filter_group_id"})})
 * @ORM\Entity
 */
class OcFilter
{

    /**
     * @var integer
     *
     * @ORM\Column(name="sort_order", type="integer", nullable=false)
     */
    private $sortOrder = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="filter_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $filterId = null;

    /**
     * @var \OcFilterGroup
     *
     * @ORM\ManyToOne(targetEntity="OcFilterGroup")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="filter_group_id",
     * referencedColumnName="filter_group_id")
     * })
     */
    private $filterGroup = null;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="OcProduct", mappedBy="filter")
     */
    private $product = null;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="OcCategory", mappedBy="filter")
     */
    private $category = null;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->product = new \Doctrine\Common\Collections\ArrayCollection();
        $this->category = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set sortOrder
     *
     * @param integer $sortOrder
     *
     * @return OcFilter
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
     * Get filterId
     *
     * @return integer
     */
    public function getFilterId()
    {
        return $this->filterId;
    }

    /**
     * Set filterGroup
     *
     * @param \OcFilterGroup $filterGroup
     *
     * @return OcFilter
     */
    public function setFilterGroup(\OcFilterGroup $filterGroup = null)
    {
        $this->filterGroup = $filterGroup;

        return $this;
    }

    /**
     * Get filterGroup
     *
     * @return \OcFilterGroup
     */
    public function getFilterGroup()
    {
        return $this->filterGroup;
    }

    /**
     * Add product
     *
     * @param \OcProduct $product
     *
     * @return OcFilter
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
     * Add category
     *
     * @param \OcCategory $category
     *
     * @return OcFilter
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


}
