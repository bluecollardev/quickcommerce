<?php


/**
 * OcStore
 *
 * @ORM\Table(name="oc2_store")
 * @ORM\Entity
 */
class OcStore
{

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=64, nullable=false)
     */
    private $name = null;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=false)
     */
    private $url = null;

    /**
     * @var string
     *
     * @ORM\Column(name="ssl", type="string", length=255, nullable=false)
     */
    private $ssl = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="store_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $storeId = null;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="OcProduct", mappedBy="store")
     */
    private $product = null;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="OcManufacturer", mappedBy="store")
     */
    private $manufacturer = null;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="OcInformation", mappedBy="store")
     */
    private $information = null;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="OcCategory", mappedBy="store")
     */
    private $category = null;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->product = new \Doctrine\Common\Collections\ArrayCollection();
        $this->manufacturer = new \Doctrine\Common\Collections\ArrayCollection();
        $this->information = new \Doctrine\Common\Collections\ArrayCollection();
        $this->category = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return OcStore
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
     * Set url
     *
     * @param string $url
     *
     * @return OcStore
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set ssl
     *
     * @param string $ssl
     *
     * @return OcStore
     */
    public function setSsl($ssl)
    {
        $this->ssl = $ssl;

        return $this;
    }

    /**
     * Get ssl
     *
     * @return string
     */
    public function getSsl()
    {
        return $this->ssl;
    }

    /**
     * Get storeId
     *
     * @return integer
     */
    public function getStoreId()
    {
        return $this->storeId;
    }

    /**
     * Add product
     *
     * @param \OcProduct $product
     *
     * @return OcStore
     */
    public function addProduct(\OcProduct $product)
    {
        $this->product[] = $product;

        return $this;
    }

    /**
     * Remove product
     *
     * @param \OcProduct $product
     */
    public function removeProduct(\OcProduct $product)
    {
        $this->product->removeElement($product);
    }

    /**
     * Get product
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Add manufacturer
     *
     * @param \OcManufacturer $manufacturer
     *
     * @return OcStore
     */
    public function addManufacturer(\OcManufacturer $manufacturer)
    {
        $this->manufacturer[] = $manufacturer;

        return $this;
    }

    /**
     * Remove manufacturer
     *
     * @param \OcManufacturer $manufacturer
     */
    public function removeManufacturer(\OcManufacturer $manufacturer)
    {
        $this->manufacturer->removeElement($manufacturer);
    }

    /**
     * Get manufacturer
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getManufacturer()
    {
        return $this->manufacturer;
    }

    /**
     * Add information
     *
     * @param \OcInformation $information
     *
     * @return OcStore
     */
    public function addInformation(\OcInformation $information)
    {
        $this->information[] = $information;

        return $this;
    }

    /**
     * Remove information
     *
     * @param \OcInformation $information
     */
    public function removeInformation(\OcInformation $information)
    {
        $this->information->removeElement($information);
    }

    /**
     * Get information
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getInformation()
    {
        return $this->information;
    }

    /**
     * Add category
     *
     * @param \OcCategory $category
     *
     * @return OcStore
     */
    public function addCategory(\OcCategory $category)
    {
        $this->category[] = $category;

        return $this;
    }

    /**
     * Remove category
     *
     * @param \OcCategory $category
     */
    public function removeCategory(\OcCategory $category)
    {
        $this->category->removeElement($category);
    }

    /**
     * Get category
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategory()
    {
        return $this->category;
    }


}
