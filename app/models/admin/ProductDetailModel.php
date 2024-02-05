<?php
class ProductDetailModel extends Model{

    function tableFill(){
        return 'ct_sanpham';
    }

    function fiedFill(){
        return '*';
    }
    
    function primaryKey(){
        return 'sp_id';
    } 
    
    function index(){
        echo 'hello';
    }
}