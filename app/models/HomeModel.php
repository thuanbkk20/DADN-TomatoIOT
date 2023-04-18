<?php
/*
    Ke thua tu class Model
*/
class HomeModel extends Model{
    private $_table = 'products'; //Just an example

    function __construct(){
        parent::__construct();
    }

    function tableFill(){
        return $this->_table;
    }

    function fieldFill()
    {
        return "*";
    }

    function primaryKey()
    {
        return "id";
    }
}