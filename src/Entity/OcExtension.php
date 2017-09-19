<?php


/**
 * OcExtension
 *
 * @ORM\Table(name="oc2_extension")
 * @ORM\Entity
 */
class OcExtension
{

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=32, nullable=false)
     */
    private $type = null;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=32, nullable=false)
     */
    private $code = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="extension_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $extensionId = null;

    /**
     * Set type
     *
     * @param string $type
     *
     * @return OcExtension
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set code
     *
     * @param string $code
     *
     * @return OcExtension
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
     * Get extensionId
     *
     * @return integer
     */
    public function getExtensionId()
    {
        return $this->extensionId;
    }


}
