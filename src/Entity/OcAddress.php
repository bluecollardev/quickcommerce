<?php


/**
 * OcAddress
 *
 * @ORM\Table(name="oc2_address", indexes={@ORM\Index(name="customer_id",
 * columns={"customer_id"}), @ORM\Index(name="IDX_BAACDB7FF92F3E70",
 * columns={"country_id"}), @ORM\Index(name="IDX_BAACDB7F9F2C3FAB",
 * columns={"zone_id"})})
 * @ORM\Entity
 */
class OcAddress
{

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
     * @ORM\Column(name="company", type="string", length=40, nullable=false)
     */
    private $company = null;

    /**
     * @var string
     *
     * @ORM\Column(name="address_1", type="string", length=128, nullable=false)
     */
    private $address1 = null;

    /**
     * @var string
     *
     * @ORM\Column(name="address_2", type="string", length=128, nullable=false)
     */
    private $address2 = null;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=128, nullable=false)
     */
    private $city = null;

    /**
     * @var string
     *
     * @ORM\Column(name="postcode", type="string", length=10, nullable=false)
     */
    private $postcode = null;

    /**
     * @var string
     *
     * @ORM\Column(name="custom_field", type="text", length=65535, nullable=false)
     */
    private $customField = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="address_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $addressId = null;

    /**
     * @var \OcCountry
     *
     * @ORM\ManyToOne(targetEntity="OcCountry")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="country_id", referencedColumnName="country_id")
     * })
     */
    private $country = null;

    /**
     * @var \OcZone
     *
     * @ORM\ManyToOne(targetEntity="OcZone")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="zone_id", referencedColumnName="zone_id")
     * })
     */
    private $zone = null;

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
     * Set firstname
     *
     * @param string $firstname
     *
     * @return OcAddress
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
     * @return OcAddress
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
     * Set company
     *
     * @param string $company
     *
     * @return OcAddress
     */
    public function setCompany($company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return string
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set address1
     *
     * @param string $address1
     *
     * @return OcAddress
     */
    public function setAddress1($address1)
    {
        $this->address1 = $address1;

        return $this;
    }

    /**
     * Get address1
     *
     * @return string
     */
    public function getAddress1()
    {
        return $this->address1;
    }

    /**
     * Set address2
     *
     * @param string $address2
     *
     * @return OcAddress
     */
    public function setAddress2($address2)
    {
        $this->address2 = $address2;

        return $this;
    }

    /**
     * Get address2
     *
     * @return string
     */
    public function getAddress2()
    {
        return $this->address2;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return OcAddress
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set postcode
     *
     * @param string $postcode
     *
     * @return OcAddress
     */
    public function setPostcode($postcode)
    {
        $this->postcode = $postcode;

        return $this;
    }

    /**
     * Get postcode
     *
     * @return string
     */
    public function getPostcode()
    {
        return $this->postcode;
    }

    /**
     * Set customField
     *
     * @param string $customField
     *
     * @return OcAddress
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
     * Get addressId
     *
     * @return integer
     */
    public function getAddressId()
    {
        return $this->addressId;
    }

    /**
     * Set country
     *
     * @param \OcCountry $country
     *
     * @return OcAddress
     */
    public function setCountry(\OcCountry $country = null)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return \OcCountry
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set zone
     *
     * @param \OcZone $zone
     *
     * @return OcAddress
     */
    public function setZone(\OcZone $zone = null)
    {
        $this->zone = $zone;

        return $this;
    }

    /**
     * Get zone
     *
     * @return \OcZone
     */
    public function getZone()
    {
        return $this->zone;
    }

    /**
     * Set customer
     *
     * @param \OcCustomer $customer
     *
     * @return OcAddress
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
