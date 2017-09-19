<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * OcVoucherThemeDescription
 *
 * @ORM\Table(name="oc_voucher_theme_description")
 * @ORM\Entity
 */
class OcVoucherThemeDescription
{
    /**
     * @var integer
     *
     * @ORM\Column(name="voucher_theme_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $voucherThemeId;

    /**
     * @var integer
     *
     * @ORM\Column(name="language_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $languageId;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=32, nullable=false)
     */
    private $name;


}

