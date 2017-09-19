<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * OcProductCommission
 *
 * @ORM\Table(name="oc_product_commission")
 * @ORM\Entity
 */
class OcProductCommission
{
    /**
     * @var integer
     *
     * @ORM\Column(name="product_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $productId;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=1, nullable=false)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="decimal", precision=8, scale=2, nullable=true)
     */
    private $value = '0.00';

    /**
     * @var string
     *
     * @ORM\Column(name="base", type="decimal", precision=15, scale=2, nullable=true)
     */
    private $base = '0.00';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_modified", type="datetime", nullable=true)
     */
    private $dateModified;


}

