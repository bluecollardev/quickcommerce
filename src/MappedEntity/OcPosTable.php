<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * OcPosTable
 *
 * @ORM\Table(name="oc_pos_table")
 * @ORM\Entity
 */
class OcPosTable
{
    /**
     * @var integer
     *
     * @ORM\Column(name="table_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $tableId;

    /**
     * @var integer
     *
     * @ORM\Column(name="location_id", type="integer", nullable=false)
     */
    private $locationId;

    /**
     * @var string
     *
     * @ORM\Column(name="coors", type="string", length=32, nullable=true)
     */
    private $coors;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=32, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=100, nullable=true)
     */
    private $description;


}

