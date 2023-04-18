<?php
/*
    Ke thua tu class Model
*/
class SensorSetting extends Model{
    private $_table = 'setting'; //Just an example

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

    function getMinValue($type, $modeName, $modeValue){
        $data = $this->db->table($this->_table)->where('type','=',$type)->where($modeName,'=',$modeValue)->select('min_value')->getFirst()['min_value'];
        return $data;
    }

    function getMaxValue($type, $modeName, $modeValue){
        $data = $this->db->table($this->_table)->where('type','=',$type)->where($modeName,'=',$modeValue)->select('max_value')->getFirst()['max_value'];
        return $data;
    }

    public function updateSetting($type, $modeName, $modeValue, $data){
        $this->db->table($this->_table)->where('type','=',$type)->where($modeName,'=',$modeValue)->update($data);
    }
}