<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * OcAffiliate
 *
 * @ORM\Table(name="oc_affiliate")
 * @ORM\Entity
 */
class OcAffiliate
{
    /**
     * @var integer
     *
     * @ORM\Column(name="affiliate_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $affiliateId;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=32, nullable=false)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=32, nullable=false)
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=96, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=32, nullable=false)
     */
    private $telephone;

    /**
     * @var string
     *
     * @ORM\Column(name="fax", type="string", length=32, nullable=false)
     */
    private $fax;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=40, nullable=false)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="salt", type="string", length=9, nullable=false)
     */
    private $salt;

    /**
     * @var string
     *
     * @ORM\Column(name="company", type="string", length=40, nullable=false)
     */
    private $company;

    /**
     * @var string
     *
     * @ORM\Column(name="website", type="string", length=255, nullable=false)
     */
    private $website;

    /**
     * @var string
     *
     * @ORM\Column(name="address_1", type="string", length=128, nullable=false)
     */
    private $address1;

    /**
     * @var string
     *
     * @ORM\Column(name="address_2", type="string", length=128, nullable=false)
     */
    private $address2;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=128, nullable=false)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="postcode", type="string", length=10, nullable=false)
     */
    private $postcode;

    /**
     * @var integer
     *
     * @ORM\Column(name="country_id", type="integer", nullable=false)
     */
    private $countryId;

    /**
     * @var integer
     *
     * @ORM\Column(name="zone_id", type="integer", nullable=false)
     */
    private $zoneId;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=64, nullable=false)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="commission", type="decimal", precision=4, scale=2, nullable=false)
     */
    private $commission = '0.00';

    /**
     * @var string
     *
     * @ORM\Column(name="tax", type="string", length=64, nullable=false)
     */
    private $tax;

    /**
     * @var string
     *
     * @ORM\Column(name="payment", type="string", length=6, nullable=false)
     */
    private $payment;

    /**
     * @var string
     *
     * @ORM\Column(name="cheque", type="string", length=100, nullable=false)
     */
    private $cheque;

    /**
     * @var string
     *
     * @ORM\Column(name="paypal", type="string", length=64, nullable=false)
     */
    private $paypal;

    /**
     * @var string
     *
     * @ORM\Column(name="bank_name", type="string", length=64, nullable=false)
     */
    private $bankName;

    /**
     * @var string
     *
     * @ORM\Column(name="bank_branch_number", type="string", length=64, nullable=false)
     */
    private $bankBranchNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="bank_swift_code", type="string", length=64, nullable=false)
     */
    private $bankSwiftCode;

    /**
     * @var string
     *
     * @ORM\Column(name="bank_account_name", type="string", length=64, nullable=false)
     */
    private $bankAccountName;

    /**
     * @var string
     *
     * @ORM\Column(name="bank_account_number", type="string", length=64, nullable=false)
     */
    private $bankAccountNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="ip", type="string", length=40, nullable=false)
     */
    private $ip;

    /**
     * @var boolean
     *
     * @ORM\Column(name="status", type="boolean", nullable=false)
     */
    private $status;

    /**
     * @var boolean
     *
     * @ORM\Column(name="approved", type="boolean", nullable=false)
     */
    private $approved;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_added", type="datetime", nullable=false)
     */
    private $dateAdded;


}

