<?php


/**
 * OcDownload
 *
 * @ORM\Table(name="oc2_download")
 * @ORM\Entity
 */
class OcDownload
{

    /**
     * @var string
     *
     * @ORM\Column(name="filename", type="string", length=128, nullable=false)
     */
    private $filename = null;

    /**
     * @var string
     *
     * @ORM\Column(name="mask", type="string", length=128, nullable=false)
     */
    private $mask = null;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_added", type="datetime", nullable=false)
     */
    private $dateAdded = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="download_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $downloadId = null;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="OcProduct", mappedBy="download")
     */
    private $product = null;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="OcLanguage", inversedBy="download")
     * @ORM\JoinTable(name="oc2_download_description",
     *   joinColumns={
     *     @ORM\JoinColumn(name="download_id", referencedColumnName="download_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="language_id", referencedColumnName="language_id")
     *   }
     * )
     */
    private $language = null;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->product = new \Doctrine\Common\Collections\ArrayCollection();
        $this->language = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set filename
     *
     * @param string $filename
     *
     * @return OcDownload
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;

        return $this;
    }

    /**
     * Get filename
     *
     * @return string
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * Set mask
     *
     * @param string $mask
     *
     * @return OcDownload
     */
    public function setMask($mask)
    {
        $this->mask = $mask;

        return $this;
    }

    /**
     * Get mask
     *
     * @return string
     */
    public function getMask()
    {
        return $this->mask;
    }

    /**
     * Set dateAdded
     *
     * @param \DateTime $dateAdded
     *
     * @return OcDownload
     */
    public function setDateAdded($dateAdded)
    {
        $this->dateAdded = $dateAdded;

        return $this;
    }

    /**
     * Get dateAdded
     *
     * @return \DateTime
     */
    public function getDateAdded()
    {
        return $this->dateAdded;
    }

    /**
     * Get downloadId
     *
     * @return integer
     */
    public function getDownloadId()
    {
        return $this->downloadId;
    }

    /**
     * Add product
     *
     * @param \OcProduct $product
     *
     * @return OcDownload
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
     * Add language
     *
     * @param \OcLanguage $language
     *
     * @return OcDownload
     */
    public function addLanguage(\OcLanguage $language)
    {
        $this->language[] = $language;

        return $this;
    }

    /**
     * Remove language
     *
     * @param \OcLanguage $language
     */
    public function removeLanguage(\OcLanguage $language)
    {
        $this->language->removeElement($language);
    }

    /**
     * Get language
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLanguage()
    {
        return $this->language;
    }


}
