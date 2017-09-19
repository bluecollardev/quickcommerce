<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * OcExtension
 *
 * @ORM\Table(name="oc_extension")
 * @ORM\Entity
 */
class OcExtension
{
    /**
     * @var integer
     *
     * @ORM\Column(name="extension_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $extensionId;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=32, nullable=false)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=32, nullable=false)
     */
    private $code;


}

