<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * OcCart
 *
 * @ORM\Table(name="oc_cart", indexes={@ORM\Index(name="cart_id", columns={"customer_id", "session_id", "product_id", "recurring_id"})})
 * @ORM\Entity
 */
class OcCart
{
    /**
     * @var integer
     *
     * @ORM\Column(name="cart_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $cartId;

    /**
     * @var integer
     *
     * @ORM\Column(name="customer_id", type="integer", nullable=false)
     */
    private $customerId;

    /**
     * @var string
     *
     * @ORM\Column(name="session_id", type="string", length=32, nullable=false)
     */
    private $sessionId;

    /**
     * @var integer
     *
     * @ORM\Column(name="product_id", type="integer", nullable=false)
     */
    private $productId;

    /**
     * @var integer
     *
     * @ORM\Column(name="recurring_id", type="integer", nullable=false)
     */
    private $recurringId;

    /**
     * @var string
     *
     * @ORM\Column(name="option", type="text", length=65535, nullable=false)
     */
    private $option;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantity", type="integer", nullable=false)
     */
    private $quantity;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_added", type="datetime", nullable=false)
     */
    private $dateAdded;


}

