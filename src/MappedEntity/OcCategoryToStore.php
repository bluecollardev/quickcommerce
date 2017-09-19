<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * OcCategoryToStore
 *
 * @ORM\Table(name="oc_category_to_store")
 * @ORM\Entity
 */
class OcCategoryToStore
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
     * @ORM\Column(name="store_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $storeId;


}

