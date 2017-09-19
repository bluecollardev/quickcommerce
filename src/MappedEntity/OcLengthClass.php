<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * OcLengthClass
 *
 * @ORM\Table(name="oc_length_class")
 * @ORM\Entity
 */
class OcLengthClass
{
    /**
     * @var integer
     *
     * @ORM\Column(name="length_class_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $lengthClassId;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="decimal", precision=15, scale=8, nullable=false)
     */
    private $value;


}

