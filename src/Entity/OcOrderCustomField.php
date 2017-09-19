<?php


/**
 * OcOrderCustomField
 *
 * @ORM\Table(name="oc2_order_custom_field",
 * indexes={@ORM\Index(name="IDX_86338A18D9F6D38", columns={"order_id"}),
 * @ORM\Index(name="IDX_86338A1A1E5E0D4", columns={"custom_field_id"}),
 * @ORM\Index(name="IDX_86338A15FD09B5", columns={"custom_field_value_id"})})
 * @ORM\Entity
 */
class OcOrderCustomField
{

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name = null;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="text", length=65535, nullable=false)
     */
    private $value = null;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=32, nullable=false)
     */
    private $type = null;

    /**
     * @var string
     *
     * @ORM\Column(name="location", type="string", length=16, nullable=false)
     */
    private $location = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="order_custom_field_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $orderCustomFieldId = null;

    /**
     * @var \OcCustomField
     *
     * @ORM\ManyToOne(targetEntity="OcCustomField")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="custom_field_id",
     * referencedColumnName="custom_field_id")
     * })
     */
    private $customField = null;

    /**
     * @var \OcOrder
     *
     * @ORM\ManyToOne(targetEntity="OcOrder")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="order_id", referencedColumnName="order_id")
     * })
     */
    private $order = null;

    /**
     * @var \OcCustomFieldValue
     *
     * @ORM\ManyToOne(targetEntity="OcCustomFieldValue")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="custom_field_value_id",
     * referencedColumnName="custom_field_value_id")
     * })
     */
    private $customFieldValue = null;

    /**
     * Set name
     *
     * @param string $name
     *
     * @return OcOrderCustomField
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
     * Set value
     *
     * @param string $value
     *
     * @return OcOrderCustomField
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
     * Set type
     *
     * @param string $type
     *
     * @return OcOrderCustomField
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
     * Set location
     *
     * @param string $location
     *
     * @return OcOrderCustomField
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Get orderCustomFieldId
     *
     * @return integer
     */
    public function getOrderCustomFieldId()
    {
        return $this->orderCustomFieldId;
    }

    /**
     * Set customField
     *
     * @param \OcCustomField $customField
     *
     * @return OcOrderCustomField
     */
    public function setCustomField(\OcCustomField $customField = null)
    {
        $this->customField = $customField;

        return $this;
    }

    /**
     * Get customField
     *
     * @return \OcCustomField
     */
    public function getCustomField()
    {
        return $this->customField;
    }

    /**
     * Set order
     *
     * @param \OcOrder $order
     *
     * @return OcOrderCustomField
     */
    public function setOrder(\OcOrder $order = null)
    {
        $this->order = $order;

        return $this;
    }

    /**
     * Get order
     *
     * @return \OcOrder
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * Set customFieldValue
     *
     * @param \OcCustomFieldValue $customFieldValue
     *
     * @return OcOrderCustomField
     */
    public function setCustomFieldValue(\OcCustomFieldValue $customFieldValue = null)
    {
        $this->customFieldValue = $customFieldValue;

        return $this;
    }

    /**
     * Get customFieldValue
     *
     * @return \OcCustomFieldValue
     */
    public function getCustomFieldValue()
    {
        return $this->customFieldValue;
    }


}
