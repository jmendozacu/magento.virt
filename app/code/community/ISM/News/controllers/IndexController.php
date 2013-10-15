<?php
class ISM_News_IndexController extends Mage_Core_Controller_Front_Action
{
    public function IndexAction() {
      
      $this->loadLayout();   
      $this->getLayout()->getBlock("head")->setTitle($this->__("News"));
      $breadcrumbs = $this->getLayout()->getBlock("breadcrumbs");
      $breadcrumbs->addCrumb("home", array(
            "label" => $this->__("Home Page"),
            "title" => $this->__("Home Page"),
            "link"  => Mage::getBaseUrl()
               ));

      $breadcrumbs->addCrumb("news", array(
            "label" => $this->__("News"),
            "title" => $this->__("News")
               ));

      $list = Mage::getModel('news/news')
              ->getPublishedNews();
      Mage::register('list', $list);

      $this->renderLayout(); 
	  
    }
    
    public function viewAction()
    {
        $news_id = (int) $this->getRequest()->getParam('id');
        if ($news_id) {
            $news = Mage::getModel('news/news')
                    ->load($news_id)
                    ->getOneNews();
        } else {
            $news = null;
        }
        if ($news) {
            Mage::register('news', $news);
            $this->loadLayout();
            $this->renderLayout();
        } else {
            $this->getResponse()->setHeader('HTTP/1.1','404 Not Found');
            $this->getResponse()->setHeader('Status','404 File not found');
            $this->_forward('defaultNoRoute');
        }
    }
    
}