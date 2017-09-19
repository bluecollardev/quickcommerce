<?php


/**
 * OcWeightClass
 *
 * @ORM\Table(name="oc2_weight_class")
 * @ORM\Entity
 */
class OcWeightClass
{

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="decimal", precision=15, scale=8, nullable=false)
     */
    private $value = '0.00000000';

    /**
     * @var integer
     *
     * @ORM\Column(name="weight_class_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $weightClassId = null;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="OcLanguage", inversedBy="weightClass")
     * @ORM\JoinTable(name="oc2_weight_class_description",
     *   joinColumns={
     *     @ORM\JoinColumn(name="weight_class_id",
     * referencedColumnName="weight_class_id")
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
     * @return OcWeightClass
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
     * Get weightClassId
     *
     * @return integer
     */
    public function getWeightClassId()
    {
        return $this->weightClassId;
    }

    /**
     * Add language
     *
     * @param \OcLanguage $language
     *
     * @return OcWeightClass
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
