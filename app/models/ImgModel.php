<?php
class ImgModel extends Model
{
    function tableFill()
    {
        return 'hinh_anh';
    }

    function fiedFill()
    {
        return '*';
    }

    function primaryKey()
    {
        return 'sp_id';
    }


    function find_img($id=0){
        return $this->db->table($this->tableFill())
        ->join('mau','mau.m_id=hinh_anh.m_id')
        ->where('hinh_anh.sp_id','=',$id)
        ->getValue();
    }
}
