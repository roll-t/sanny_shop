<?php

class ProductModel extends Model{

    function tableFill(){
        return 'san_pham';
    }

    function fiedFill(){
        return '*';
    }

    function primaryKey(){
        return 'sp_id';
    }

    function list_product(){
       return $this->db->table($this->tableFill())->join('hinh_anh','hinh_anh.sp_id = san_pham.sp_id')->join('danh_muc','san_pham.dm_id=danh_muc.dm_id')->orderBy('san_pham.sp_id','DESC')->getValue();
    }

    function get_product($id=0){
        return $this->db->table($this->tableFill())
        ->join('hinh_anh','hinh_anh.sp_id = san_pham.sp_id')
        ->join('danh_muc',"danh_muc.dm_id=san_pham.dm_id")
        ->join('ct_sanpham',"san_pham.sp_id=ct_sanpham.sp_id")
        ->join("chat_lieu","chat_lieu.cl_id=ct_sanpham.cl_id")
        ->where('san_pham.sp_id','=',$id)->getValue();
    }
}