<?php
class ISM_DeliveryAt_Block_Adminhtml_Order extends Mage_Adminhtml_Block_Sales_Order_Abstract
{
    public function getDeliveryAt()
    {
        $model = Mage::getModel('deliveryat/order');
        $deliveryat = $model->getByOrder($this->getOrder()->getId());
        return $deliveryat['value'];
    }
}