<?php
class ImgModel extends Model{
    
    function tableFill(){
        return 'hinh_anh';
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