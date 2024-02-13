<?php

class ImportDetailModel extends Model{
        
    function tableFill(){
        return 'ct_nhap';
    }

    function fiedFill(){
        return '*';
    }
    
    function primaryKey(){
        return 'n_id';
    } 
    
    function index(){
        echo 'hello';
    }
}