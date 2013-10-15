<?php
class ISM_DeliveryAt_Model_Quote extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('deliveryat/quote');
    }

    public function deteleByQuote($quote_id)
    {
        $this->_getResource()->deteleByQuote($quote_id);
    }

    public function getByQuote($quote_id)
    {
        return $this->_getResource()->getByQuote($quote_id);
    }
}