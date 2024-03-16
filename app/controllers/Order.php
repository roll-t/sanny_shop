<?php

class Order extends Controller
{
    private $__data = [];
    private $__model;
    private $__root_page = 'client/orders/';
    private $__root_view = 'layouts/client_layout_single';

    function index()
    {
        $this->__model['img'] = $this->model('imgModel');
        $this->__model['product'] = $this->model('productModel');
        $this->__model['product'] = $this->model('productModel');

        $order=[];
        $shipment_pay=35000;
        $total=0;
        $payment=[];
        if(!empty($_POST)){
            for($i=0;$i<count($_POST['id']);$i++){
                $product=[
                    'id'=>$_POST['id'][$i],
                    'quantity'=>$_POST['quantity'][$i],
                    'size'=>$_POST['size'][$i],
                    'product_info'=> $this->__model['product']->find($_POST['id'][$i]),
                    'img'=>!empty($this->__model['img']->find($_POST['id'][$i]))?$this->__model['img']->find($_POST['id'][$i])['avatar']:""
                ];
                if(!empty($product['product_info'])){
                    $total+=($product['product_info']['sp_gia']*$_POST['quantity'][$i]);
                    array_push($order,$product);
                }
            }
        }

        $final_total=$total+$shipment_pay;
        $payment['final_total']=$final_total;
        $payment['shipment_pay']=$shipment_pay;
        $payment['total']=$total;

        $this->__data['sub_content']['orders']=$order;
        $this->__data['sub_content']['payment']=$payment;
        $this->render_view('index');
    }

    function render_view($page = '')
    {
        $this->__data['content'] = $this->__root_page . $page;
        $this->view($this->__root_view, $this->__data);
    }
    function add_address(){
        $this->render_view();
    }

}
