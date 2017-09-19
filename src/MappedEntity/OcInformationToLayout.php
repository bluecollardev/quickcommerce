<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * OcInformationToLayout
 *
 * @ORM\Table(name="oc_information_to_layout")
 * @ORM\Entity
 */
class OcInformationToLayout
{
    /**
     * @var integer
     *
     * @ORM\Column(name="information_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $informationId;

    /**
     * @var integer
     *
     * @ORM\Column(name="store_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $storeId;

    /**
     * @var integer
     *
     * @ORM\Column(name="layout_id", type="integer", nullable=false)
     */
    private $layoutId;


}

