<?php


/**
 * OcCustomFieldValue
 *
 * @ORM\Table(name="oc2_custom_field_value",
 * indexes={@ORM\Index(name="IDX_94B76AFFA1E5E0D4", columns={"custom_field_id"})})
 * @ORM\Entity
 */
class OcCustomFieldValue
{

    /**
     * @var integer
     *
     * @ORM\Column(name="sort_order", type="integer", nullable=false)
     */
    private $sortOrder = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="custom_field_value_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $customFieldValueId = null;

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
     * Set sortOrder
     *
     * @param integer $sortOrder
     *
     * @return OcCustomFieldValue
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
     * Get customFieldValueId
     *
     * @return integer
     */
    public function getCustomFieldValueId()
    {
        return $this->customFieldValueId;
    }

    /**
     * Set customField
     *
     * @param \OcCustomField $customField
     *
     * @return OcCustomFieldValue
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


}
