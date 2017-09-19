<?php


/**
 * OcInformationToLayout
 *
 * @ORM\Table(name="oc2_information_to_layout",
 * indexes={@ORM\Index(name="IDX_B5573F032EF03101", columns={"information_id"}),
 * @ORM\Index(name="IDX_B5573F03B092A811", columns={"store_id"}),
 * @ORM\Index(name="IDX_B5573F038C22AA1A", columns={"layout_id"})})
 * @ORM\Entity
 */
class OcInformationToLayout
{

    /**
     * @var \OcInformation
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="OcInformation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="information_id", referencedColumnName="information_id")
     * })
     */
    private $information = null;

    /**
     * @var \OcStore
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="OcStore")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="store_id", referencedColumnName="store_id")
     * })
     */
    private $store = null;

    /**
     * @var \OcLayout
     *
     * @ORM\ManyToOne(targetEntity="OcLayout")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="layout_id", referencedColumnName="layout_id")
     * })
     */
    private $layout = null;

    /**
     * Set information
     *
     * @param \OcInformation $information
     *
     * @return OcInformationToLayout
     */
    public function setInformation(\OcInformation $information)
    {
        $this->information = $information;

        return $this;
    }

    /**
     * Get information
     *
     * @return \OcInformation
     */
    public function getInformation()
    {
        return $this->information;
    }

    /**
     * Set store
     *
     * @param \OcStore $store
     *
     * @return OcInformationToLayout
     */
    public function setStore(\OcStore $store)
    {
        $this->store = $store;

        return $this;
    }

    /**
     * Get store
     *
     * @return \OcStore
     */
    public function getStore()
    {
        return $this->store;
    }

    /**
     * Set layout
     *
     * @param \OcLayout $layout
     *
     * @return OcInformationToLayout
     */
    public function setLayout(\OcLayout $layout = null)
    {
        $this->layout = $layout;

        return $this;
    }

    /**
     * Get layout
     *
     * @return \OcLayout
     */
    public function getLayout()
    {
        return $this->layout;
    }


}
