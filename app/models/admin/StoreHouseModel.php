<?php

class StoreHouseModel extends Model
{
    function tableFill()
    {
        return 'kho';
    }

    function fiedFill()
    {
        return '*';
    }

    function primaryKey()
    {
        return 'sp_id';
    }

    function update_storeHouese($sp_id = '', $s_id = '', $k_soluong = 0)
    {

        // Chuẩn bị câu lệnh SQL với tham số được ràng buộc để tránh tấn công SQL injection
        $sql = 'UPDATE kho SET K_soluong = '.$k_soluong.' WHERE sp_id = '.$sp_id.' AND s_id = '.$s_id.'';
        return $this->db->query($sql);
        
    }
}
