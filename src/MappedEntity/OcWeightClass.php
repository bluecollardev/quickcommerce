<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * OcWeightClass
 *
 * @ORM\Table(name="oc_weight_class")
 * @ORM\Entity
 */
class OcWeightClass
{
    /**
     * @var integer
     *
     * @ORM\Column(name="weight_class_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $weightClassId;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="decimal", precision=15, scale=8, nullable=false)
     */
    private $value = '0.00000000';


}

