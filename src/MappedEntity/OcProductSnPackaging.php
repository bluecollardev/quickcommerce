<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * OcProductSnPackaging
 *
 * @ORM\Table(name="oc_product_sn_packaging")
 * @ORM\Entity
 */
class OcProductSnPackaging
{
    /**
     * @var integer
     *
     * @ORM\Column(name="sn_packaging_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $snPackagingId;

    /**
     * @var integer
     *
     * @ORM\Column(name="packaging_id", type="integer", nullable=false)
     */
    private $packagingId;

    /**
     * @var integer
     *
     * @ORM\Column(name="product_sn_id", type="integer", nullable=false)
     */
    private $productSnId;


}

