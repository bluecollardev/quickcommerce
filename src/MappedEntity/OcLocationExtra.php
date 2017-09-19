<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * OcLocationExtra
 *
 * @ORM\Table(name="oc_location_extra")
 * @ORM\Entity
 */
class OcLocationExtra
{
    /**
     * @var integer
     *
     * @ORM\Column(name="location_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $locationId;

    /**
     * @var string
     *
     * @ORM\Column(name="mon", type="string", length=8, nullable=true)
     */
    private $mon = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="tue", type="string", length=8, nullable=true)
     */
    private $tue = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="wed", type="string", length=8, nullable=true)
     */
    private $wed = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="thu", type="string", length=8, nullable=true)
     */
    private $thu = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="fri", type="string", length=8, nullable=true)
     */
    private $fri = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="sat", type="string", length=8, nullable=true)
     */
    private $sat = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="sun", type="string", length=8, nullable=true)
     */
    private $sun = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="exception", type="string", length=300, nullable=true)
     */
    private $exception = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="payment", type="string", length=200, nullable=true)
     */
    private $payment;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=32, nullable=true)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=32, nullable=true)
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=32, nullable=true)
     */
    private $telephone;

    /**
     * @var string
     *
     * @ORM\Column(name="address_1", type="string", length=128, nullable=true)
     */
    private $address1;

    /**
     * @var string
     *
     * @ORM\Column(name="address_2", type="string", length=128, nullable=true)
     */
    private $address2;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=128, nullable=true)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="postcode", type="string", length=10, nullable=true)
     */
    private $postcode;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=128, nullable=true)
     */
    private $country;

    /**
     * @var integer
     *
     * @ORM\Column(name="country_id", type="integer", nullable=true)
     */
    private $countryId;

    /**
     * @var string
     *
     * @ORM\Column(name="zone", type="string", length=128, nullable=true)
     */
    private $zone;

    /**
     * @var integer
     *
     * @ORM\Column(name="zone_id", type="integer", nullable=true)
     */
    private $zoneId;

    /**
     * @var string
     *
     * @ORM\Column(name="area", type="string", length=128, nullable=true)
     */
    private $area;

    /**
     * @var integer
     *
     * @ORM\Column(name="area_id", type="integer", nullable=true)
     */
    private $areaId;


}

