<?php

class Agil_Reviews_Model_Resource_Review_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
 {
     public function _construct()
     {
         parent::_construct();
         $this->_init('agil_reviews/review');
     }
}