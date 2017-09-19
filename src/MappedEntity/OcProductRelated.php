<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * OcProductRelated
 *
 * @ORM\Table(name="oc_product_related")
 * @ORM\Entity
 */
class OcProductRelated
{
    /**
     * @var integer
     *
     * @ORM\Column(name="product_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $productId;

    /**
     * @var integer
     *
     * @ORM\Column(name="related_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $relatedId;


}

