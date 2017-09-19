<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * OcOptionValue
 *
 * @ORM\Table(name="oc_option_value")
 * @ORM\Entity
 */
class OcOptionValue
{
    /**
     * @var integer
     *
     * @ORM\Column(name="option_value_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $optionValueId;

    /**
     * @var integer
     *
     * @ORM\Column(name="option_id", type="integer", nullable=false)
     */
    private $optionId;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=false)
     */
    private $image;

    /**
     * @var integer
     *
     * @ORM\Column(name="sort_order", type="integer", nullable=false)
     */
    private $sortOrder;


}

