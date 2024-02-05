<?php
class ColorDetailModel extends Model{
    
    function tableFill(){
        return 'ct_mau';
    }

    function fiedFill(){
        return '*';
    }
    
    function primaryKey(){
        return 'sp_id';
    } 

    function get_color_product($id=0){
        return $this->db->table($this->tableFill())->where('sp_id','=',$id)->getValue();
    }
}