<?php


class DisplayModel extends Model{

    
    function tableFill(){
        return 'trung_bay';
    }

    function fiedFill(){
        return '*';
    }
    
    function primaryKey(){
        return 'sp_id';
    } 
    
}