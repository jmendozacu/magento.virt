<?php

class ISM_DeliveryAt_Model_Checkout_Type_Onepage extends Mage_Checkout_Model_Type_Onepage
{
        public function saveShipping($data, $customerAddressId)
    {
        //Проверка на правильность даты
        $min_date = strtotime(date("m/d/y",strtotime("+1 day")));
        $date = strtotime($data['deliveryat']);
        if ($min_date > $date) {
            return array('error' => 1, 'message' => Mage::helper('checkout')->__('Wrong delivery date'));
        }
        parent::saveShipping($data, $customerAddressId);
    }
}