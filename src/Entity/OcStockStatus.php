<?php


/**
 * OcStockStatus
 *
 * @ORM\Table(name="oc2_stock_status")
 * @ORM\Entity
 */
class OcStockStatus
{

    /**
     * @var integer
     *
     * @ORM\Column(name="stock_status_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $stockStatusId = null;
	
	private $name = null;
	
	private $language = null;

    /**
     * Set stockStatusId
     *
     * @param integer $stockStatusId
     *
     * @return OcStockStatus
     */
    public function setStockStatusId($stockStatusId)
    {
        $this->stockStatusId = $stockStatusId;

        return $this;
    }

    /**
     * Get stockStatusId
     *
     * @return integer
     */
    public function getStockStatusId()
    {
        return $this->stockStatusId;
    }

	
	/**
     * Set name
     *
     * @param string $name
     *
     * @return OcStockStatus
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
     * Set language
     *
     * @param integer $language
     *
     * @return OcStockStatus
     */
    public function setLanguage($language)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language
     *
     * @return integer
     */
    public function getLanguage()
    {
        return $this->language;
    }
}
