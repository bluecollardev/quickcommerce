<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * OcOption
 *
 * @ORM\Table(name="oc_option")
 * @ORM\Entity
 */
class OcOption
{
    /**
     * @var integer
     *
     * @ORM\Column(name="option_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $optionId;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=32, nullable=false)
     */
    private $type;

    /**
     * @var integer
     *
     * @ORM\Column(name="sort_order", type="integer", nullable=false)
     */
    private $sortOrder;


}

