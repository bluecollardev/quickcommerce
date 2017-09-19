<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * OcCustomFieldValue
 *
 * @ORM\Table(name="oc_custom_field_value")
 * @ORM\Entity
 */
class OcCustomFieldValue
{
    /**
     * @var integer
     *
     * @ORM\Column(name="custom_field_value_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $customFieldValueId;

    /**
     * @var integer
     *
     * @ORM\Column(name="custom_field_id", type="integer", nullable=false)
     */
    private $customFieldId;

    /**
     * @var integer
     *
     * @ORM\Column(name="sort_order", type="integer", nullable=false)
     */
    private $sortOrder;


}

