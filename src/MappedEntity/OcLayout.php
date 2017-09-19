<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * OcLayout
 *
 * @ORM\Table(name="oc_layout")
 * @ORM\Entity
 */
class OcLayout
{
    /**
     * @var integer
     *
     * @ORM\Column(name="layout_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $layoutId;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=64, nullable=false)
     */
    private $name;


}

