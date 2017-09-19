<?php


/**
 * OcLengthClass
 *
 * @ORM\Table(name="oc2_length_class")
 * @ORM\Entity
 */
class OcLengthClass
{

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="decimal", precision=15, scale=8, nullable=false)
     */
    private $value = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="length_class_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $lengthClassId = null;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="OcLanguage", inversedBy="lengthClass")
     * @ORM\JoinTable(name="oc2_length_class_description",
     *   joinColumns={
     *     @ORM\JoinColumn(name="length_class_id",
     * referencedColumnName="length_class_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="language_id", referencedColumnName="language_id")
     *   }
     * )
     */
    private $language = null;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->language = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set value
     *
     * @param string $value
     *
     * @return OcLengthClass
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Get lengthClassId
     *
     * @return integer
     */
    public function getLengthClassId()
    {
        return $this->lengthClassId;
    }

    /**
     * Add language
     *
     * @param \OcLanguage $language
     *
     * @return OcLengthClass
     */
    public function addLanguage(\OcLanguage $language)
    {
        $this->language[] = $language;

        return $this;
    }

    /**
     * Remove language
     *
     * @param \OcLanguage $language
     */
    public function removeLanguage(\OcLanguage $language)
    {
        $this->language->removeElement($language);
    }

    /**
     * Get language
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLanguage()
    {
        return $this->language;
    }


}
