<?php


/**
 * OcOptionValueDescription
 *
 * @ORM\Table(name="oc2_option_value_description",
 * indexes={@ORM\Index(name="IDX_575F4DBAD957CA06", columns={"option_value_id"}),
 * @ORM\Index(name="IDX_575F4DBA82F1BAF4", columns={"language_id"}),
 * @ORM\Index(name="IDX_575F4DBAA7C41D6F", columns={"option_id"})})
 * @ORM\Entity
 */
class OcOptionValueDescription
{

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=128, nullable=false)
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
     * @var \OcOptionValue
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="OcOptionValue")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="option_value_id",
     * referencedColumnName="option_value_id")
     * })
     */
    private $optionValue = null;

    /**
     * @var \OcOption
     *
     * @ORM\ManyToOne(targetEntity="OcOption")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="option_id", referencedColumnName="option_id")
     * })
     */
    private $option = null;

    /**
     * Set name
     *
     * @param string $name
     *
     * @return OcOptionValueDescription
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
     * @return OcOptionValueDescription
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
     * Set optionValue
     *
     * @param \OcOptionValue $optionValue
     *
     * @return OcOptionValueDescription
     */
    public function setOptionValue(\OcOptionValue $optionValue)
    {
        $this->optionValue = $optionValue;

        return $this;
    }

    /**
     * Get optionValue
     *
     * @return \OcOptionValue
     */
    public function getOptionValue()
    {
        return $this->optionValue;
    }

    /**
     * Set option
     *
     * @param \OcOption $option
     *
     * @return OcOptionValueDescription
     */
    public function setOption(\OcOption $option = null)
    {
        $this->option = $option;

        return $this;
    }

    /**
     * Get option
     *
     * @return \OcOption
     */
    public function getOption()
    {
        return $this->option;
    }


}
