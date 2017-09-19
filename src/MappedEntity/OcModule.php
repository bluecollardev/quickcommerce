<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * OcModule
 *
 * @ORM\Table(name="oc_module")
 * @ORM\Entity
 */
class OcModule
{
    /**
     * @var integer
     *
     * @ORM\Column(name="module_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $moduleId;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=64, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=32, nullable=false)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="setting", type="text", length=65535, nullable=false)
     */
    private $setting;


}

