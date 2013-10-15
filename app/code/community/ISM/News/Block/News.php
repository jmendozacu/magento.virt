<?php   
class ISM_News_Block_News extends Mage_Core_Block_Template{   
    
    public function __construct()
    {
        parent::__construct();
	$datasets=Mage::getModel('news/news')->getPublishedNews();
        $this->setDatasets($datasets);
    }

    protected function _prepareLayout()
    {
        parent::_prepareLayout();
        $pager = $this->getLayout()->createBlock('page/html_pager')->setCollection($this->getDatasets());
        $this->setChild('pager', $pager);
        $this->getDatasets()->load();
        return $this;
    }

    public function getPagerHtml()
    {
        return $this->getChildHtml('pager');
    }

    public function getNews()
    {
        if (!$this->hasData('news')) {
            $this->setData('news', Mage::registry('news'));
        }
        return $this->getData('news');
    }

    public function getNewsList()
    {
        if (!$this->hasData('list')) {
            $this->setData('list', Mage::registry('list'));
        }
        return $this->getData('list');
    }

}