<?php
class Material extends Controller{
    private $__model;
    private $__data=[];
    function __construct()
    {
        $this->__model= $this->model('admin/materialModel');
    }
    function index(){
        $this->__data['content']='admin/products/material';
        $this->__data['sub_content']['list_material']=$this->__model->list();
        $this->__data['sub_content']['modal_data']['title_page']='material';
        $this->view('layouts/admin_layout',$this->__data);
    }

    function add(){
        $this->__model->add($_POST);
    }
    function delete(){
        $this->__model->delete($_GET['id']);
    }
    function edit(){
        $id = $_POST['cl_id'];
        $this->__model->edit($_POST,$id);
    }
}