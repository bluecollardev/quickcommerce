<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * OcCustomFieldCustomerGroup
 *
 * @ORM\Table(name="oc_custom_field_customer_group")
 * @ORM\Entity
 */
class OcCustomFieldCustomerGroup
{
    /**
     * @var integer
     *
     * @ORM\Column(name="custom_field_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $customFieldId;

    /**
     * @var integer
     *
     * @ORM\Column(name="customer_group_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $customerGroupId;

    /**
     * @var boolean
     *
     * @ORM\Column(name="required", type="boolean", nullable=false)
     */
    private $required;


}

