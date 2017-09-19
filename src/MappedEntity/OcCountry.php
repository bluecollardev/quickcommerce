<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * OcCountry
 *
 * @ORM\Table(name="oc_country")
 * @ORM\Entity
 */
class OcCountry
{
    /**
     * @var integer
     *
     * @ORM\Column(name="country_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $countryId;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=128, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="iso_code_2", type="string", length=2, nullable=false)
     */
    private $isoCode2;

    /**
     * @var string
     *
     * @ORM\Column(name="iso_code_3", type="string", length=3, nullable=false)
     */
    private $isoCode3;

    /**
     * @var string
     *
     * @ORM\Column(name="address_format", type="text", length=65535, nullable=false)
     */
    private $addressFormat;

    /**
     * @var boolean
     *
     * @ORM\Column(name="postcode_required", type="boolean", nullable=false)
     */
    private $postcodeRequired;

    /**
     * @var boolean
     *
     * @ORM\Column(name="status", type="boolean", nullable=false)
     */
    private $status = '1';


}

