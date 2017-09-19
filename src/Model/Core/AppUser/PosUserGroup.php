<?php

namespace QuickCommerce\Model\Core\AppUser;

use Doctrine\ORM\Mapping as ORM;

use QuickCommerce\Model\PosAbstractEntity;

/**
 * OcUserGroup
 *
 * @ORM\Entity
 */
class PosUserGroup {
    /**
     * @var integer
     *
     * @ORM\Column(type="integer", name="user_group_id")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $userGroupId;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=64, nullable=false, name="name")
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(type="text", length=65535, nullable=false, name="permission")
     */
    protected $permission;
    
	public function getUserGroupId() {
		return $this->userGroupId;
	}
	public function setUserGroupId($userGroupId) {
		$this->userGroupId = $userGroupId;
		return $this;
	}
	public function getName() {
		return $this->name;
	}
	public function setName($name) {
		$this->name = $name;
		return $this;
	}
	public function getPermission() {
		return $this->permission;
	}
	public function setPermission($permission) {
		$this->permission = $permission;
		return $this;
	}
	
}

