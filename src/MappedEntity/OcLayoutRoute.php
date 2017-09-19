<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * OcLayoutRoute
 *
 * @ORM\Table(name="oc_layout_route")
 * @ORM\Entity
 */
class OcLayoutRoute
{
    /**
     * @var integer
     *
     * @ORM\Column(name="layout_route_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $layoutRouteId;

    /**
     * @var integer
     *
     * @ORM\Column(name="layout_id", type="integer", nullable=false)
     */
    private $layoutId;

    /**
     * @var integer
     *
     * @ORM\Column(name="store_id", type="integer", nullable=false)
     */
    private $storeId;

    /**
     * @var string
     *
     * @ORM\Column(name="route", type="string", length=255, nullable=false)
     */
    private $route;


}

