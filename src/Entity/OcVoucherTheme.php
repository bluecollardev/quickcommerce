<?php


/**
 * OcVoucherTheme
 *
 * @ORM\Table(name="oc2_voucher_theme")
 * @ORM\Entity
 */
class OcVoucherTheme
{

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=false)
     */
    private $image = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="voucher_theme_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $voucherThemeId = null;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="OcLanguage", inversedBy="voucherTheme")
     * @ORM\JoinTable(name="oc2_voucher_theme_description",
     *   joinColumns={
     *     @ORM\JoinColumn(name="voucher_theme_id",
     * referencedColumnName="voucher_theme_id")
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
     * Set image
     *
     * @param string $image
     *
     * @return OcVoucherTheme
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Get voucherThemeId
     *
     * @return integer
     */
    public function getVoucherThemeId()
    {
        return $this->voucherThemeId;
    }

    /**
     * Add language
     *
     * @param \OcLanguage $language
     *
     * @return OcVoucherTheme
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
