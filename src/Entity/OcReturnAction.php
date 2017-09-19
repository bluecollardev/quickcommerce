<?php


/**
 * OcReturnAction
 *
 * @ORM\Table(name="oc2_return_action",
 * indexes={@ORM\Index(name="IDX_75A9A1D682F1BAF4", columns={"language_id"})})
 * @ORM\Entity
 */
class OcReturnAction
{

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=64, nullable=false)
     */
    private $name = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="return_action_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $returnActionId = null;

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
     * @return OcReturnAction
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
     * Set returnActionId
     *
     * @param integer $returnActionId
     *
     * @return OcReturnAction
     */
    public function setReturnActionId($returnActionId)
    {
        $this->returnActionId = $returnActionId;

        return $this;
    }

    /**
     * Get returnActionId
     *
     * @return integer
     */
    public function getReturnActionId()
    {
        return $this->returnActionId;
    }

    /**
     * Set language
     *
     * @param \OcLanguage $language
     *
     * @return OcReturnAction
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
