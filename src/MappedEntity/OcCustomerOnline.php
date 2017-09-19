<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * OcCustomerOnline
 *
 * @ORM\Table(name="oc_customer_online")
 * @ORM\Entity
 */
class OcCustomerOnline
{
    /**
     * @var string
     *
     * @ORM\Column(name="ip", type="string", length=40, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ip;

    /**
     * @var integer
     *
     * @ORM\Column(name="customer_id", type="integer", nullable=false)
     */
    private $customerId;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="text", length=65535, nullable=false)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="referer", type="text", length=65535, nullable=false)
     */
    private $referer;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_added", type="datetime", nullable=false)
     */
    private $dateAdded;


}

