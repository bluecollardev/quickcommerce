<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * OcFilterGroupDescription
 *
 * @ORM\Table(name="oc_filter_group_description")
 * @ORM\Entity
 */
class OcFilterGroupDescription
{
    /**
     * @var integer
     *
     * @ORM\Column(name="filter_group_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $filterGroupId;

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

