<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * OcPosLocation
 *
 * @ORM\Table(name="oc_pos_location")
 * @ORM\Entity
 */
class OcPosLocation
{
    /**
     * @var integer
     *
     * @ORM\Column(name="location_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $locationId;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=1, nullable=false)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=32, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=1000, nullable=true)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="order", type="integer", nullable=true)
     */
    private $order = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=96, nullable=true)
     */
    private $email;


}

