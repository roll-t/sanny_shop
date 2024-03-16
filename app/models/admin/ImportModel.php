<?php

class ImportModel extends Model{

    function tableFill(){
        return 'nhap';
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
    
    function list_import_history($number=5,$offset=1){
        return $this->db->table($this->tableFill())
        ->orderBy('n_id','DESC')
        ->limit($number,$offset)
        ->getValue();
    }

    function list_import_history_search($number=5,$offset=1,$search_value=""){
        return $this->db->table($this->tableFill())
        ->orderBy('n_id','DESC')
        ->whereLike('n_id','%'.$search_value.'%')
        ->limit($number,$offset)
        ->getValue();
    }

    

    function list_import_history_date($number=5,$offset=1,$from="",$to=""){
        return $this->db->table($this->tableFill())
        ->orderBy('n_id','DESC')
        ->where('ngaynhap','>=',$from)
        ->where('ngaynhap','<=',$to)
        ->limit($number,$offset)
        ->getValue();
    }


    function get_detail($id=0){
        return $this->db->table($this->tableFill())
        ->join('ct_nhap','ct_nhap.n_id=nhap.n_id')
        ->join('size','size.s_id=ct_nhap.s_id')
        ->join('san_pham','ct_nhap.sp_id=san_pham.sp_id')
        ->join('ct_sanpham','ct_sanpham.sp_id=san_pham.sp_id')
        ->join('mau','mau.m_id=ct_sanpham.m_id')
        ->where('nhap.n_id','=',$id)    
        ->getValue();
    }


}