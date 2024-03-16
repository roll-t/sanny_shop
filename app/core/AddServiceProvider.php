<?php
class AddServiceProvider extends ServiceProvider{
    public function boot(){
        if(!empty($_COOKIE['sany_account'])){
            $acc=json_decode($_COOKIE['sany_account']);
            $id=$acc->kh_id;
            $value=$this->db->table('khach_hang')->where('kh_id','=',$id)->first();
            $data_2['user_login']=$value[0];
            View::share($data_2);
        }
    }
}