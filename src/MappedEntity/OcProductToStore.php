<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * OcProductToStore
 *
 * @ORM\Table(name="oc_product_to_store")
 * @ORM\Entity
 */
class OcProductToStore
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
     * @ORM\Column(name="store_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $storeId = '0';


}

