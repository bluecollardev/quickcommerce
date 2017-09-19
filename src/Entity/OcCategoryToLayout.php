<?php


/**
 * OcCategoryToLayout
 *
 * @ORM\Table(name="oc2_category_to_layout",
 * indexes={@ORM\Index(name="IDX_4FD3A4B512469DE2", columns={"category_id"}),
 * @ORM\Index(name="IDX_4FD3A4B5B092A811", columns={"store_id"}),
 * @ORM\Index(name="IDX_4FD3A4B58C22AA1A", columns={"layout_id"})})
 * @ORM\Entity
 */
class OcCategoryToLayout
{

    /**
     * @var \OcCategory
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="OcCategory")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="category_id", referencedColumnName="category_id")
     * })
     */
    private $category = null;

    /**
     * @var \OcStore
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="OcStore")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="store_id", referencedColumnName="store_id")
     * })
     */
    private $store = null;

    /**
     * @var \OcLayout
     *
     * @ORM\ManyToOne(targetEntity="OcLayout")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="layout_id", referencedColumnName="layout_id")
     * })
     */
    private $layout = null;

    /**
     * Set category
     *
     * @param \OcCategory $category
     *
     * @return OcCategoryToLayout
     */
    public function setCategory(\OcCategory $category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \OcCategory
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set store
     *
     * @param \OcStore $store
     *
     * @return OcCategoryToLayout
     */
    public function setStore(\OcStore $store)
    {
        $this->store = $store;

        return $this;
    }

    /**
     * Get store
     *
     * @return \OcStore
     */
    public function getStore()
    {
        return $this->store;
    }

    /**
     * Set layout
     *
     * @param \OcLayout $layout
     *
     * @return OcCategoryToLayout
     */
    public function setLayout(\OcLayout $layout = null)
    {
        $this->layout = $layout;

        return $this;
    }

    /**
     * Get layout
     *
     * @return \OcLayout
     */
    public function getLayout()
    {
        return $this->layout;
    }


}
