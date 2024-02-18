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
    
    function index(){
        echo 'hello';
    }
    
    function find_imported($product_id='',$size_id='',$color_id=''){
        return $this->db->table($this-> tableFill())
        ->where('sp_id','=',$product_id)
        ->where('m_id','=',$color_id)
        ->where('s_id','=',$size_id)
        ->getValue();
    }
}