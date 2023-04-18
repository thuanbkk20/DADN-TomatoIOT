<?php
/*
    Ke thua tu class Model
*/
class Log extends Model{
    private $_table = 'log'; //Just an example

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

    function getAll(){
        $data = $this->db->select()->orderBy('id','DESC')->getAll();
        return $data;
    }

    public function addLog($mgs){
        $data['description'] = $mgs;
        $data['time'] = date('Y-m-d H:i:s');
        $this->db->table($this->_table)->insert($data);
    }
}