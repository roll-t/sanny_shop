<?php
class Product extends Controller
{

    private $__data = [];
    private $__model;
    private $__root_page = 'client/products/';
    private $__root_view = 'layouts/client_layout';

    function __construct()
    {
        $this->__model['product'] = $this->model('productModel');
    }


    function render_view($page = '')
    {
        $this->__data['content'] = $this->__root_page . $page;
        $this->view($this->__root_view, $this->__data);
    }

    function index()
    {
        $list_product= $this->list_product();
        $this->__data['sub_content']['data_product']['products'] = $list_product;
        $this->__data['sub_content']['data_product']['title'] = 'Mới Nhất';
        $this->render_view('index');    
    }

    function list_product()
    {
        $inputArray = $this->__model['product']->list_product_display();
        $outputArray = array();         
        // Loop through inputArray to group items by 'sp_id' and construct outputArray
        foreach ($inputArray as $item) {
            $sp_id = $item['sp_id'];
            // Check if the 'sp_id' exists in $outputArray
            if (!isset($outputArray[$sp_id])) {
                // If not, initialize it as an empty array
                $outputArray[$sp_id] = $item;
                // Initialize 'sizes' array for this 'sp_id'
                $outputArray[$sp_id]['sizes'] = array();
            }
            // Add 's_id' to the corresponding 'sp_id' in the 'sizes' array
            $outputArray[$sp_id]['sizes'][] = $item['s_ten'];
        }
        return $outputArray;
    }



    function product_detail(){
        $list_product=$this->list_product();
        $this->__model['size']=$this->model('sizeModel');
        $id=!empty($_GET['id'])?$_GET['id']:0;
        $list_size= $this->__model['size']->list_size($id);
        $detail= $this->__model['product']->product_detail($id);
        $this->__data['sub_content']['data_product']['title']='BEST SELLER';
        $this->__data['sub_content']['data_product']['products'] = $list_product;
        $this->__data['sub_content']['product_detail'] = $detail;
        $this->__data['sub_content']['list_size'] = $list_size;
        $this->render_view('product_detail');
    }
    
}
