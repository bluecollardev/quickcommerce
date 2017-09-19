<?php


/**
 * OcCategoryPath
 *
 * @ORM\Table(name="oc2_category_path",
 * indexes={@ORM\Index(name="IDX_F67746D312469DE2", columns={"category_id"})})
 * @ORM\Entity
 */
class OcCategoryPath
{

    /**
     * @var integer
     *
     * @ORM\Column(name="level", type="integer", nullable=false)
     */
    private $level = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="path_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $pathId = null;

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
     * Set level
     *
     * @param integer $level
     *
     * @return OcCategoryPath
     */
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Get level
     *
     * @return integer
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set pathId
     *
     * @param integer $pathId
     *
     * @return OcCategoryPath
     */
    public function setPathId($pathId)
    {
        $this->pathId = $pathId;

        return $this;
    }

    /**
     * Get pathId
     *
     * @return integer
     */
    public function getPathId()
    {
        return $this->pathId;
    }

    /**
     * Set category
     *
     * @param \OcCategory $category
     *
     * @return OcCategoryPath
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


}
