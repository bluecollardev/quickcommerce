<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * OcReturnReason
 *
 * @ORM\Table(name="oc_return_reason")
 * @ORM\Entity
 */
class OcReturnReason
{
    /**
     * @var integer
     *
     * @ORM\Column(name="return_reason_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $returnReasonId;

    /**
     * @var integer
     *
     * @ORM\Column(name="language_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $languageId = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=128, nullable=false)
     */
    private $name;


}

