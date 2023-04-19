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
        $query = $this->db->query("SELECT * FROM log ORDER BY id DESC LIMIT 20");
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        // $data = $this->db->select()->orderBy('id','DESC')->getAll();
        return $data;
    }

    public function addLog($mgs){
        $data['description'] = $mgs;
        $data['time'] = date('Y-m-d H:i:s');
        $this->db->table($this->_table)->insert($data);
    }

    public function get4Log(){
        $query = $this->db->query("SELECT * FROM log ORDER BY id DESC LIMIT 4");
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
}