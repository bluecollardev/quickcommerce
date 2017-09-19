<?php


/**
 * OcCustomerIp
 *
 * @ORM\Table(name="oc2_customer_ip", indexes={@ORM\Index(name="ip",
 * columns={"ip"}), @ORM\Index(name="IDX_14EC97979395C3F3",
 * columns={"customer_id"})})
 * @ORM\Entity
 */
class OcCustomerIp
{

    /**
     * @var string
     *
     * @ORM\Column(name="ip", type="string", length=40, nullable=false)
     */
    private $ip = null;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_added", type="datetime", nullable=false)
     */
    private $dateAdded = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="customer_ip_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $customerIpId = null;

    /**
     * @var \OcCustomer
     *
     * @ORM\ManyToOne(targetEntity="OcCustomer")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="customer_id", referencedColumnName="customer_id")
     * })
     */
    private $customer = null;

    /**
     * Set ip
     *
     * @param string $ip
     *
     * @return OcCustomerIp
     */
    public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Get ip
     *
     * @return string
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Set dateAdded
     *
     * @param \DateTime $dateAdded
     *
     * @return OcCustomerIp
     */
    public function setDateAdded($dateAdded)
    {
        $this->dateAdded = $dateAdded;

        return $this;
    }

    /**
     * Get dateAdded
     *
     * @return \DateTime
     */
    public function getDateAdded()
    {
        return $this->dateAdded;
    }

    /**
     * Get customerIpId
     *
     * @return integer
     */
    public function getCustomerIpId()
    {
        return $this->customerIpId;
    }

    /**
     * Set customer
     *
     * @param \OcCustomer $customer
     *
     * @return OcCustomerIp
     */
    public function setCustomer(\OcCustomer $customer = null)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * Get customer
     *
     * @return \OcCustomer
     */
    public function getCustomer()
    {
        return $this->customer;
    }


}
