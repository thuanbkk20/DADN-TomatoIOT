<?php

class Home extends Controller{
    
    public $model_home, $data=[], $aio;
    public function __construct()
    {
        $this->model_home = $this->model("HomeModel"); 
        $this->aio = new AdaFruitIO('aio_odqH41vBFD0abG2KtfdrhwfzA8ex');
    }

    public function index(){
        $feedTest = $this->aio->getFeed('BBC_TEMP','bbc-temp');
        $this->data['sub_content']['feedLastData'] = $feedTest->getLastData();
        $this->data['sub_content']['feedLastUpdate'] = $feedTest->getLastUpdate();
        $this->data['sub_content']['page_title'] = "Dashboard";
        $this->data["content"] = 'dashboard/dashboard';
        $this->render('layouts/basic_layout', $this->data);
    }

    public function soilHumid(){
        $this->data['sub_content']['page_title'] = "Độ ẩm đất - Chi tiết";
        $this->data["content"] = 'dashboard/soilHumid';
        $this->render('layouts/basic_layout', $this->data);
    }

    public function airHumid(){
        $this->data['sub_content']['page_title'] = "Độ ẩm không khí - Chi tiết";
        $this->data["content"] = 'dashboard/airHumid';
        $this->render('layouts/basic_layout', $this->data);
    }

    public function temperature(){
        $this->data['sub_content']['page_title'] = "Nhiệt độ - Chi tiết";
        $this->data["content"] = 'dashboard/temperature';
        $this->render('layouts/basic_layout', $this->data);
    }

    public function light(){
        $this->data['sub_content']['page_title'] = "Ánh sáng - Chi tiết";
        $this->data["content"] = 'dashboard/light';
        $this->render('layouts/basic_layout', $this->data);
    }
}