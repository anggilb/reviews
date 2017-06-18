<?php

class Agil_Reviews_Model_Resource_Review extends Mage_Core_Model_Resource_Db_Abstract
{
     public function _construct()
     {
         $this->_init('agil_reviews/review', 'id');
     }
}