<?php
class ISM_DeliveryAt_Model_Order extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('deliveryat/order');
    }

    public function deleteByOrder($order_id)
    {
        $this->_getResource()->deteleByOrder($order_id);
    }

    public function getByOrder($order_id)
    {
        return $this->_getResource()->getByOrder($order_id);
    }
}