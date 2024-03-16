<?php

class ImportDetailModel extends Model{
        
    function tableFill(){
        return 'ct_nhap';
    }

    function fiedFill(){
        return '*';
    }
    
    function primaryKey(){
        return 'n_id';
    } 
    
    
    function find_imported($product_id='',$size_id=''){
        return $this->db->table($this-> tableFill())
        ->where('sp_id','=',$product_id)
        ->where('s_id','=',$size_id)
        ->getValue();
    }
}