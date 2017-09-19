<?php


/**
 * OcAccount
 *
 * @ORM\Table(name="oc2_qc_account")
 * @ORM\Entity
 */
class OcAccount
{
    /**
     * @var string
     *
     * @ORM\Column(acctNum="acct_num", type="string", length=15, nullable=false)
     */
    private $accountNum = null;
	
	/**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=32, nullable=false)
     */
    private $name = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="parent_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $parentId = null;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="integer")
     */
    private $status = null;

    /**
     * @var string
     *
     * @ORM\Column(name="classification", type="text", length=255, nullable=true)
     */
    private $classification = null;

    /**
     * @var string
     *
     * @ORM\Column(name="accountType", type="text", length=255, nullable=true)
     */
    private $accountType = null;

    /**
     * @var string
     *
     * @ORM\Column(name="accountSubType", type="text", length=255, nullable=true)
     */
    private $accountSubType = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="account_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $accountId = null;
	
	/**
     * Set accountNum
     *
     * @param string $accountNum
     *
     * @return OcAccount
     */
    public function setAccountNum($accountNum)
    {
        $this->accountNum = $accountNum;

        return $this;
    }

    /**
     * Get accountNum
     *
     * @return string
     */
    public function getAccountNum()
    {
        return $this->accountNum;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return OcAccount
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
     * Set parentId
     *
     * @param string $parentId
     *
     * @return OcAccount
     */
    public function setParentId($parentId)
    {
        $this->parentId = $parentId;

        return $this;
    }

    /**
     * Get parent
     *
     * @return string
     */
    public function getParentId()
    {
        return $this->parentId;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return OcAccount
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set classification
     *
     * @param string $classification
     *
     * @return OcAccount
     */
    public function setClassification($classification)
    {
        $this->classification = $classification;

        return $this;
    }

    /**
     * Get classification
     *
     * @return string
     */
    public function getClassification()
    {
        return $this->classification;
    }

    /**
     * Set accountType
     *
     * @param string $accountType
     *
     * @return OcAccount
     */
    public function setAccountType($accountType)
    {
        $this->accountType = $accountType;

        return $this;
    }

    /**
     * Get accountType
     *
     * @return string
     */
    public function getAccountType()
    {
        return $this->accountType;
    }

    /**
     * Set accountSubType
     *
     * @param string $accountSubType
     *
     * @return OcAccount
     */
    public function setAccountSubType($accountSubType)
    {
        $this->accountSubType = $accountSubType;

        return $this;
    }

    /**
     * Get accountSubType
     *
     * @return string
     */
    public function getAccountSubType()
    {
        return $this->accountSubType;
    }

    /**
     * Get accountId
     *
     * @return integer
     */
    public function getAccountId()
    {
        return $this->accountId;
    }


}
