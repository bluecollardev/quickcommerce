<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * OcStockStatus
 *
 * @ORM\Table(name="oc_stock_status")
 * @ORM\Entity
 */
class OcStockStatus
{
    /**
     * @var integer
     *
     * @ORM\Column(name="stock_status_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $stockStatusId;

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

