<?php

namespace QuickCommerce\Model\Plugin;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class PosLocationExtra extends PosAbstractEntity {
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="location_id", type="integer", nullable=false)
	 * @ORM\Id
	 */
	protected $locationId;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="mon", type="string", length=8, nullable=true, options={"default":0})
	 */
	protected $mon = '0';
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="tue", type="string", length=8, nullable=true, options={"default":0})
	 */
	protected $tue = '0';
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="wed", type="string", length=8, nullable=true, options={"default":0})
	 */
	protected $wed = '0';
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="thu", type="string", length=8, nullable=true, options={"default":0})
	 */
	protected $thu = '0';
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="fri", type="string", length=8, nullable=true, options={"default":0})
	 */
	protected $fri = '0';
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="sat", type="string", length=8, nullable=true, options={"default":0})
	 */
	protected $sat = '0';
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="sun", type="string", length=8, nullable=true, options={"default":0})
	 */
	protected $sun = '0';
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="exception", type="string", length=300, nullable=true, options={"default":0})
	 */
	protected $exception = '0';
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="payment", type="string", length=200, nullable=true)
	 */
	protected $payment;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="firstname", type="string", length=32, nullable=true)
	 */
	protected $firstname;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="lastname", type="string", length=32, nullable=true)
	 */
	protected $lastname;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="telephone", type="string", length=32, nullable=true)
	 */
	protected $telephone;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="address_1", type="string", length=128, nullable=true)
	 */
	protected $address1;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="address_2", type="string", length=128, nullable=true)
	 */
	protected $address2;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="city", type="string", length=128, nullable=true)
	 */
	protected $city;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="postcode", type="string", length=10, nullable=true)
	 */
	protected $postcode;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="country", type="string", length=128, nullable=true)
	 */
	protected $country;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="country_id", type="integer", nullable=true)
	 */
	protected $countryId;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="zone", type="string", length=128, nullable=true)
	 */
	protected $zone;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="zone_id", type="integer", nullable=true)
	 */
	protected $zoneId;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="area", type="string", length=128, nullable=true)
	 */
	protected $area;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="area_id", type="integer", nullable=true)
	 */
	protected $areaId;
}

