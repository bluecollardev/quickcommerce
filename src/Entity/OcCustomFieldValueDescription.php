<?php


/**
 * OcCustomFieldValueDescription
 *
 * @ORM\Table(name="oc2_custom_field_value_description",
 * indexes={@ORM\Index(name="IDX_4C68CE735FD09B5",
 * columns={"custom_field_value_id"}), @ORM\Index(name="IDX_4C68CE7382F1BAF4",
 * columns={"language_id"}), @ORM\Index(name="IDX_4C68CE73A1E5E0D4",
 * columns={"custom_field_id"})})
 * @ORM\Entity
 */
class OcCustomFieldValueDescription
{

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=128, nullable=false)
     */
    private $name = null;

    /**
     * @var \OcCustomFieldValue
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="OcCustomFieldValue")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="custom_field_value_id",
     * referencedColumnName="custom_field_value_id")
     * })
     */
    private $customFieldValue = null;

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
     * @var \OcCustomField
     *
     * @ORM\ManyToOne(targetEntity="OcCustomField")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="custom_field_id",
     * referencedColumnName="custom_field_id")
     * })
     */
    private $customField = null;

    /**
     * Set name
     *
     * @param string $name
     *
     * @return OcCustomFieldValueDescription
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
     * Set customFieldValue
     *
     * @param \OcCustomFieldValue $customFieldValue
     *
     * @return OcCustomFieldValueDescription
     */
    public function setCustomFieldValue(\OcCustomFieldValue $customFieldValue)
    {
        $this->customFieldValue = $customFieldValue;

        return $this;
    }

    /**
     * Get customFieldValue
     *
     * @return \OcCustomFieldValue
     */
    public function getCustomFieldValue()
    {
        return $this->customFieldValue;
    }

    /**
     * Set language
     *
     * @param \OcLanguage $language
     *
     * @return OcCustomFieldValueDescription
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
     * Set customField
     *
     * @param \OcCustomField $customField
     *
     * @return OcCustomFieldValueDescription
     */
    public function setCustomField(\OcCustomField $customField = null)
    {
        $this->customField = $customField;

        return $this;
    }

    /**
     * Get customField
     *
     * @return \OcCustomField
     */
    public function getCustomField()
    {
        return $this->customField;
    }


}
