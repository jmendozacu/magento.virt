<?php
$installer = $this;
$installer->startSetup();
$sql=<<<SQLTEXT
create table ism_news(ism_id int not null auto_increment, ism_title char(255),
ism_anounce text,
ism_content text,
ism_date date,
ism_published char(3), primary key(ism_id))
ENGINE=InnoDB DEFAULT CHARSET=utf8;

SQLTEXT;

$installer->run($sql);
//demo 
//Mage::getModel('core/url_rewrite')->setId(null);
//demo 
$installer->endSetup();
	 