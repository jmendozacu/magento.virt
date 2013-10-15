<?php
class ISM_DeliveryAt_Model_Observer
{
    public function saveQuoteBefore($evt)
    {
        $quote = $evt->getQuote();
        $data = Mage::app()->getFrontController()->getRequest()->getPost('shipping');
        if(isset($data['deliveryat'])){
            $var = $data['deliveryat'];
            $quote->setDeliveryat($var);
        }
    }
    
    public function saveQuoteAfter($evt)
    {
        $quote = $evt->getQuote();
        if($quote->getDeliveryat()){
            $var = $quote->getDeliveryat();
            if(!empty($var)){
                $model = Mage::getModel('deliveryat/quote');
                $model->deteleByQuote($quote->getId());
                $model->setQuoteId($quote->getId());
                $model->setValue($var);
                $model->save();
            }
        }
    }
    
    public function loadQuoteAfter($evt)
    {
        $quote = $evt->getQuote();
        $model = Mage::getModel('deliveryat/quote');
        $data = $model->getByQuote($quote->getId());
        $quote->setData('deliveryat', $data['value']);
    }
    
    public function saveOrderAfter($evt)
    {
        $order = $evt->getOrder();
        $quote = $evt->getQuote();
        if($quote->getDeliveryat()){
            $var = $quote->getDeliveryat();
            if(!empty($var)){
                $model = Mage::getModel('deliveryat/order');
                $model->deleteByOrder($order->getId());
                $model->setOrderId($order->getId());
                $model->setValue($var);
                $order->setDeliveryat($var);
                $model->save();
            }
        }
    }
    
    public function loadOrderAfter($evt)
    {
        $order = $evt->getOrder();
        $model = Mage::getModel('deliveryat/order');
        $data = $model->getByOrder($order->getId());
        $order->setData('deliveryat', $data['value']);
    }
 
}
