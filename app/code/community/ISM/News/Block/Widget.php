<?php
class ISM_News_Block_Widget extends Mage_Core_Block_Template
    implements Mage_Widget_Block_Interface
{
    protected $_max = 3;
    protected $_title = '';
     
    protected function _toHtml()
    {
//        var_dump($this->getData());
//        var_dump($this->getTemplate());
//        var_dump($this->getTemplateFile());

	$datasets=Mage::getModel('news/news')->getPublishedNews();
        $this->setDatasets($datasets);

        $this->_title = $this->getTitle();
        $this->_max = $this->getFormat();
         
        return parent::_toHtml();
    }
}
