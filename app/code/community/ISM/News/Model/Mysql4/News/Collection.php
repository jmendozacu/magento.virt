<?php
class ISM_News_Model_Mysql4_News_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct(){
        $this->_init("news/news");
    }
}
	 