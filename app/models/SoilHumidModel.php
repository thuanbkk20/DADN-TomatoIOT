<?php
/*
    Ke thua tu class Model
*/
class SoilHumidModel extends Model{
    private $_table = 'equipment'; 

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
        $data = $this->db->table('setting')->where('type','=',$type)->where($modeName,'=',$modeValue)->select('min_value')->getFirst()['min_value'];
        return $data;
    }

    function getMaxValue($type, $modeName, $modeValue){
        $data = $this->db->table('setting')->where('type','=',$type)->where($modeName,'=',$modeValue)->select('max_value')->getFirst()['max_value'];
        return $data;
    }

    function getEquipInfo($area, $type){
        $data = $this->db->table($this->_table)->where('area','=',$area)->where('type','=',$type)->getAll();
        return $data;
    }

    function getAllAreaId(){
        $data = $this->db->table('area')->select('id')->getAll();
        return $data;
    }
}