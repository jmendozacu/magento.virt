<?php
class ISM_News_Block_Adminhtml_News_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareLayout()
    {
        parent::_prepareLayout();
        if (Mage::getSingleton('cms/wysiwyg_config')->isEnabled()) {
            $this->getLayout()->getBlock('head')->setCanLoadTinyMce(true);
        }
    }

    protected function _prepareForm()
    {
        $form = new Varien_Data_Form();
        $this->setForm($form);
        $fieldset = $form->addFieldset("news_form", array("legend"=>Mage::helper("news")->__("News information")));

        $fieldset->addField("ism_title", "text", array(
        "label" => Mage::helper("news")->__("Title"),
        "name" => "ism_title",
        ));

        $fieldset->addField("ism_anounce", "textarea", array(
        "label" => Mage::helper("news")->__("Anounce"),
        "name" => "ism_anounce",
        ));

        $wysiwygConfig = Mage::getSingleton('cms/wysiwyg_config')->getConfig();
        $fieldset->addField("ism_content", "editor", array(
        "label" => Mage::helper("news")->__("Content"),
        "name" => "ism_content",
        //'style'     => 'width:600px; height:300px;',
        "config"    => $wysiwygConfig,
        "wysiwyg" => true,
        ));

        $dateFormatIso = Mage::app()->getLocale()->getDateTimeFormat(
                Mage_Core_Model_Locale::FORMAT_TYPE_SHORT
        );

        $fieldset->addField('ism_date', 'date', array(
        'label'        => Mage::helper('news')->__('Date'),
        'name'         => 'ism_date',
        'time' => true,
        'image'        => $this->getSkinUrl('images/grid-cal.gif'),
        'format'       => $dateFormatIso
        ));				
         $fieldset->addField('ism_published', 'select', array(
        'label'     => Mage::helper('news')->__('Published'),
        'values'   => ISM_News_Block_Adminhtml_News_Grid::getPublishedValue(),
        'name' => 'ism_published',
        ));

        if (Mage::getSingleton("adminhtml/session")->getNewsData())
        {
                $form->setValues(Mage::getSingleton("adminhtml/session")->getNewsData());
                Mage::getSingleton("adminhtml/session")->setNewsData(null);
        } 
        elseif(Mage::registry("news_data")) {
            $form->setValues(Mage::registry("news_data")->getData());
        }
        return parent::_prepareForm();
    }
}
