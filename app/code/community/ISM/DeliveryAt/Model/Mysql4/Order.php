<?php
class ISM_DeliveryAt_Model_Mysql4_Order extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {
        $this->_init('deliveryat/order_custom', 'id');
    }

    public function deteleByOrder($order_id)
    {
        $table = $this->getMainTable();
        $where = $this->_getWriteAdapter()->quoteInto('order_id = ?', $order_id);
        $this->_getWriteAdapter()->delete($table, $where);
    }

    public function getByOrder($order_id)
    {
        $table = $this->getMainTable();
        $where = $this->_getReadAdapter()->quoteInto('order_id = ?', $order_id);
        $sql = $this->_getReadAdapter()->select()->from($table)->where($where);
        $row = $this->_getReadAdapter()->fetchRow($sql);
        return $row;
    }
}