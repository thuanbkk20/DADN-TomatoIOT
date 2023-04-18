<?php
/*
    Ke thua tu class Model
*/
class EnvModel extends Model{
    private $_table = 'env_index'; 

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
        return "sensor_id";
    }

    function getValue($sensor_id){
        $query = $this->db->query("SELECT * FROM env_index WHERE sensor_id = $sensor_id ORDER BY id DESC");
        $data = $query->Fetch(PDO::FETCH_ASSOC);
        // $data = $this->db->table($this->_table)->where('sensor_id','=', $sensor_id)->orderBy('id')->getFirst();
        return $data;
    }

    function addData($sensorID, $time, $value){
        $data['sensor_id'] = $sensorID;
        $data['time'] = $time;
        $data['value'] = $value;
        $this->db->table($this->_table)->insert($data);
    }
}