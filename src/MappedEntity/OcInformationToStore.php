<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * OcInformationToStore
 *
 * @ORM\Table(name="oc_information_to_store")
 * @ORM\Entity
 */
class OcInformationToStore
{
    /**
     * @var integer
     *
     * @ORM\Column(name="information_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $informationId;

    /**
     * @var integer
     *
     * @ORM\Column(name="store_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $storeId;


}

