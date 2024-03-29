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
        ->join("mau","mau.m_id=ct_sanpham.m_id")
        ->where('san_pham.sp_id','=',$id)->getValue();
    }

    function list_product_import($id=0){
        return $this->db->table($this->tableFill())
        ->join('ct_sanpham', 'san_pham.sp_id = ct_sanpham.sp_id')
        ->join('mau', 'ct_sanpham.m_id = mau.m_id')
        ->join('ct_size', 'san_pham.sp_id = ct_size.sp_id')
        ->join('size', 'size.s_id = ct_size.s_id')
        ->where('san_pham.sp_id', '=', $id)
        ->getValue();
    }

    function list_product_manage($number=5,$offset=1){
        return $this->db->table($this->tableFill())
            ->join('ct_sanpham', 'san_pham.sp_id = ct_sanpham.sp_id')
            ->join("danh_muc",'danh_muc.dm_id=san_pham.dm_id')
            ->join('mau', 'ct_sanpham.m_id = mau.m_id')
            ->join('kho','san_pham.sp_id=kho.sp_id')
            ->join('size', 'kho.s_id = size.s_id')
            ->limit($number,$offset)
            ->getValue();   
    }

    function list_product_manage_search($number=5,$offset=1,$search_value=false){
        return $this->db->table($this->tableFill())
            ->join('ct_sanpham', 'san_pham.sp_id = ct_sanpham.sp_id')
            ->join("danh_muc",'danh_muc.dm_id=san_pham.dm_id')
            ->join('mau', 'ct_sanpham.m_id = mau.m_id')
            ->whereLike('san_pham.sp_ten','%'.$search_value.'%')
            ->join('kho','san_pham.sp_id=kho.sp_id')
            ->join('size', 'kho.s_id = size.s_id')
            ->limit($number,$offset)
            ->getValue();   
    }
    
    function list_product_manage_category($number=5,$offset=1,$condition=false){
        return $this->db->table($this->tableFill())
            ->join('ct_sanpham', 'san_pham.sp_id = ct_sanpham.sp_id')
            ->join("danh_muc",'danh_muc.dm_id=san_pham.dm_id')
            ->join('mau', 'ct_sanpham.m_id = mau.m_id')
            ->join('kho','san_pham.sp_id=kho.sp_id')
            ->join('size', 'kho.s_id = size.s_id')
            ->where('danh_muc.dm_id','=',$condition)
            ->limit($number,$offset)
            ->getValue();   
    }
}