<?php
class SizeDetailModel extends Model{
    
    function tableFill(){
        return 'ct_size';
    }

    function fiedFill(){
        return '*';
    }
    
    function primaryKey(){
        return 'sp_id';
    } 

    function get_size_product($id){
        return $this->db->table($this->tableFill())->where($this->primaryKey(),'=',$id)->getValue();
    }
}