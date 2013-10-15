<?php

class ISM_News_Block_Adminhtml_News_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

    public function __construct()
    {
        parent::__construct();
        $this->setId("newsGrid");
        $this->setDefaultSort("ism_id");
        $this->setDefaultDir("ASC");
        $this->setSaveParametersInSession(true);
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getModel("news/news")->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }
    
    protected function _prepareColumns()
    {
        $this->addColumn("ism_id", array(
        "header" => Mage::helper("news")->__("ID"),
        "align" =>"right",
        "width" => "50px",
        "type" => "number",
        "index" => "ism_id",
        ));

        $this->addColumn("ism_title", array(
        "header" => Mage::helper("news")->__("Title"),
        "index" => "ism_title",
        ));
        $this->addColumn("ism_content", array(
        "header" => Mage::helper("news")->__("Content"),
        "index" => "ism_content",
        ));
        $this->addColumn('ism_date', array(
                'header'    => Mage::helper('news')->__('Date'),
                'index'     => 'ism_date',
                'type'      => 'datetime',
        ));
        $this->addColumn('ism_published', array(
        'header' => Mage::helper('news')->__('Published'),
        'index' => 'ism_published',
        'type' => 'options',
        'options'=>ISM_News_Block_Adminhtml_News_Grid::getPublishedArray(),				
        ));

        $this->addExportType('*/*/exportExcel', Mage::helper('sales')->__('Excel'));

        return parent::_prepareColumns();
    }

    public function getRowUrl($row)
    {
       return $this->getUrl("*/*/edit", array("id" => $row->getId()));
    }

    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('ism_id');
        $this->getMassactionBlock()->setFormFieldName('ism_ids');
        $this->getMassactionBlock()->setUseSelectAll(true);
        $this->getMassactionBlock()->addItem('remove_news', array(
                         'label'=> Mage::helper('news')->__('Remove News'),
                         'url'  => $this->getUrl('*/adminhtml_news/massRemove'),
                         'confirm' => Mage::helper('news')->__('Are you sure?')
                ));
        return $this;
    }

    static public function getPublishedArray()
    {
        $data_array=array(); 
            $data_array[0]='No';
            $data_array[1]='Yes';
        return($data_array);
    }
    
    static public function getPublishedValue()
    {
        $data_array=array();
        foreach(ISM_News_Block_Adminhtml_News_Grid::getPublishedArray() as $k=>$v){
            $data_array[]=array('value'=>$k,'label'=>$v);		
        }
        return($data_array);

    }

}