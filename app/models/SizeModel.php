<?php
class SizeModel extends Model{
    function tableFill()
    {
        return 'size';
    }

    function fiedFill()
    {
        return '*';
    }

    function primaryKey()
    {
        return 's_id';
    }

    function list_size($id){
        return $this->db->table($this->tableFill())
        ->join('ct_size','ct_size.s_id=size.s_id')
        ->where('ct_size.sp_id','=',$id)
        ->getValue();
    }
}