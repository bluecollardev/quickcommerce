<?php


/**
 * OcSetting
 *
 * @ORM\Table(name="oc2_setting", indexes={@ORM\Index(name="IDX_28960C66B092A811",
 * columns={"store_id"})})
 * @ORM\Entity
 */
class OcSetting
{

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=32, nullable=false)
     */
    private $code = null;

    /**
     * @var string
     *
     * @ORM\Column(name="key", type="string", length=64, nullable=false)
     */
    private $key = null;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="text", length=65535, nullable=false)
     */
    private $value = null;

    /**
     * @var boolean
     *
     * @ORM\Column(name="serialized", type="boolean", nullable=false)
     */
    private $serialized = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="setting_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $settingId = null;

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
     * Set code
     *
     * @param string $code
     *
     * @return OcSetting
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
     * Set key
     *
     * @param string $key
     *
     * @return OcSetting
     */
    public function setKey($key)
    {
        $this->key = $key;

        return $this;
    }

    /**
     * Get key
     *
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Set value
     *
     * @param string $value
     *
     * @return OcSetting
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set serialized
     *
     * @param boolean $serialized
     *
     * @return OcSetting
     */
    public function setSerialized($serialized)
    {
        $this->serialized = $serialized;

        return $this;
    }

    /**
     * Get serialized
     *
     * @return boolean
     */
    public function getSerialized()
    {
        return $this->serialized;
    }

    /**
     * Get settingId
     *
     * @return integer
     */
    public function getSettingId()
    {
        return $this->settingId;
    }

    /**
     * Set store
     *
     * @param \OcStore $store
     *
     * @return OcSetting
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


}
