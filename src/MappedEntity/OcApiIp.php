<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * OcApiIp
 *
 * @ORM\Table(name="oc_api_ip")
 * @ORM\Entity
 */
class OcApiIp
{
    /**
     * @var integer
     *
     * @ORM\Column(name="api_ip_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $apiIpId;

    /**
     * @var integer
     *
     * @ORM\Column(name="api_id", type="integer", nullable=false)
     */
    private $apiId;

    /**
     * @var string
     *
     * @ORM\Column(name="ip", type="string", length=40, nullable=false)
     */
    private $ip;


}

