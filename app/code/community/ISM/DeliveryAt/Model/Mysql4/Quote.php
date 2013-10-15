<?php
class ISM_DeliveryAt_Model_Mysql4_Quote extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {
        $this->_init('deliveryat/quote_custom', 'id');
    }

    public function deteleByQuote($quote_id)
    {
        $table = $this->getMainTable();
        $where = $this->_getWriteAdapter()->quoteInto('quote_id = ?', $quote_id);
        $this->_getWriteAdapter()->delete($table, $where);
    }

    public function getByQuote($quote_id)
    {
        $table = $this->getMainTable();
        $where = $this->_getReadAdapter()->quoteInto('quote_id = ?', $quote_id);
        $sql = $this->_getReadAdapter()->select()->from($table)->where($where);
        $row = $this->_getReadAdapter()->fetchRow($sql);
        return $row;
    }
}