<?php
class ProductModel extends Model
{
    function tableFill()
    {
        return 'san_pham';
    }

    function fiedFill()
    {
        return '*';
    }
    
    function primaryKey()
    {
        return 'sp_id';
    }
    
    function list_product_display(){
        return $this->db->table($this->tableFill())
        ->join('ct_sanpham','ct_sanpham.sp_id=san_pham.sp_id')
        ->join('mau','ct_sanpham.m_id=mau.m_id')
        ->join('hinh_anh','hinh_anh.sp_id=san_pham.sp_id')
        ->join('kho','kho.sp_id=san_pham.sp_id')
        ->join('size','size.s_id=kho.s_id')
        ->where('kho.k_soluong','>',0)
        ->getValue();
    }

    function product_detail($id=0){
        $sql='SELECT * FROM san_pham as a 
        INNER JOIN ct_sanpham as b on a.sp_id=b.sp_id 
        INNER JOIN hinh_anh as c on a.sp_id=c.sp_id 
        INNER JOIN mau as d on b.m_id=d.m_id 
        where a.sp_id='.$id.'';
        $query=$this->db->query($sql);
        if(!empty($query)){
            return $query->fetch(PDO::FETCH_ASSOC);
        }else{
            return false;
        }
    }
}
