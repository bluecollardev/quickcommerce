<?php


/**
 * OcLayoutModule
 *
 * @ORM\Table(name="oc2_layout_module",
 * indexes={@ORM\Index(name="IDX_1A486758C22AA1A", columns={"layout_id"})})
 * @ORM\Entity
 */
class OcLayoutModule
{

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=64, nullable=false)
     */
    private $code = null;

    /**
     * @var string
     *
     * @ORM\Column(name="position", type="string", length=14, nullable=false)
     */
    private $position = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="sort_order", type="integer", nullable=false)
     */
    private $sortOrder = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="layout_module_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $layoutModuleId = null;

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
     * Set code
     *
     * @param string $code
     *
     * @return OcLayoutModule
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set position
     *
     * @param string $position
     *
     * @return OcLayoutModule
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return string
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set sortOrder
     *
     * @param integer $sortOrder
     *
     * @return OcLayoutModule
     */
    public function setSortOrder($sortOrder)
    {
        $this->sortOrder = $sortOrder;

        return $this;
    }

    /**
     * Get sortOrder
     *
     * @return integer
     */
    public function getSortOrder()
    {
        return $this->sortOrder;
    }

    /**
     * Get layoutModuleId
     *
     * @return integer
     */
    public function getLayoutModuleId()
    {
        return $this->layoutModuleId;
    }

    /**
     * Set layout
     *
     * @param \OcLayout $layout
     *
     * @return OcLayoutModule
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
