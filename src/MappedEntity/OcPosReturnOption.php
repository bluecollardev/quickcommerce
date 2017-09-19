<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * OcPosReturnOption
 *
 * @ORM\Table(name="oc_pos_return_option")
 * @ORM\Entity
 */
class OcPosReturnOption
{
    /**
     * @var integer
     *
     * @ORM\Column(name="return_option_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $returnOptionId;

    /**
     * @var integer
     *
     * @ORM\Column(name="return_id", type="integer", nullable=false)
     */
    private $returnId;

    /**
     * @var integer
     *
     * @ORM\Column(name="product_option_id", type="integer", nullable=false)
     */
    private $productOptionId;

    /**
     * @var integer
     *
     * @ORM\Column(name="product_option_value_id", type="integer", nullable=false)
     */
    private $productOptionValueId;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="text", length=65535, nullable=false)
     */
    private $value;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=32, nullable=false)
     */
    private $type;


}

