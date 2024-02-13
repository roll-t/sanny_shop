<?php

class ImportModel extends Model{

    function tableFill(){
        return 'nhap';
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