<?php
class Home extends Controller{
    
    public $modelHome,$data;
    
    function __construct()
    {
        $this->modelHome=$this->model('HomeModel');
    }
    public function index(){
        $this->data['content']='client/home/home';
        $this->view('layouts/client_layout',$this->data);
    }
}   
