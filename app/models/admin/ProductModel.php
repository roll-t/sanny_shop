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

    function list_product($number=5,$offset=1){
       return $this->db->table($this->tableFill())
       ->join('hinh_anh','hinh_anh.sp_id = san_pham.sp_id')
       ->join('danh_muc','san_pham.dm_id=danh_muc.dm_id')
       ->orderBy('san_pham.sp_id','DESC')
       ->limit($number,$offset)
       ->getValue();
    }


    function list_product_category($number=5,$offset=1,$condition=false){
        if($condition){
            return $this->db->table($this->tableFill())
            ->join('hinh_anh','hinh_anh.sp_id = san_pham.sp_id')
            ->join('danh_muc','san_pham.dm_id=danh_muc.dm_id')
            ->where('danh_muc.dm_id','=',$condition)
            ->orderBy('san_pham.sp_id','DESC')
            ->limit($number,$offset)
            ->getValue();
        }
    }
    function list_product_search($number=5,$offset=1,$search_value=false){
        if($search_value){
            return $this->db->table($this->tableFill())
            ->join('hinh_anh','hinh_anh.sp_id = san_pham.sp_id')
            ->join('danh_muc','san_pham.dm_id=danh_muc.dm_id')
            ->whereLike('san_pham.sp_ten','%'.$search_value.'%')
            ->orderBy('san_pham.sp_id','DESC')
            ->limit($number,$offset)
            ->getValue();
        }
    }

    function get_product($id=0){
        return $this->db->table($this->tableFill())
        ->join('hinh_anh','hinh_anh.sp_id = san_pham.sp_id')
        ->join('danh_muc',"danh_muc.dm_id=san_pham.dm_id")
        ->join('ct_sanpham',"san_pham.sp_id=ct_sanpham.sp_id")
        ->join("chat_lieu","chat_lieu.cl_id=ct_sanpham.cl_id")
        ->where('san_pham.sp_id','=',$id)->getValue();
    }

    function list_product_import($id=0){
        return $this->db->table($this->tableFill())
        ->join('ct_sanpham', 'san_pham.sp_id = ct_sanpham.sp_id')
        ->join('ct_mau', 'san_pham.sp_id = ct_mau.sp_id')
        ->join('mau', 'ct_mau.m_id = mau.m_id')
        ->join('ct_size', 'san_pham.sp_id = ct_size.sp_id')
        ->join('size', 'size.s_id = ct_size.s_id')
        ->where('san_pham.sp_id', '=', $id)
        ->getValue();
    }

    function list_product_manage(){
        return $this->db->table($this->tableFill())
            ->join('ct_sanpham', 'san_pham.sp_id = ct_sanpham.sp_id')
            ->join('ct_mau', 'san_pham.sp_id = ct_mau.sp_id')
            ->join('mau', 'ct_mau.m_id = mau.m_id')
            ->join('ct_size', 'san_pham.sp_id = ct_size.sp_id')
            ->join('size', 'size.s_id = ct_size.s_id')
            ->join('ct_nhap','ct_nhap.sp_id=san_pham.sp_id and ct_nhap.m_id=mau.m_id and ct_nhap.s_id=size.s_id')
            ->join('kho','kho.k_id=ct_nhap.k_id')
            ->orderBy('san_pham.sp_id','DESC')
            ->getValue();   
    }

}