<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * OcEvent
 *
 * @ORM\Table(name="oc_event")
 * @ORM\Entity
 */
class OcEvent
{
    /**
     * @var integer
     *
     * @ORM\Column(name="event_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $eventId;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=32, nullable=false)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="trigger", type="text", length=65535, nullable=false)
     */
    private $trigger;

    /**
     * @var string
     *
     * @ORM\Column(name="action", type="text", length=65535, nullable=false)
     */
    private $action;


}

