<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * OcBannerImageDescription
 *
 * @ORM\Table(name="oc_banner_image_description")
 * @ORM\Entity
 */
class OcBannerImageDescription
{
    /**
     * @var integer
     *
     * @ORM\Column(name="banner_image_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $bannerImageId;

    /**
     * @var integer
     *
     * @ORM\Column(name="language_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $languageId;

    /**
     * @var integer
     *
     * @ORM\Column(name="banner_id", type="integer", nullable=false)
     */
    private $bannerId;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=64, nullable=false)
     */
    private $title;


}

