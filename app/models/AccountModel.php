<?php

class AccountModel extends Model{
    
    function tableFill(){
        return 'khach_hang';
    }

    function fiedFill(){
        return '*';
    }

    function primaryKey(){
        return 'kh_id';
    }
    function find_account($name=''){
        return $this->db->table($this->tableFill())->where('kh_taikhoan','=',$name)->getValue();
    }
}