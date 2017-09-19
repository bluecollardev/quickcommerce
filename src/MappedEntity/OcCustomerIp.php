<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * OcCustomerIp
 *
 * @ORM\Table(name="oc_customer_ip", indexes={@ORM\Index(name="ip", columns={"ip"})})
 * @ORM\Entity
 */
class OcCustomerIp
{
    /**
     * @var integer
     *
     * @ORM\Column(name="customer_ip_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $customerIpId;

    /**
     * @var integer
     *
     * @ORM\Column(name="customer_id", type="integer", nullable=false)
     */
    private $customerId;

    /**
     * @var string
     *
     * @ORM\Column(name="ip", type="string", length=40, nullable=false)
     */
    private $ip;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_added", type="datetime", nullable=false)
     */
    private $dateAdded;


}

