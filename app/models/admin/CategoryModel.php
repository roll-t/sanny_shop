<?php

use JetBrains\PhpStorm\Internal\ReturnTypeContract;

class CategoryModel extends Model{
    private $__parent='ndm_id';
    
    function tableFill(){
        return 'danh_muc';
    }

    function fiedFill(){
        return '*';
    }
    
    function primaryKey(){
        return 'dm_id';
    } 

}