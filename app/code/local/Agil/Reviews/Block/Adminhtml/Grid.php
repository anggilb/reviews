<?php

class Agil_Reviews_Block_Adminhtml_Grid extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function preDispatch()
    {
        parent::preDispatch();

        if( !Mage::getStoreConfigFlag(self::XML_PATH_ENABLED) ) {
            $this->norouteAction();
        }
    }

    public function __construct()
    {
        $this->_controller = 'adminhtml_reviews';
        $this->_blockGroup = 'reviews';
        $this->_controller = 'adminhtml_reviews';
        $this->_headerText = 'Manage my Reviews';
        parent::__construct();
        $this->_removeButton('add');
    }
}