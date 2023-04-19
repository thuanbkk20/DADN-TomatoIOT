<?php

class equipment extends Controller{
    
    public $model, $data=[], $aio;
    public function __construct()
    {
        $this->model['Log'] = $this->model('Log');
        $this->model['EnvModel'] = $this->model('EnvModel');
        $this->aio = new AdaFruitIO();
        $this->data['user'] = [];
        //Lấy user để hiện thông tin trên header
        if(Session::data('user_id')!=null){
            $this->db = new Database();
            $query = $this->db->query("SELECT * FROM user WHERE id = '".Session::data('user_id')."';");
            $this->data['user'] = $query->fetch(PDO::FETCH_ASSOC);
        }
    }

    public function index(){
        $air_humidFeed = $this->aio->getFeed('AIR_HUMID','air-humid');
        $lightFeed = $this->aio->getFeed('LIGHT','light');
        $soil_humidFeed = $this->aio->getFeed('SOIL_HUMID','soil-humid');
        $tempFeed = $this->aio->getFeed('TEMP','temp');

        $air_humidLastUpdate = date('Y-m-d H:i:s',strtotime($air_humidFeed->getLastUpdate()));
        $lightLastUpdate = date('Y-m-d H:i:s',strtotime($lightFeed->getLastUpdate()));
        $soil_humidLastUpdate = date('Y-m-d H:i:s',strtotime($soil_humidFeed->getLastUpdate()));
        $tempLastUpdate = date('Y-m-d H:i:s',strtotime($tempFeed->getLastUpdate()));

        $curTime = new DateTime();
        $sensor1Time = DateTime::createFromFormat('Y-m-d H:i:s', $tempLastUpdate);
        $interval = $curTime->diff($sensor1Time);
        $minutes = $interval->i + ($interval->h * 60);
        if($minutes<2){
            $this->data['sub_content']['sensor']['sensor1']['connect'] = 'Ổn định';
        }else{
            $this->data['sub_content']['sensor']['sensor1']['connect'] = 'Lỗi';
        }

        $sensor2Time = DateTime::createFromFormat('Y-m-d H:i:s', $lightLastUpdate );
        $interval = $curTime->diff($sensor2Time);
        $minutes = $interval->i + ($interval->h * 60);
        if($minutes<2){
            $this->data['sub_content']['sensor']['sensor2']['connect'] = 'Ổn định';
        }else{
            $this->data['sub_content']['sensor']['sensor2']['connect'] = 'Lỗi';
        }

        $sensor3Time = DateTime::createFromFormat('Y-m-d H:i:s', $air_humidLastUpdate);
        $interval = $curTime->diff($sensor3Time);
        $minutes = $interval->i + ($interval->h * 60);
        if($minutes<2){
            $this->data['sub_content']['sensor']['sensor3']['connect'] = 'Ổn định';
        }else{
            $this->data['sub_content']['sensor']['sensor3']['connect'] = 'Lỗi';
        }

        $sensor4Time = DateTime::createFromFormat('Y-m-d H:i:s', $soil_humidLastUpdate);
        $interval = $curTime->diff($sensor4Time);
        $minutes = $interval->i + ($interval->h * 60);
        if($minutes<2){
            $this->data['sub_content']['sensor']['sensor4']['connect'] = 'Ổn định';
        }else{
            $this->data['sub_content']['sensor']['sensor4']['connect'] = 'Lỗi';
        }

        $this->data['sub_content']['sensor']['sensor1']['time'] = $tempLastUpdate;
        $this->data['sub_content']['sensor']['sensor2']['time'] = $lightLastUpdate;
        $this->data['sub_content']['sensor']['sensor3']['time'] = $air_humidLastUpdate;
        $this->data['sub_content']['sensor']['sensor4']['time'] = $soil_humidLastUpdate;

        $this->data['sub_content']['sensor']['sensor1']['type'] = 'Nhiệt độ';
        $this->data['sub_content']['sensor']['sensor2']['type'] = 'Ánh sáng';
        $this->data['sub_content']['sensor']['sensor3']['type'] = 'Độ ẩm không khí';
        $this->data['sub_content']['sensor']['sensor4']['type'] = 'Độ ẩm đất';

        $this->data["content"] = 'equipment';
        $this->data["header_content"]["noti"] = $this->model['Log']->get4Log();
        $this->render('layouts/basic_layout', $this->data);
    }
}