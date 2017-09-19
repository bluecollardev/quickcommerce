<?php


/**
 * OcLayoutRoute
 *
 * @ORM\Table(name="oc2_layout_route",
 * indexes={@ORM\Index(name="IDX_EF0E43F38C22AA1A", columns={"layout_id"}),
 * @ORM\Index(name="IDX_EF0E43F3B092A811", columns={"store_id"})})
 * @ORM\Entity
 */
class OcLayoutRoute
{

    /**
     * @var string
     *
     * @ORM\Column(name="route", type="string", length=255, nullable=false)
     */
    private $route = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="layout_route_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $layoutRouteId = null;

    /**
     * @var \OcStore
     *
     * @ORM\ManyToOne(targetEntity="OcStore")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="store_id", referencedColumnName="store_id")
     * })
     */
    private $store = null;

    /**
     * @var \OcLayout
     *
     * @ORM\ManyToOne(targetEntity="OcLayout")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="layout_id", referencedColumnName="layout_id")
     * })
     */
    private $layout = null;

    /**
     * Set route
     *
     * @param string $route
     *
     * @return OcLayoutRoute
     */
    public function setRoute($route)
    {
        $this->route = $route;

        return $this;
    }

    /**
     * Get route
     *
     * @return string
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * Get layoutRouteId
     *
     * @return integer
     */
    public function getLayoutRouteId()
    {
        return $this->layoutRouteId;
    }

    /**
     * Set store
     *
     * @param \OcStore $store
     *
     * @return OcLayoutRoute
     */
    public function setStore(\OcStore $store = null)
    {
        $this->store = $store;

        return $this;
    }

    /**
     * Get store
     *
     * @return \OcStore
     */
    public function getStore()
    {
        return $this->store;
    }

    /**
     * Set layout
     *
     * @param \OcLayout $layout
     *
     * @return OcLayoutRoute
     */
    public function setLayout(\OcLayout $layout = null)
    {
        $this->layout = $layout;

        return $this;
    }

    /**
     * Get layout
     *
     * @return \OcLayout
     */
    public function getLayout()
    {
        return $this->layout;
    }


}
