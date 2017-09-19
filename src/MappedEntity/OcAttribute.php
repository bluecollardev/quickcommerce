<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * OcAttribute
 *
 * @ORM\Table(name="oc_attribute")
 * @ORM\Entity
 */
class OcAttribute
{
    /**
     * @var integer
     *
     * @ORM\Column(name="attribute_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $attributeId;

    /**
     * @var integer
     *
     * @ORM\Column(name="attribute_group_id", type="integer", nullable=false)
     */
    private $attributeGroupId;

    /**
     * @var integer
     *
     * @ORM\Column(name="sort_order", type="integer", nullable=false)
     */
    private $sortOrder;


}

