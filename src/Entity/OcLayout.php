<?php


/**
 * OcLayout
 *
 * @ORM\Table(name="oc2_layout")
 * @ORM\Entity
 */
class OcLayout
{

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=64, nullable=false)
     */
    private $name = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="layout_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $layoutId = null;

    /**
     * Set name
     *
     * @param string $name
     *
     * @return OcLayout
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get layoutId
     *
     * @return integer
     */
    public function getLayoutId()
    {
        return $this->layoutId;
    }


}
