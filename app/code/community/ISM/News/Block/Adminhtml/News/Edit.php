<?php
	
class ISM_News_Block_Adminhtml_News_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
        $this->_objectId = "ism_id";
        $this->_blockGroup = "news";
        $this->_controller = "adminhtml_news";
        $this->_updateButton("save", "label", Mage::helper("news")->__("Save News"));
        $this->_updateButton("delete", "label", Mage::helper("news")->__("Delete News"));

        $this->_addButton("saveandcontinue", array(
                "label"     => Mage::helper("news")->__("Save And Continue Edit"),
                "onclick"   => "saveAndContinueEdit()",
                "class"     => "save",
        ), -100);

        $this->_formScripts[] = "function saveAndContinueEdit(){
                                        editForm.submit($('edit_form').action+'back/edit/');
                                }";
    }

    public function getHeaderText()
    {
        if( Mage::registry("news_data") && Mage::registry("news_data")->getId() ){
            return Mage::helper("news")->__("Edit News: '%s'", $this->htmlEscape(Mage::registry("news_data")->getId()));
        } 
        else{
             return Mage::helper("news")->__("Add Item");
        }
    }
}