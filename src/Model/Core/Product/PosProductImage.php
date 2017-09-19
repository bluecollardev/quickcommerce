<?php

namespace QuickCommerce\Model\Core\Product;

use Doctrine\ORM\Mapping as ORM;

use QuickCommerce\Model\PosAbstractEntity;

/**
 * @ORM\Entity
 */
class PosProductImage extends PosAbstractEntity {
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", name="product_image_id")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	protected $productImageId;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", name="product_id")
	 */
	protected $productId;
	
	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=255, nullable=true, name="image")
	 */
	protected $image;
	
	/**
	 * @var integer
	 *
	 * @ORM\Column(type="integer", nullable=false, name="sort_order", options={"default":0})
	 */
	protected $sortOrder = '0';
	
	public function getProductImageId() {
		return $this->productImageId;
	}
	public function setProductImageId($productImageId) {
		$this->productImageId = $productImageId;
		return $this;
	}
	public function getProductId() {
		return $this->productId;
	}
	public function setProductId($productId) {
		$this->productId = $productId;
		return $this;
	}
	public function getImage() {
		return $this->image;
	}
	public function setImage($image) {
		$this->image = $image;
		return $this;
	}
	public function getSortOrder() {
		return $this->sortOrder;
	}
	public function setSortOrder($sortOrder) {
		$this->sortOrder = $sortOrder;
		return $this;
	}
	
}

