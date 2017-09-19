<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * OcUserAffiliate
 *
 * @ORM\Table(name="oc_user_affiliate")
 * @ORM\Entity
 */
class OcUserAffiliate
{
    /**
     * @var integer
     *
     * @ORM\Column(name="user_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $userId;

    /**
     * @var integer
     *
     * @ORM\Column(name="affiliate_id", type="integer", nullable=false)
     */
    private $affiliateId;


}

