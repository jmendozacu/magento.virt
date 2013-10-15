<?php

class ISM_News_Model_News extends Mage_Core_Model_Abstract
{
    protected function _construct()
    {
       $this->_init("news/news");
    }

    public function getPublishedNews()
    {
        //$datasets = $this->getResourceCollection();
        $datasets = parent::getCollection();
        //Show published news only
        $datasets->addFieldToFilter('ism_published','1');

        return $datasets;
    }
    
    public function getOneNews($key='', $index=null)
    {
        $item = parent::getData($key, $index);
        //Show published news only
        if ($item['ism_published']) {
            return $item;
        }
        return false;
    }

}
	 