<?php

class Home extends Controller{
    
    public $model_home, $data=[], $aio;
    public function __construct()
    {
        $this->model_home = $this->model("HomeModel"); 
        $this->aio = new AdaFruitIO();
    }

    public function index(){
        $air_humidFeed = $this->aio->getFeed('AIR_HUMID','air-humid');
        $lightFeed = $this->aio->getFeed('LIGHT','light');
        $soil_humidFeed = $this->aio->getFeed('SOIL_HUMID','soil-humid');
        $tempFeed = $this->aio->getFeed('TEMP','temp');
        //Che do dieu khien quat auto (0;1;2)
        $auto_fanFeed = $this->aio->getFeed('auto_fan','auto-fan');
        //Che do dieu khien may bom auto (0;1;2)
        $auto_pumpFeed = $this->aio->getFeed('auto_pump','auto-pump');
        //Che do cay con xanh
        $greenFeed = $this->aio->getFeed('green','green');
        //Che do ngay dem
        $morningFeed = $this->aio->getFeed('morning','morning');
        //Che do dieu khien bang tay (0;1;2;3;4;5;6) 3: tat ca quat va may bom
        $manualFeed = $this->aio->getFeed('manual','manual');
        //Thay doi giua che do bang tay va auto (0 la che do bang tay)
        $status = $this->aio->getFeed('status','status');

        $this->data['sub_content']['air_humidLastData'] = $air_humidFeed->getLastData();
        $this->data['sub_content']['air_humidLastUpdate'] = $air_humidFeed->getLastUpdate();
        $this->data['sub_content']['lightLastData'] = $lightFeed->getLastData();
        $this->data['sub_content']['lightLastUpdate'] = $lightFeed->getLastUpdate();
        $this->data['sub_content']['soil_humidLastData'] = $soil_humidFeed->getLastData();
        $this->data['sub_content']['soil_humidLastUpdate'] = $soil_humidFeed->getLastUpdate();
        $this->data['sub_content']['tempLastData'] = $tempFeed->getLastData();
        $this->data['sub_content']['tempLastUpdate'] = $tempFeed->getLastUpdate();
        $this->data['sub_content']['page_title'] = "Dashboard";
        $this->data["content"] = 'dashboard/dashboard';

        // echo '<pre>'; print_r($this->data['sub_content']);echo '</pre>';

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

    public function device_notify(){
        $this->data['sub_content']['page_title'] = "Thiết bị - Chi tiết";
        $this->data["content"] = 'dashboard/device_notify';
        $this->render('layouts/basic_layout', $this->data);
    }

    public function device_manage(){
        $this->data['sub_content']['page_title'] = "Thiết bị - Chi tiết";
        $this->data["content"] = 'dashboard/device_manage';
        $this->render('layouts/basic_layout', $this->data);
    }
    public function setting(){
        $this->data['sub_content']['page_title'] = "Cài đặt - Chi tiết";
        $this->data["content"] = 'dashboard/setting';
        $this->render('layouts/basic_layout', $this->data);
    }
    public function account(){
        $this->data['sub_content']['page_title'] = "Tài khoản - Chi tiết";
        $this->data["content"] = 'dashboard/account';
        $this->render('layouts/basic_layout', $this->data);
    }
    public function history(){
        $this->data['sub_content']['page_title'] = "Lịch sử - Chi tiết";
        $this->data["content"] = 'dashboard/history';
        $this->render('layouts/basic_layout', $this->data);
    }
}