<?php
class Dashboard extends Controller{
    private $data;
    function index(){
        $this->data['content']='admin/home/dashboard';
        $this->view('layouts/admin_layout',$this->data);
    }
}