<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * OcQuoteStatus
 *
 * @ORM\Table(name="oc_quote_status")
 * @ORM\Entity
 */
class OcQuoteStatus
{
    /**
     * @var integer
     *
     * @ORM\Column(name="quote_status_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $quoteStatusId;

    /**
     * @var integer
     *
     * @ORM\Column(name="language_id", type="integer", nullable=false)
     */
    private $languageId;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=32, nullable=true)
     */
    private $name;


}

