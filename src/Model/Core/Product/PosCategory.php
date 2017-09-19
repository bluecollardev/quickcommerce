<?php

namespace QuickCommerce\Model\Core\Product;

use Doctrine\ORM\Mapping as ORM;

use QuickCommerce\Model\PosAbstractEntity;

/**
 * @ORM\Entity
 */
class PosCategory extends PosAbstractEntity {
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", name="category_id")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	protected $categoryId;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=255, nullable=true, name="image")
	 */
	protected $image;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", nullable=false, name="parent_id", options={"default":0})
	 */
	protected $parentId = '0';
	
	/**
	 * @var
	 *
	 * @ORM\Column(name="sort_order", type="integer", nullable=false)
	 */
	protected $sortOrder = '0';
	
	/**
	 * @var boolean
	 *
	 * @ORM\Column(type="boolean", nullable=false, name="status")
	 */
	protected $status;
	
	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(type="datetime", nullable=false, name="date_added")
	 */
	protected $dateAdded;
	
	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(type="datetime", nullable=false, name="date_modified")
	 */
	protected $dateModified;
	
	public function getCategoryId() {
		return $this->categoryId;
	}
	public function setCategoryId($categoryId) {
		$this->categoryId = $categoryId;
		return $this;
	}
	public function getImage() {
		return $this->image;
	}
	public function setImage($image) {
		$this->image = $image;
		return $this;
	}
	public function getParentId() {
		return $this->parentId;
	}
	public function setParentId($parentId) {
		$this->parentId = $parentId;
		return $this;
	}
	public function getSortOrder() {
		return $this->sortOrder;
	}
	public function setSortOrder($sortOrder) {
		$this->sortOrder = $sortOrder;
		return $this;
	}
	public function getStatus() {
		return $this->status;
	}
	public function setStatus($status) {
		$this->status = $status;
		return $this;
	}
	public function getDateAdded() {
		return $this->dateAdded;
	}
	public function setDateAdded(\DateTime $dateAdded) {
		$this->dateAdded = $dateAdded;
		return $this;
	}
	public function getDateModified() {
		return $this->dateModified;
	}
	public function setDateModified(\DateTime $dateModified) {
		$this->dateModified = $dateModified;
		return $this;
	}
	
}

