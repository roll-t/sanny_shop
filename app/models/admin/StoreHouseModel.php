<?php

class StoreHouseModel extends Model{
    function tableFill(){
        return 'kho';
    }

    function fiedFill(){
        return '*';
    }
    
    function primaryKey(){
        return 'k_id';
    } 
    
    function index(){
        echo 'hello';
    }
}