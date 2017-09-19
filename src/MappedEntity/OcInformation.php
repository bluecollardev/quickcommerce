<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * OcInformation
 *
 * @ORM\Table(name="oc_information")
 * @ORM\Entity
 */
class OcInformation
{
    /**
     * @var integer
     *
     * @ORM\Column(name="information_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $informationId;

    /**
     * @var integer
     *
     * @ORM\Column(name="bottom", type="integer", nullable=false)
     */
    private $bottom = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="sort_order", type="integer", nullable=false)
     */
    private $sortOrder = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="status", type="boolean", nullable=false)
     */
    private $status = '1';


}

