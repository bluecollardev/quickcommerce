<?php


/**
 * OcReturnReason
 *
 * @ORM\Table(name="oc2_return_reason",
 * indexes={@ORM\Index(name="IDX_9DDA54882F1BAF4", columns={"language_id"})})
 * @ORM\Entity
 */
class OcReturnReason
{

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=128, nullable=false)
     */
    private $name = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="return_reason_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $returnReasonId = null;

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
     * @return OcReturnReason
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
     * Set returnReasonId
     *
     * @param integer $returnReasonId
     *
     * @return OcReturnReason
     */
    public function setReturnReasonId($returnReasonId)
    {
        $this->returnReasonId = $returnReasonId;

        return $this;
    }

    /**
     * Get returnReasonId
     *
     * @return integer
     */
    public function getReturnReasonId()
    {
        return $this->returnReasonId;
    }

    /**
     * Set language
     *
     * @param \OcLanguage $language
     *
     * @return OcReturnReason
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
