<?php


/**
 * OcCustomer
 *
 * @ORM\Table(name="oc2_customer", indexes={@ORM\Index(name="IDX_DB8BB3A6D2919A68",
 * columns={"customer_group_id"}), @ORM\Index(name="IDX_DB8BB3A6B092A811",
 * columns={"store_id"}), @ORM\Index(name="IDX_DB8BB3A6F5B7AF75",
 * columns={"address_id"})})
 * @ORM\Entity
 */
class OcCustomer
{

    /**
     * @var string
     *
     * @ORM\Column(name="display_name", type="string", length=32, nullable=true)
     */
    private $displayName = null;

    /**
     * @var string
     *
     * @ORM\Column(name="company_name", type="string", length=32, nullable=true)
     */
    private $companyName = null;

    /**
     * @var string
     *
     * @ORM\Column(name="print_on_check_name", type="string", length=32, nullable=true)
     */
    private $printOnCheckName = null;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=32, nullable=false)
     */
    private $firstname = null;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=32, nullable=false)
     */
    private $lastname = null;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=96, nullable=false)
     */
    private $email = null;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=32, nullable=false)
     */
    private $telephone = null;

    /**
     * @var string
     *
     * @ORM\Column(name="fax", type="string", length=32, nullable=false)
     */
    private $fax = null;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=40, nullable=false)
     */
    private $password = null;

    /**
     * @var string
     *
     * @ORM\Column(name="salt", type="string", length=9, nullable=false)
     */
    private $salt = null;

    /**
     * @var string
     *
     * @ORM\Column(name="cart", type="text", length=65535, nullable=true)
     */
    private $cart = null;

    /**
     * @var string
     *
     * @ORM\Column(name="wishlist", type="text", length=65535, nullable=true)
     */
    private $wishlist = null;

    /**
     * @var boolean
     *
     * @ORM\Column(name="newsletter", type="boolean", nullable=false)
     */
    private $newsletter = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="custom_field", type="text", length=65535, nullable=false)
     */
    private $customField = null;

    /**
     * @var string
     *
     * @ORM\Column(name="ip", type="string", length=40, nullable=false)
     */
    private $ip = null;

    /**
     * @var boolean
     *
     * @ORM\Column(name="status", type="boolean", nullable=false)
     */
    private $status = null;

    /**
     * @var boolean
     *
     * @ORM\Column(name="approved", type="boolean", nullable=false)
     */
    private $approved = null;

    /**
     * @var boolean
     *
     * @ORM\Column(name="safe", type="boolean", nullable=false)
     */
    private $safe = null;

    /**
     * @var string
     *
     * @ORM\Column(name="token", type="text", length=65535, nullable=false)
     */
    private $token = null;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_added", type="datetime", nullable=false)
     */
    private $dateAdded = null;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_modified", type="datetime", nullable=true)
     */
    private $dateModified = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="customer_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $customerId = null;

    /**
     * @var \OcAddress
     *
     * @ORM\ManyToOne(targetEntity="OcAddress")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="address_id", referencedColumnName="address_id")
     * })
     */
    private $address = null;

    /**
     * @var \OcCustomerGroup
     *
     * @ORM\ManyToOne(targetEntity="OcCustomerGroup")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="customer_group_id",
     * referencedColumnName="customer_group_id")
     * })
     */
    private $customerGroup = null;

    /**
     * @var \OcStore
     *
     * @ORM\ManyToOne(targetEntity="OcStore")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="store_id", referencedColumnName="store_id")
     * })
     */
    private $store = null;

    /**
     * Set displayName
     *
     * @param string $displayName
     *
     * @return OcCustomer
     */
    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;

        return $this;
    }

    /**
     * Get displayName
     *
     * @return string
     */
    public function getDisplayName()
    {
        return $this->displayName;
    }

    /**
     * Set companyName
     *
     * @param string $companyName
     *
     * @return OcCustomer
     */
    public function setCompanyName($companyName)
    {
        $this->companyName = $companyName;

        return $this;
    }

    /**
     * Get companyName
     *
     * @return string
     */
    public function getCompanyName()
    {
        return $this->companyName;
    }

    /**
     * Set printOnCheckName
     *
     * @param string $printOnCheckName
     *
     * @return OcCustomer
     */
    public function setPrintOnCheckName($printOnCheckName)
    {
        $this->printOnCheckName = $printOnCheckName;

        return $this;
    }

    /**
     * Get printOnCheckName
     *
     * @return string
     */
    public function getPrintOnCheckName()
    {
        return $this->printOnCheckName;
    }
    
    /**
     * Set firstname
     *
     * @param string $firstname
     *
     * @return OcCustomer
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return OcCustomer
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return OcCustomer
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     *
     * @return OcCustomer
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set fax
     *
     * @param string $fax
     *
     * @return OcCustomer
     */
    public function setFax($fax)
    {
        $this->fax = $fax;

        return $this;
    }

    /**
     * Get fax
     *
     * @return string
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return OcCustomer
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set salt
     *
     * @param string $salt
     *
     * @return OcCustomer
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Get salt
     *
     * @return string
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set cart
     *
     * @param string $cart
     *
     * @return OcCustomer
     */
    public function setCart($cart)
    {
        $this->cart = $cart;

        return $this;
    }

    /**
     * Get cart
     *
     * @return string
     */
    public function getCart()
    {
        return $this->cart;
    }

    /**
     * Set wishlist
     *
     * @param string $wishlist
     *
     * @return OcCustomer
     */
    public function setWishlist($wishlist)
    {
        $this->wishlist = $wishlist;

        return $this;
    }

    /**
     * Get wishlist
     *
     * @return string
     */
    public function getWishlist()
    {
        return $this->wishlist;
    }

    /**
     * Set newsletter
     *
     * @param boolean $newsletter
     *
     * @return OcCustomer
     */
    public function setNewsletter($newsletter)
    {
        $this->newsletter = $newsletter;

        return $this;
    }

    /**
     * Get newsletter
     *
     * @return boolean
     */
    public function getNewsletter()
    {
        return $this->newsletter;
    }

    /**
     * Set customField
     *
     * @param string $customField
     *
     * @return OcCustomer
     */
    public function setCustomField($customField)
    {
        $this->customField = $customField;

        return $this;
    }

    /**
     * Get customField
     *
     * @return string
     */
    public function getCustomField()
    {
        return $this->customField;
    }

    /**
     * Set ip
     *
     * @param string $ip
     *
     * @return OcCustomer
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
     * Set status
     *
     * @param boolean $status
     *
     * @return OcCustomer
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return boolean
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set approved
     *
     * @param boolean $approved
     *
     * @return OcCustomer
     */
    public function setApproved($approved)
    {
        $this->approved = $approved;

        return $this;
    }

    /**
     * Get approved
     *
     * @return boolean
     */
    public function getApproved()
    {
        return $this->approved;
    }

    /**
     * Set safe
     *
     * @param boolean $safe
     *
     * @return OcCustomer
     */
    public function setSafe($safe)
    {
        $this->safe = $safe;

        return $this;
    }

    /**
     * Get safe
     *
     * @return boolean
     */
    public function getSafe()
    {
        return $this->safe;
    }

    /**
     * Set token
     *
     * @param string $token
     *
     * @return OcCustomer
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Get token
     *
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Set dateAdded
     *
     * @param \DateTime $dateAdded
     *
     * @return OcCustomer
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
     * Set dateModified
     *
     * @param \DateTime $dateModified
     *
     * @return OcCustomer
     */
    public function setDateModified($dateModified)
    {
        $this->dateModified = $dateModified;

        return $this;
    }

    /**
     * Get dateModified
     *
     * @return \DateTime
     */
    public function getDateModified()
    {
        return $this->dateModified;
    }

    /**
     * Get customerId
     *
     * @return integer
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * Set address
     *
     * @param \OcAddress $address
     *
     * @return OcCustomer
     */
    public function setAddress(\OcAddress $address = null)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return \OcAddress
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set customerGroup
     *
     * @param \OcCustomerGroup $customerGroup
     *
     * @return OcCustomer
     */
    public function setCustomerGroup(\OcCustomerGroup $customerGroup = null)
    {
        $this->customerGroup = $customerGroup;

        return $this;
    }

    /**
     * Get customerGroup
     *
     * @return \OcCustomerGroup
     */
    public function getCustomerGroup()
    {
        return $this->customerGroup;
    }

    /**
     * Set store
     *
     * @param \OcStore $store
     *
     * @return OcCustomer
     */
    public function setStore(\OcStore $store = null)
    {
        $this->store = $store;

        return $this;
    }

    /**
     * Get store
     *
     * @return \OcStore
     */
    public function getStore()
    {
        return $this->store;
    }
}
