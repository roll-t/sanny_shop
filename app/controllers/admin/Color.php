<?php
class Color extends Controller{
    private $__data=[];
    private $__model;

    function __construct()
    {
        $this->__model=$this->model('admin/colorModel');
    }

    function index(){
        $this->list_color();
    }

    function add(){
        $this->__model->add($_POST);
    }

    function delete(){
        $this->__model->delete($_GET['id']);
    }

    function list_color(){
        $this->__data['content']='admin/products/color';
        $this->__data['sub_content']['list_color']=$this->__model->list();
        $this->__data['sub_content']['modal_data']['title_page']='color';
        $this->view('layouts/admin_layout',$this->__data);
    }
    function edit(){
        $id=$_POST['m_id'];
        $this->__model->edit($_POST,$id);
    }
}