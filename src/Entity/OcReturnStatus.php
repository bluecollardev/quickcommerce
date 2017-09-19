<?php


/**
 * OcReturnStatus
 *
 * @ORM\Table(name="oc2_return_status",
 * indexes={@ORM\Index(name="IDX_4965485882F1BAF4", columns={"language_id"})})
 * @ORM\Entity
 */
class OcReturnStatus
{

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=32, nullable=false)
     */
    private $name = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="return_status_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $returnStatusId = null;

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
     * Set name
     *
     * @param string $name
     *
     * @return OcReturnStatus
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
     * Set returnStatusId
     *
     * @param integer $returnStatusId
     *
     * @return OcReturnStatus
     */
    public function setReturnStatusId($returnStatusId)
    {
        $this->returnStatusId = $returnStatusId;

        return $this;
    }

    /**
     * Get returnStatusId
     *
     * @return integer
     */
    public function getReturnStatusId()
    {
        return $this->returnStatusId;
    }

    /**
     * Set language
     *
     * @param \OcLanguage $language
     *
     * @return OcReturnStatus
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


}
