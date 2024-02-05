<?php
class Account extends Controller{
    private $__data=[];

    function index(){
        $this->login();
    }

    function login(){

    }

    function sign_up(){
        $this->__data['content']='admin/account/sign_up';
        $this->view('layouts/client_layout',$this->__data);
    }
}