<?php
class ISM_News_Model_Mysql4_News extends Mage_Core_Model_Mysql4_Abstract
{
    protected function _construct()
    {
        $this->_init("news/news", "ism_id");
    }
}