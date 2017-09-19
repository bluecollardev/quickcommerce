<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * OcOrderCustomField
 *
 * @ORM\Table(name="oc_order_custom_field")
 * @ORM\Entity
 */
class OcOrderCustomField
{
    /**
     * @var integer
     *
     * @ORM\Column(name="order_custom_field_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $orderCustomFieldId;

    /**
     * @var integer
     *
     * @ORM\Column(name="order_id", type="integer", nullable=false)
     */
    private $orderId;

    /**
     * @var integer
     *
     * @ORM\Column(name="custom_field_id", type="integer", nullable=false)
     */
    private $customFieldId;

    /**
     * @var integer
     *
     * @ORM\Column(name="custom_field_value_id", type="integer", nullable=false)
     */
    private $customFieldValueId;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="text", length=65535, nullable=false)
     */
    private $value;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=32, nullable=false)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="location", type="string", length=16, nullable=false)
     */
    private $location;


}

