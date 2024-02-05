<?php

use JetBrains\PhpStorm\Internal\ReturnTypeContract;

class ColorModel extends Model{

    private $__parent='ndm_id';
    
    function tableFill(){
        return 'mau';
    }

    function fiedFill(){
        return '*';
    }
    
    function primaryKey(){
        return 'm_id';
    } 
    
}