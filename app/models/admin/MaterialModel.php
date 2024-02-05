<?php

use JetBrains\PhpStorm\Internal\ReturnTypeContract;

class MaterialModel extends Model{

    private $__parent='ndm_id';
    
    function tableFill(){
        return 'chat_lieu';
    }

    function fiedFill(){
        return '*';
    }
    
    function primaryKey(){
        return 'cl_id';
    } 
}