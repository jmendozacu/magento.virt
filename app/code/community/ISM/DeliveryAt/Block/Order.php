<?php
class ISM_DeliveryAt_Block_Order extends Mage_Core_Block_Template
{
    public function getDeliveryAt()
    {
        $model = Mage::getModel('deliveryat/order');
        $deliveryat = $model->getByOrder($this->getOrder()->getId());
        return $deliveryat['value'];
    }

    public function getOrder()
    {
        return Mage::registry('current_order');
    }
}