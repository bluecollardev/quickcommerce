<?php


/**
 * OcUserGroup
 *
 * @ORM\Table(name="oc2_user_group")
 * @ORM\Entity
 */
class OcUserGroup
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
     * @ORM\Column(name="permission", type="text", length=65535, nullable=false)
     */
    private $permission = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="user_group_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $userGroupId = null;

    /**
     * Set name
     *
     * @param string $name
     *
     * @return OcUserGroup
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
     * Set permission
     *
     * @param string $permission
     *
     * @return OcUserGroup
     */
    public function setPermission($permission)
    {
        $this->permission = $permission;

        return $this;
    }

    /**
     * Get permission
     *
     * @return string
     */
    public function getPermission()
    {
        return $this->permission;
    }

    /**
     * Get userGroupId
     *
     * @return integer
     */
    public function getUserGroupId()
    {
        return $this->userGroupId;
    }


}
