<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * OcReturnAction
 *
 * @ORM\Table(name="oc_return_action")
 * @ORM\Entity
 */
class OcReturnAction
{
    /**
     * @var integer
     *
     * @ORM\Column(name="return_action_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $returnActionId;

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
     * @ORM\Column(name="name", type="string", length=64, nullable=false)
     */
    private $name;


}

