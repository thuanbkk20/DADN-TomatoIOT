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

    function getSensorConnectInfo(){
        $query = $this->db->query("SELECT time FROM env_index WHERE sensor_id = 1 ORDER BY time DESC");
        $data['sensor1']['time'] = $query->fetch(PDO::FETCH_ASSOC)['time'];
        $query = $this->db->query("SELECT time FROM env_index WHERE sensor_id = 2 ORDER BY time DESC");
        $data['sensor2']['time'] = $query->fetch(PDO::FETCH_ASSOC)['time'];
        $query = $this->db->query("SELECT time FROM env_index WHERE sensor_id = 3 ORDER BY time DESC");
        $data['sensor3']['time'] = $query->fetch(PDO::FETCH_ASSOC)['time'];
        $query = $this->db->query("SELECT time FROM env_index WHERE sensor_id = 4 ORDER BY time DESC");
        $data['sensor4']['time'] = $query->fetch(PDO::FETCH_ASSOC)['time'];

        $curTime = new DateTime();

        $sensor1Time = DateTime::createFromFormat('Y-m-d H:i:s', $data['sensor1']['time'] );
        $interval = $curTime->diff($sensor1Time);
        $minutes = $interval->i + ($interval->h * 60);
        if($minutes>2){
            $data['sensor1']['connect'] = 'Ổn định';
        }else{
            $data['sensor1']['connect'] = 'Lỗi';
        }

        $sensor2Time = DateTime::createFromFormat('Y-m-d H:i:s', $data['sensor2']['time'] );
        $interval = $curTime->diff($sensor2Time);
        $minutes = $interval->i + ($interval->h * 60);
        if($minutes>2){
            $data['sensor2']['connect'] = 'Ổn định';
        }else{
            $data['sensor2']['connect'] = 'Lỗi';
        }

        $sensor3Time = DateTime::createFromFormat('Y-m-d H:i:s', $data['sensor3']['time'] );
        $interval = $curTime->diff($sensor3Time);
        $minutes = $interval->i + ($interval->h * 60);
        if($minutes>2){
            $data['sensor3']['connect'] = 'Ổn định';
        }else{
            $data['sensor3']['connect'] = 'Lỗi';
        }

        $sensor4Time = DateTime::createFromFormat('Y-m-d H:i:s', $data['sensor4']['time'] );
        $interval = $curTime->diff($sensor4Time);
        $minutes = $interval->i + ($interval->h * 60);
        if($minutes>2){
            $data['sensor4']['connect'] = 'Ổn định';
        }else{
            $data['sensor4']['connect'] = 'Lỗi';
        }
        return $data;
    }

    function getChartData($id, $date){
        $query = $this->db->query("SELECT * FROM tomatoiot.env_index WHERE sensor_id = '$id' AND CAST(time AS DATE) = '$date';");
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
}