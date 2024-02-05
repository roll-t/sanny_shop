<?php
class Order extends Controller{
    private $__data=[];
    function __construct()
    {

    }

    function index(){
        echo 'hello';
    }

    function billing(){
        $this->__data['content']='admin/orders/billing';
        $this->view('layouts/admin_layout',$this->__data);
    }


}