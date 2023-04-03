<?php

class Home extends Controller{
    
    public $model_home, $data=[];
    public function __construct()
    {
        $this->model_home = $this->model("HomeModel"); 
    }

    public function index(){
        $this->data['sub_content']['page_title'] = "Dashboard";
        // $this->data['sub_content']['product_list'] = $this->model_home->All();
        $this->data["content"] = 'dashboard/dashboard';
        $this->render('layouts/basic_layout', $this->data);
    }

    public function soilHumid(){
        $this->data['sub_content']['page_title'] = "Độ ẩm đất - Chi tiết";
        // $this->data['sub_content']['product_list'] = $this->model_home->All();
        $this->data["content"] = 'dashboard/soilHumid';
        $this->render('layouts/basic_layout', $this->data);
    }

    public function airHumid(){
        $this->data['sub_content']['page_title'] = "Độ ẩm không khí - Chi tiết";
        // $this->data['sub_content']['product_list'] = $this->model_home->All();
        $this->data["content"] = 'dashboard/airHumid';
        $this->render('layouts/basic_layout', $this->data);
    }

    public function temperature(){
        $this->data['sub_content']['page_title'] = "Nhiệt độ - Chi tiết";
        // $this->data['sub_content']['product_list'] = $this->model_home->All();
        $this->data["content"] = 'dashboard/temperature';
        $this->render('layouts/basic_layout', $this->data);
    }

    public function light(){
        $this->data['sub_content']['page_title'] = "Ánh sáng - Chi tiết";
        // $this->data['sub_content']['product_list'] = $this->model_home->All();
        $this->data["content"] = 'dashboard/light';
        $this->render('layouts/basic_layout', $this->data);
    }

    public function get_user(){
        $this->data['errors'] = Session::Flash('errors');
        $this->data['msg'] = Session::Flash('msg');
        $this->data['old'] = Session::Flash('old');
        $this->render("users/add", $this->data);
    }
}