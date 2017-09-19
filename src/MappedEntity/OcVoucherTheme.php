<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * OcVoucherTheme
 *
 * @ORM\Table(name="oc_voucher_theme")
 * @ORM\Entity
 */
class OcVoucherTheme
{
    /**
     * @var integer
     *
     * @ORM\Column(name="voucher_theme_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $voucherThemeId;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=false)
     */
    private $image;


}

