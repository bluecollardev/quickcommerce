<?php

namespace QuickCommerce\Model\Plugin;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class PosPosReturn extends PosAbstractEntity {
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="pos_return_id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	protected $posReturnId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="user_id", type="integer", nullable=true)
	 */
	//protected $userId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="location_id", type="integer", nullable=true)
	 */
	protected $locationId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="customer_id", type="integer", nullable=true)
	 */
	protected $customerId;
	
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
	 * @ORM\Column(name="email", type="string", length=96, nullable=true)
	 */
	protected $email;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="telephone", type="string", length=32, nullable=true)
	 */
	protected $telephone;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="return_status_id", type="integer", nullable=true)
	 */
	protected $returnStatusId;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="tax", type="decimal", precision=15, scale=4, nullable=true)
	 */
	protected $tax;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="sub_total", type="decimal", precision=15, scale=4, nullable=true)
	 */
	protected $subTotal;
	
	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="date_added", type="datetime", nullable=true)
	 */
	protected $dateAdded;
	
	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="date_modified", type="datetime", nullable=true)
	 */
	protected $dateModified;
}

