<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * OcCategoryFilter
 *
 * @ORM\Table(name="oc_category_filter")
 * @ORM\Entity
 */
class OcCategoryFilter
{
    /**
     * @var integer
     *
     * @ORM\Column(name="category_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $categoryId;

    /**
     * @var integer
     *
     * @ORM\Column(name="filter_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $filterId;


}

