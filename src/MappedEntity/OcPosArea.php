<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * OcPosArea
 *
 * @ORM\Table(name="oc_pos_area")
 * @ORM\Entity
 */
class OcPosArea
{
    /**
     * @var integer
     *
     * @ORM\Column(name="area_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $areaId;

    /**
     * @var integer
     *
     * @ORM\Column(name="zone_id", type="integer", nullable=false)
     */
    private $zoneId;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=128, nullable=true)
     */
    private $name;


}

