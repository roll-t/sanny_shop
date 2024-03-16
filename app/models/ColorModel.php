<?php
class ColorModel extends Model
{
    function tableFill()
    {
        return 'mau';
    }

    function fiedFill()
    {
        return '*';
    }

    function primaryKey()
    {
        return 'm_id';
    }
}
