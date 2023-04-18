<?php

class home extends Controller{
    
    public $model, $data=[], $aio;
    public function __construct()
    {
        $this->model['EnvModel'] = $this->model("EnvModel"); 
        $this->model['SensorSetting'] = $this->model("SensorSetting");
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
        //Lay cac feed tu adafruitIO
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
        //Che do dieu khien bang tay (0;1;2;3;4;5;6) 3: tắt cả quat va may bom ;quạt(0-2);bơm(4-6)
        $manualFeed = $this->aio->getFeed('manual','manual');
        //Thay doi giua che do bang tay va auto (0 la che do bang tay)
        $statusFeed = $this->aio->getFeed('status','status');

        //Lưu trữ dữ liệu từ các feed vào database và render ra view:
        $air_humidLastData = $air_humidFeed->getLastData();
        $air_humidLastUpdate = date('y/m/d H:i:s',strtotime($air_humidFeed->getLastUpdate()));
        $lightLastData = $lightFeed->getLastData();
        $lightLastUpdate = date('y/m/d H:i:s',strtotime($lightFeed->getLastUpdate()));
        $soil_humidLastData = $soil_humidFeed->getLastData();
        $soil_humidLastUpdate = date('y/m/d H:i:s',strtotime($soil_humidFeed->getLastUpdate()));
        $tempLastData = $tempFeed->getLastData();
        $tempLastUpdate = date('y/m/d H:i:s',strtotime($tempFeed->getLastUpdate()));

        //Lưu vào database
        $this->model['EnvModel']->addData(1,$tempLastUpdate,$tempLastData);
        $this->model['EnvModel']->addData(2,$lightLastUpdate,$lightLastData);
        $this->model['EnvModel']->addData(3,$air_humidLastUpdate,$air_humidLastData);
        $this->model['EnvModel']->addData(4,$soil_humidLastUpdate,$soil_humidLastData);
        
        //Dữ liệu để render ra dashboard
        $this->data['sub_content']['air_humidLastData'] = $air_humidLastData;
        $this->data['sub_content']['air_humidLastUpdate'] = $air_humidLastUpdate;
        $this->data['sub_content']['lightLastData'] = $lightLastData;
        $this->data['sub_content']['lightLastUpdate'] = $lightLastUpdate;
        $this->data['sub_content']['soil_humidLastData'] = $soil_humidLastData;
        $this->data['sub_content']['soil_humidLastUpdate'] = $soil_humidLastUpdate;
        $this->data['sub_content']['tempLastData'] =  $tempLastData;
        $this->data['sub_content']['tempLastUpdate'] = $tempLastUpdate;

        //Lấy cận trên và cận dưới của các trường dữ liệu:
            //Check xem chế độ còn xanh và thời gian ban ngày hay ban đêm
        $query = $this->db->query("SELECT * FROM mode WHERE modeName = 'greenMode'");
        $greenMode = $query->fetchAll(PDO::FETCH_ASSOC)[0]['value'];
        $isDayTime = $this->isDaytime();
        $this->data['sub_content']['air_humid']['min_value'] = $this->model['SensorSetting']->getMinValue('air_humid','day_mode',0);
        $this->data['sub_content']['air_humid']['max_value'] = $this->model['SensorSetting']->getMaxValue('air_humid','day_mode',0);
        $this->data['sub_content']['soil_humid']['min_value'] = $this->model['SensorSetting']->getMinValue('soil_humid','green_mode',$greenMode);
        $this->data['sub_content']['soil_humid']['max_value'] = $this->model['SensorSetting']->getMaxValue('soil_humid','green_mode',$greenMode);
        $this->data['sub_content']['temperature']['min_value'] = $this->model['SensorSetting']->getMinValue('temperature','day_mode',$isDayTime);
        $this->data['sub_content']['temperature']['max_value'] = $this->model['SensorSetting']->getMaxValue('temperature','day_mode',$isDayTime);
        $this->data['sub_content']['light']['min_value'] = $this->model['SensorSetting']->getMinValue('light','day_mode',0);
        $this->data['sub_content']['light']['max_value'] = $this->model['SensorSetting']->getMaxValue('light','day_mode',0);

        $this->data['sub_content']['page_title'] = "Dashboard";
        $this->data["content"] = 'dashboard/dashboard';

        $this->render('layouts/basic_layout', $this->data);
    }

    // public function device_notify(){
    //     $this->data['sub_content']['page_title'] = "Thiết bị - Chi tiết";
    //     $this->data["content"] = 'dashboard/device_notify';
    //     $this->render('layouts/basic_layout', $this->data);
    // }

    // public function device_manage(){
    //     $this->data['sub_content']['page_title'] = "Thiết bị - Chi tiết";
    //     $this->data["content"] = 'dashboard/device_manage';
    //     $this->render('layouts/basic_layout', $this->data);
    // }
    // public function setting(){
    //     $this->data['sub_content']['page_title'] = "Cài đặt - Chi tiết";
    //     $this->data["content"] = 'dashboard/setting';
    //     $this->render('layouts/basic_layout', $this->data);
    // }
    // public function account(){
    //     $this->data['sub_content']['page_title'] = "Tài khoản - Chi tiết";
    //     $this->data["content"] = 'dashboard/account';
    //     $this->render('layouts/basic_layout', $this->data);
    // }
    // public function history(){
    //     $this->data['sub_content']['page_title'] = "Lịch sử - Chi tiết";
    //     $this->data["content"] = 'dashboard/history';
    //     $this->render('layouts/basic_layout', $this->data);
    // }

    //

    //Check xem có phải là ban ngày không
    public function isDaytime() {
        date_default_timezone_set('Asia/Ho_Chi_Minh'); // Đặt múi giờ theo định dạng của bạn
        $hour = (int) date('H'); // Lấy giờ hiện tại (định dạng 24 giờ)
        return ($hour >= 6 && $hour < 18)?1:0; // Kiểm tra xem giờ hiện tại có nằm trong khoảng thời gian ban ngày hay không
    }  
}