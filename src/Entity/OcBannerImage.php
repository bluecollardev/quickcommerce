<?php


/**
 * OcBannerImage
 *
 * @ORM\Table(name="oc2_banner_image",
 * indexes={@ORM\Index(name="IDX_CA43E08684EC833", columns={"banner_id"})})
 * @ORM\Entity
 */
class OcBannerImage
{

    /**
     * @var string
     *
     * @ORM\Column(name="link", type="string", length=255, nullable=false)
     */
    private $link = null;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=false)
     */
    private $image = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="sort_order", type="integer", nullable=false)
     */
    private $sortOrder = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="banner_image_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $bannerImageId = null;

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
     * Set link
     *
     * @param string $link
     *
     * @return OcBannerImage
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link
     *
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return OcBannerImage
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
     * Set sortOrder
     *
     * @param integer $sortOrder
     *
     * @return OcBannerImage
     */
    public function setSortOrder($sortOrder)
    {
        $this->sortOrder = $sortOrder;

        return $this;
    }

    /**
     * Get sortOrder
     *
     * @return integer
     */
    public function getSortOrder()
    {
        return $this->sortOrder;
    }

    /**
     * Get bannerImageId
     *
     * @return integer
     */
    public function getBannerImageId()
    {
        return $this->bannerImageId;
    }

    /**
     * Set banner
     *
     * @param \OcBanner $banner
     *
     * @return OcBannerImage
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
