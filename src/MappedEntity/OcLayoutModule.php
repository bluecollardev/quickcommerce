<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * OcLayoutModule
 *
 * @ORM\Table(name="oc_layout_module")
 * @ORM\Entity
 */
class OcLayoutModule
{
    /**
     * @var integer
     *
     * @ORM\Column(name="layout_module_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $layoutModuleId;

    /**
     * @var integer
     *
     * @ORM\Column(name="layout_id", type="integer", nullable=false)
     */
    private $layoutId;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=64, nullable=false)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="position", type="string", length=14, nullable=false)
     */
    private $position;

    /**
     * @var integer
     *
     * @ORM\Column(name="sort_order", type="integer", nullable=false)
     */
    private $sortOrder;


}

