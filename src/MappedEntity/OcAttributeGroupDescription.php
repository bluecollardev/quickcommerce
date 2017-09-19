<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * OcAttributeGroupDescription
 *
 * @ORM\Table(name="oc_attribute_group_description")
 * @ORM\Entity
 */
class OcAttributeGroupDescription
{
    /**
     * @var integer
     *
     * @ORM\Column(name="attribute_group_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $attributeGroupId;

    /**
     * @var integer
     *
     * @ORM\Column(name="language_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $languageId;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=64, nullable=false)
     */
    private $name;


}

