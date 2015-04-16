<?php
/**
 * Kirchbergerknorr Productslider
 *
 * @category    Kirchbergerknorr
 * @package     Kirchbergerknorr_Productslider:
 * @author      Benedikt Volkmer <bv@kirchbergerknorr.de>
 * @copyright   Copyright (c) 2015 kirchbergerknorr GmbH (http://www.kirchbergerknorr.de)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

class Kirchbergerknorr_Productslider_Block_Slider extends Mage_Catalog_Block_Product_List
{
    protected $enabled;
    protected $prodLimit;
    protected $categoryId;

    public function _construct()
    {
        $this->enabled = Mage::getStoreConfig('kirchbergerknorr/productslider/enabled',Mage::app()->getStore()->getId());
        $this->title = Mage::getStoreConfig('kirchbergerknorr/productslider/title',Mage::app()->getStore()->getId());
        $this->prodLimit = Mage::getStoreConfig('kirchbergerknorr/productslider/prodlimit',Mage::app()->getStore()->getId());
        $this->prodShown = Mage::getStoreConfig('kirchbergerknorr/productslider/prodshown',Mage::app()->getStore()->getId());
        $this->categoryId = Mage::getStoreConfig('kirchbergerknorr/productslider/categoryId',Mage::app()->getStore()->getId());

        return parent::_construct();
    }

    public function getProductCollection()
    {
        $catagory = Mage::getModel('catalog/category')->load($this->categoryId);

        $collection = Mage::getResourceModel('catalog/product_collection')
                        ->addCategoryFilter($catagory)
                        ->addAttributeToFilter('status',1)
                        ->addAttributeToSelect('*')
                        ->setPageSize($this->prodLimit);

        return $collection;
    }

    public function isActive()
    {
        return $this->enabled;
    }

    public function getShown()
    {
        $default = 4;
        return $this->prodShown ? $this->prodShown : $default;
    }
}