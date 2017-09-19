<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * OcUrlAlias
 *
 * @ORM\Table(name="oc_url_alias", indexes={@ORM\Index(name="query", columns={"query"}), @ORM\Index(name="keyword", columns={"keyword"})})
 * @ORM\Entity
 */
class OcUrlAlias
{
    /**
     * @var integer
     *
     * @ORM\Column(name="url_alias_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $urlAliasId;

    /**
     * @var string
     *
     * @ORM\Column(name="query", type="string", length=255, nullable=false)
     */
    private $query;

    /**
     * @var string
     *
     * @ORM\Column(name="keyword", type="string", length=255, nullable=false)
     */
    private $keyword;


}

