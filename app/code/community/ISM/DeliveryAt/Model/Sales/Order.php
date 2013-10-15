<?php
class ISM_DeliveryAt_Model_Sales_Order extends Mage_Sales_Model_Order
{
    public function hasCustomFields()
    {
        $var = $this->getDeliveryat();
        if($var && !empty($var)){
            return true;
        }else{
            return false;
        }
    }
}