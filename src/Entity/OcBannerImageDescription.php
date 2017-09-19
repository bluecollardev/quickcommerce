<?php


/**
 * OcBannerImageDescription
 *
 * @ORM\Table(name="oc2_banner_image_description",
 * indexes={@ORM\Index(name="IDX_9CEBD833F9CEB4E", columns={"banner_image_id"}),
 * @ORM\Index(name="IDX_9CEBD8382F1BAF4", columns={"language_id"}),
 * @ORM\Index(name="IDX_9CEBD83684EC833", columns={"banner_id"})})
 * @ORM\Entity
 */
class OcBannerImageDescription
{

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=64, nullable=false)
     */
    private $title = null;

    /**
     * @var \OcBannerImage
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="OcBannerImage")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="banner_image_id",
     * referencedColumnName="banner_image_id")
     * })
     */
    private $bannerImage = null;

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
     * @var \OcBanner
     *
     * @ORM\ManyToOne(targetEntity="OcBanner")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="banner_id", referencedColumnName="banner_id")
     * })
     */
    private $banner = null;

    /**
     * Set title
     *
     * @param string $title
     *
     * @return OcBannerImageDescription
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set bannerImage
     *
     * @param \OcBannerImage $bannerImage
     *
     * @return OcBannerImageDescription
     */
    public function setBannerImage(\OcBannerImage $bannerImage)
    {
        $this->bannerImage = $bannerImage;

        return $this;
    }

    /**
     * Get bannerImage
     *
     * @return \OcBannerImage
     */
    public function getBannerImage()
    {
        return $this->bannerImage;
    }

    /**
     * Set language
     *
     * @param \OcLanguage $language
     *
     * @return OcBannerImageDescription
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
     * Set banner
     *
     * @param \OcBanner $banner
     *
     * @return OcBannerImageDescription
     */
    public function setBanner(\OcBanner $banner = null)
    {
        $this->banner = $banner;

        return $this;
    }

    /**
     * Get banner
     *
     * @return \OcBanner
     */
    public function getBanner()
    {
        return $this->banner;
    }


}
