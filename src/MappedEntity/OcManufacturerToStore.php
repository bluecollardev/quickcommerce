<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * OcManufacturerToStore
 *
 * @ORM\Table(name="oc_manufacturer_to_store")
 * @ORM\Entity
 */
class OcManufacturerToStore
{
    /**
     * @var integer
     *
     * @ORM\Column(name="manufacturer_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $manufacturerId;

    /**
     * @var integer
     *
     * @ORM\Column(name="store_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $storeId;


}

