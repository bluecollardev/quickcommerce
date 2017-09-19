<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * OcReturnStatus
 *
 * @ORM\Table(name="oc_return_status")
 * @ORM\Entity
 */
class OcReturnStatus
{
    /**
     * @var integer
     *
     * @ORM\Column(name="return_status_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $returnStatusId;

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
     * @ORM\Column(name="name", type="string", length=32, nullable=false)
     */
    private $name;


}

