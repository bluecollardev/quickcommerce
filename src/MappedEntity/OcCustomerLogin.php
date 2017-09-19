<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * OcCustomerLogin
 *
 * @ORM\Table(name="oc_customer_login", indexes={@ORM\Index(name="email", columns={"email"}), @ORM\Index(name="ip", columns={"ip"})})
 * @ORM\Entity
 */
class OcCustomerLogin
{
    /**
     * @var integer
     *
     * @ORM\Column(name="customer_login_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $customerLoginId;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=96, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="ip", type="string", length=40, nullable=false)
     */
    private $ip;

    /**
     * @var integer
     *
     * @ORM\Column(name="total", type="integer", nullable=false)
     */
    private $total;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_added", type="datetime", nullable=false)
     */
    private $dateAdded;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_modified", type="datetime", nullable=false)
     */
    private $dateModified;


}

