<?php

class Notification extends Controller{
    private $__data=[];
    function index(){
        $this->__data['content']='admin/notifications/main';
        $this->view('layouts/admin_layout',$this->__data);
    }

}