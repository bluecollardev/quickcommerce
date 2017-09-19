<?php


/**
 * OcFilterDescription
 *
 * @ORM\Table(name="oc2_filter_description",
 * indexes={@ORM\Index(name="IDX_80BD840DD395B25E", columns={"filter_id"}),
 * @ORM\Index(name="IDX_80BD840D82F1BAF4", columns={"language_id"}),
 * @ORM\Index(name="IDX_80BD840DC33BDCE7", columns={"filter_group_id"})})
 * @ORM\Entity
 */
class OcFilterDescription
{

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=64, nullable=false)
     */
    private $name = null;

    /**
     * @var \OcLanguage
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="OcLanguage")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="language_id", referencedColumnName="language_id")
     * })
     */
    private $language = null;

    /**
     * @var \OcFilter
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="OcFilter")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="filter_id", referencedColumnName="filter_id")
     * })
     */
    private $filter = null;

    /**
     * @var \OcFilterGroup
     *
     * @ORM\ManyToOne(targetEntity="OcFilterGroup")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="filter_group_id",
     * referencedColumnName="filter_group_id")
     * })
     */
    private $filterGroup = null;

    /**
     * Set name
     *
     * @param string $name
     *
     * @return OcFilterDescription
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set language
     *
     * @param \OcLanguage $language
     *
     * @return OcFilterDescription
     */
    public function setLanguage(\OcLanguage $language)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language
     *
     * @return \OcLanguage
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set filter
     *
     * @param \OcFilter $filter
     *
     * @return OcFilterDescription
     */
    public function setFilter(\OcFilter $filter)
    {
        $this->filter = $filter;

        return $this;
    }

    /**
     * Get filter
     *
     * @return \OcFilter
     */
    public function getFilter()
    {
        return $this->filter;
    }

    /**
     * Set filterGroup
     *
     * @param \OcFilterGroup $filterGroup
     *
     * @return OcFilterDescription
     */
    public function setFilterGroup(\OcFilterGroup $filterGroup = null)
    {
        $this->filterGroup = $filterGroup;

        return $this;
    }

    /**
     * Get filterGroup
     *
     * @return \OcFilterGroup
     */
    public function getFilterGroup()
    {
        return $this->filterGroup;
    }


}
