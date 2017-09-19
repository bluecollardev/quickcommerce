<?php


/**
 * OcUrlAlias
 *
 * @ORM\Table(name="oc2_url_alias", indexes={@ORM\Index(name="query",
 * columns={"query"}), @ORM\Index(name="keyword", columns={"keyword"})})
 * @ORM\Entity
 */
class OcUrlAlias
{

    /**
     * @var string
     *
     * @ORM\Column(name="query", type="string", length=255, nullable=false)
     */
    private $query = null;

    /**
     * @var string
     *
     * @ORM\Column(name="keyword", type="string", length=255, nullable=false)
     */
    private $keyword = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="url_alias_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $urlAliasId = null;

    /**
     * Set query
     *
     * @param string $query
     *
     * @return OcUrlAlias
     */
    public function setQuery($query)
    {
        $this->query = $query;

        return $this;
    }

    /**
     * Get query
     *
     * @return string
     */
    public function getQuery()
    {
        return $this->query;
    }

    /**
     * Set keyword
     *
     * @param string $keyword
     *
     * @return OcUrlAlias
     */
    public function setKeyword($keyword)
    {
        $this->keyword = $keyword;

        return $this;
    }

    /**
     * Get keyword
     *
     * @return string
     */
    public function getKeyword()
    {
        return $this->keyword;
    }

    /**
     * Get urlAliasId
     *
     * @return integer
     */
    public function getUrlAliasId()
    {
        return $this->urlAliasId;
    }


}
