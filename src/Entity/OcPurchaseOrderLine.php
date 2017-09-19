<?php


/**
 * OcPurchaseOrderLine
 *
 * @ORM\Table(name="oc2_qctr_purchase_order_line")
 * @ORM\Entity
 */
class OcPurchaseOrderLine
{

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name = null;

    /**
     * @var string
     *
     * @ORM\Column(name="model", type="string", length=64, nullable=false)
     */
    private $model = null;
	
	private $description = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantity", type="integer", nullable=false)
     */
    private $quantity = null;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="decimal", precision=15, scale=4, nullable=false)
     */
    private $price = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="total", type="decimal", precision=15, scale=4, nullable=false)
     */
    private $total = '0.0000';

    /**
     * @var string
     *
     * @ORM\Column(name="tax", type="decimal", precision=15, scale=4, nullable=false)
     */
    private $tax = '0.0000';

    /**
     * @var \OcTaxClass
     *
     * @ORM\ManyToOne(targetEntity="OcTaxClass")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tax_class_id", referencedColumnName="tax_class_id")
     * })
     */
    private $taxClass = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="reward", type="integer", nullable=false)
     */
    private $reward = null;

    private $revenue = null;
    private $royalty = null;
	private $cost = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="line_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $lineId = null;
	
	private $orderProductId = null;
	private $orderId = null;

    /**
     * @var \OcPurchaseOrder
     *
     * @ORM\ManyToOne(targetEntity="OcPurchaseOrder", inversedBy="lines")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="purchase_order_id", referencedColumnName="purchase_order_id")
     * })
     */
    private $purchaseOrder = null;

    /**
     * @var \OcProduct
     *
     * @ORM\ManyToOne(targetEntity="OcProduct")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="product_id", referencedColumnName="product_id")
     * })
     */
    private $product = null;
	
	private $detailType = null;
	
	/**
     * Set detailType
     *
     * @param string $detailType
     *
     * @return OcPurchaseOrderLine
     */
    public function setDetailType($detailType)
    {
        $this->detailType = $detailType;

        return $this;
    }

    /**
     * Get detailType
     *
     * @return string
     */
    public function getDetailType()
    {
        return $this->detailType;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return OcPurchaseOrderLine
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set model
     *
     * @param string $model
     *
     * @return OcPurchaseOrderLine
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get model
     *
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     *
     * @return OcPurchaseOrderLine
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set price
     *
     * @param string $price
     *
     * @return OcPurchaseOrderLine
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set total
     *
     * @param string $total
     *
     * @return OcPurchaseOrderLine
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get total
     *
     * @return string
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set tax
     *
     * @param string $tax
     *
     * @return OcPurchaseOrderLine
     */
    public function setTax($tax)
    {
        $this->tax = $tax;

        return $this;
    }

    /**
     * Get tax
     *
     * @return string
     */
    public function getTax()
    {
        return $this->tax;
    }

    /**
     * Set reward
     *
     * @param integer $reward
     *
     * @return OcPurchaseOrderLine
     */
    public function setReward($reward)
    {
        $this->reward = $reward;

        return $this;
    }

    /**
     * Get reward
     *
     * @return integer
     */
    public function getReward()
    {
        return $this->reward;
    }

    /**
     * Set revenue
     *
     * @param integer $revenue
     *
     * @return OcPurchaseOrderLine
     */
    public function setRevenue($revenue)
    {
        $this->revenue = $revenue;

        return $this;
    }

    /**
     * Get revenue
     *
     * @return integer
     */
    public function getRevenue()
    {
        return $this->revenue;
    }

    /**
     * Set royalty
     *
     * @param integer $royalty
     *
     * @return OcPurchaseOrderLine
     */
    public function setRoyalty($royalty)
    {
        $this->royalty = $royalty;

        return $this;
    }

    /**
     * Get royalty
     *
     * @return integer
     */
    public function getRoyalty()
    {
        return $this->royalty;
    }
	
	/**
     * Set cost
     *
     * @param integer $cost
     *
     * @return OcPurchaseOrderLine
     */
    public function setCost($cost)
    {
        $this->cost = $cost;

        return $this;
    }

    /**
     * Get cost
     *
     * @return integer
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * Get lineId
     *
     * @return integer
     */
    public function getLineId()
    {
        return $this->lineId;
    }
	
	public function getOrderId()
    {
        return $this->orderId;
    }
	
	public function setOrderId($orderId)
    {
        $this->orderId = $orderId;
		
		return $this;
    }
	
	public function getOrderProductId()
    {
        return $this->orderProductId;
    }
	
	public function setOrderProductId($orderProductId)
    {
        $this->orderProductId = $orderProductId;
		
		return $this;
    }

    /**
     * Set purchaseOrder
     *
     * @param \OcPurchaseOrder $purchaseOrder
     *
     * @return OcPurchaseOrderLine
     */
    public function setPurchaseOrder(\OcPurchaseOrder $purchaseOrder = null)
    {
        $this->purchaseOrder = $purchaseOrder;

        return $this;
    }

    /**
     * Get purchaseOrder
     *
     * @return \OcPurchaseOrder
     */
    public function getPurchaseOrder()
    {
        return $this->purchaseOrder;
    }

    /**
     * Set product
     *
     * @param \OcProduct $product
     *
     * @return OcPurchaseOrderLine
     */
    public function setProduct(\OcProduct $product = null)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return \OcProduct
     */
    public function getProduct()
    {
        return $this->product;
    }
	
	// No multilanguage for line items right now
	public function getDescription() {
		return $this->description;
	}
	
	public function setDescription($description) {
		$this->description = $description;
		
		return $this;
	}

    /**
     * Set taxClass
     *
     * @param \OcTaxClass $taxClass
     *
     * @return OcPurchaseOrderLine
     */
    public function setTaxClass(\OcTaxClass $taxClass = null)
    {
        $this->taxClass = $taxClass;

        return $this;
    }

    /**
     * Get taxClass
     *
     * @return \OcTaxClass
     */
    public function getTaxClass()
    {
        return $this->taxClass;
    }
}
