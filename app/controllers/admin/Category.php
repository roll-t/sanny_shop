<?php
class Category extends Controller{
    private $__data=[];
    private $__model;

    function __construct()
    {
        $this->__model = $this->model('admin/CategoryModel');
    }
    
    function index()
    {
        $this->list_category();   
    }

    function list_category()
    {
        $this->__data['content']='admin/products/category';
        $this->__data['sub_content']['list_category']=$this->__model->list();
        $this->__data['sub_content']['modal_data']['title_page']='category';
        $this->view("layouts/admin_layout",$this->__data);
    }

    function add()
    {
        $this->__model->add($_POST);
    }

    function delete(){
        $id = !empty($_GET['id']) ? $_GET['id'] : 0;
        $this->__model->delete($id);
    }

    function edit(){
        $id =$_POST['dm_id'];
        $this->__model->edit($_POST,$id);
    }

}   