<?php


/**
 * OcNameList
 *
 * @ORM\Table(name="oc2_qcli", indexes={@ORM\Index(name="IDX_1864E5A1B092A811",
 * columns={"store_id"}), @ORM\Index(name="IDX_1864E5A138248176",
 * columns={"currency_id"})})
 * @ORM\Entity
 */
class OcNameList
{

    /**
     * @var integer
     *
     * @ORM\Column(name="oc_entity_id", type="integer", nullable=true)
     */
    private $ocEntityId = null;
	
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_added", type="datetime", nullable=false)
     */
    private $dateAdded = null;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_modified", type="datetime", nullable=false)
     */
    private $dateModified = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="resource_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $resourceId = null;

    /**
     * Set ocEntityId
     *
     * @param integer $ocEntityId
     *
     * @return OcNameList
     */
    public function setOcEntityId($ocEntityId)
    {
        $this->ocEntityId = $ocEntityId;

        return $this;
    }

    /**
     * Get ocEntityId
     *
     * @return integer
     */
    public function getOcEntityId()
    {
        return $this->ocEntityId;
    }

    /**
     * Set dateAdded
     *
     * @param \DateTime $dateAdded
     *
     * @return OcNameList
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
     * Set dateModified
     *
     * @param \DateTime $dateModified
     *
     * @return OcNameList
     */
    public function setDateModified($dateModified)
    {
        $this->dateModified = $dateModified;

        return $this;
    }

    /**
     * Get dateModified
     *
     * @return \DateTime
     */
    public function getDateModified()
    {
        return $this->dateModified;
    }

    /**
     * Get resourceId
     *
     * @return integer
     */
    public function getResourceId()
    {
        return $this->resourceId;
    }
}
