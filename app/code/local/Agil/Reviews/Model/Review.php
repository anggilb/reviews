<?php

class Agil_Reviews_Model_Review extends Mage_Core_Model_Abstract
{
     public function _construct()
     {
         parent::_construct();
         $this->_init('agil_reviews/review');
     }
}