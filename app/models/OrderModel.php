<?php
class OrderModel extends Model{
    private $__table='san_pham';

    // phuong thức trù tượng
    function tableFill(){
        return 'san_pham';
    }

    function fiedFill(){
        return '*';
    }

    function primaryKey(){
        return 'sp_id';
    }
}