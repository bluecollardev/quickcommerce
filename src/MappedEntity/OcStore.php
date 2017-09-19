<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * OcStore
 *
 * @ORM\Table(name="oc_store")
 * @ORM\Entity
 */
class OcStore
{
    /**
     * @var integer
     *
     * @ORM\Column(name="store_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $storeId;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=64, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=false)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="ssl", type="string", length=255, nullable=false)
     */
    private $ssl;


}

