<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * OcLocationStockTransferStatus
 *
 * @ORM\Table(name="oc_location_stock_transfer_status")
 * @ORM\Entity
 */
class OcLocationStockTransferStatus
{
    /**
     * @var integer
     *
     * @ORM\Column(name="status_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $statusId;

    /**
     * @var integer
     *
     * @ORM\Column(name="language_id", type="integer", nullable=false)
     */
    private $languageId;

    /**
     * @var string
     *
     * @ORM\Column(name="status_name", type="string", length=25, nullable=true)
     */
    private $statusName;


}

