<?php

class home extends Controller{
    
    public $model, $data=[], $aio;
    public function __construct()
    {
        $this->model['EnvModel'] = $this->model("EnvModel"); 
        $this->model['SensorSetting'] = $this->model("SensorSetting");
        $this->model['Log'] = $this->model('Log');
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

        //Check xem chế độ của quạt và máy bơm có đang là auto hay không
        $query = $this->db->query("SELECT * FROM mode WHERE modeName = 'pumpAutoMode'");
        $pumpAutoMode = $query->fetchAll(PDO::FETCH_ASSOC)[0]['value'];

        $query = $this->db->query("SELECT * FROM mode WHERE modeName = 'fanAutoMode'");
        $fanAutoMode = $query->fetchAll(PDO::FETCH_ASSOC)[0]['value'];

        $this->data['sub_content']['air_humid']['min_value'] = $this->model['SensorSetting']->getMinValue('air_humid','day_mode',0);
        $this->data['sub_content']['air_humid']['max_value'] = $this->model['SensorSetting']->getMaxValue('air_humid','day_mode',0);
        $this->data['sub_content']['soil_humid']['min_value'] = $this->model['SensorSetting']->getMinValue('soil_humid','green_mode',$greenMode);
        $this->data['sub_content']['soil_humid']['max_value'] = $this->model['SensorSetting']->getMaxValue('soil_humid','green_mode',$greenMode);
        $this->data['sub_content']['temperature']['min_value'] = $this->model['SensorSetting']->getMinValue('temperature','day_mode',$isDayTime);
        $this->data['sub_content']['temperature']['max_value'] = $this->model['SensorSetting']->getMaxValue('temperature','day_mode',$isDayTime);
        $this->data['sub_content']['light']['min_value'] = $this->model['SensorSetting']->getMinValue('light','day_mode',0);
        $this->data['sub_content']['light']['max_value'] = $this->model['SensorSetting']->getMaxValue('light','day_mode',0);
        $this->data['sub_content']['pumpAutoMode'] = $pumpAutoMode;
        $this->data['sub_content']['fanAutoMode'] = $fanAutoMode;

        $this->data['sub_content']['page_title'] = "Dashboard";
        $this->data["content"] = 'dashboard/dashboard';
        $this->data["header_content"]["noti"] = $this->model['Log']->get4Log();
        $this->render('layouts/basic_layout', $this->data);
    }

    //Check xem có phải là ban ngày không
    public function isDaytime() {
        date_default_timezone_set('Asia/Ho_Chi_Minh'); // Đặt múi giờ theo định dạng của bạn
        $hour = (int) date('H'); // Lấy giờ hiện tại (định dạng 24 giờ)
        return ($hour >= 6 && $hour < 18)?1:0; // Kiểm tra xem giờ hiện tại có nằm trong khoảng thời gian ban ngày hay không
    }  

    public function autoLoadData(){
        $air_humidFeed = $this->aio->getFeed('AIR_HUMID','air-humid');
        $lightFeed = $this->aio->getFeed('LIGHT','light');
        $soil_humidFeed = $this->aio->getFeed('SOIL_HUMID','soil-humid');
        $tempFeed = $this->aio->getFeed('TEMP','temp');

        $air_humidLastData = $air_humidFeed->getLastData();
        $air_humidLastUpdate = date('y/m/d H:i:s',strtotime($air_humidFeed->getLastUpdate()));
        $lightLastData = $lightFeed->getLastData();
        $lightLastUpdate = date('y/m/d H:i:s',strtotime($lightFeed->getLastUpdate()));
        $soil_humidLastData = $soil_humidFeed->getLastData();
        $soil_humidLastUpdate = date('y/m/d H:i:s',strtotime($soil_humidFeed->getLastUpdate()));
        $tempLastData = $tempFeed->getLastData();
        $tempLastUpdate = date('y/m/d H:i:s',strtotime($tempFeed->getLastUpdate()));

        //Check xem chế độ còn xanh và thời gian ban ngày hay ban đêm
        $query = $this->db->query("SELECT * FROM mode WHERE modeName = 'greenMode'");
        $greenMode = $query->fetchAll(PDO::FETCH_ASSOC)[0]['value'];
        $isDayTime = $this->isDaytime();

        //Lưu vào database
        $this->model['EnvModel']->addData(1,$tempLastUpdate,$tempLastData);
        $this->model['EnvModel']->addData(2,$lightLastUpdate,$lightLastData);
        $this->model['EnvModel']->addData(3,$air_humidLastUpdate,$air_humidLastData);
        $this->model['EnvModel']->addData(4,$soil_humidLastUpdate,$soil_humidLastData);

        //Tạo file json
        $data['airHumid']['LastData'] = $air_humidLastData;
        $data['airHumid']['LastUpdate'] = $air_humidLastUpdate;

        $data['light']['LastData'] = $lightLastData;
        $data['light']['LastUpdate'] = $lightLastUpdate;

        $data['soilHumid']['LastData'] = $soil_humidLastData;
        $data['soilHumid']['LastUpdate'] = $soil_humidLastUpdate;

        $data['temperature']['LastData'] = $tempLastData;
        $data['temperature']['LastUpdate'] = $tempLastUpdate;

        $data['airHumid']['minValue'] = $this->model['SensorSetting']->getMinValue('air_humid','day_mode',0);
        $data['airHumid']['maxValue'] = $this->model['SensorSetting']->getMaxValue('air_humid','day_mode',0);

        $data['light']['minValue'] = $this->model['SensorSetting']->getMinValue('light','day_mode',0);
        $data['light']['maxValue'] = $this->model['SensorSetting']->getMaxValue('light','day_mode',0);

        $data['soilHumid']['minValue'] = $this->model['SensorSetting']->getMinValue('soil_humid','green_mode',$greenMode);
        $data['soilHumid']['maxValue'] = $this->model['SensorSetting']->getMaxValue('soil_humid','green_mode',$greenMode);

        $data['temperature']['minValue'] = $this->model['SensorSetting']->getMinValue('temperature','day_mode',$isDayTime);
        $data['temperature']['maxValue'] = $this->model['SensorSetting']->getMaxValue('temperature','day_mode',$isDayTime);

        //Check xem dữ liệu có vượt ngưỡng không, có thì lưu vào log
        if($air_humidLastData<$data['airHumid']['minValue']||$air_humidLastData>$data['airHumid']['maxValue']){
            $mgs = "Độ ẩm không khí tại khu vực 1 vượt ngưỡng bình thường, giá trị ".$air_humidLastData."% tại thời điểm ".$air_humidLastUpdate;
            $this->model['Log']->addLog($mgs);
        }
        if($lightLastData<$data['light']['minValue']||$lightLastData>$data['light']['maxValue']){
            $mgs = "Cường độ ánh sáng tại khu vực 1 vượt ngưỡng bình thường, giá trị ".$lightLastData." tại thời điểm ".$lightLastUpdate;
            $this->model['Log']->addLog($mgs);
        }
        if($soil_humidLastData<$data['soilHumid']['minValue']||$soil_humidLastData>$data['soilHumid']['maxValue']){
            $mgs = "Độ ẩm đất tại khu vực 1 vượt ngưỡng bình thường, giá trị ".$soil_humidLastData."% tại thời điểm ".$soil_humidLastUpdate;
            $this->model['Log']->addLog($mgs);
        }
        if($tempLastData<$data['temperature']['minValue']||$tempLastData>$data['temperature']['maxValue']){
            $mgs = "Nhiệt độ tại khu vực 1 vượt ngưỡng bình thường, giá trị ".$tempLastData."°C tại thời điểm ".$tempLastUpdate;
            $this->model['Log']->addLog($mgs);
        }

        file_put_contents(_DIR_ROOT.'/public/assets/json/envIndex.json',json_encode($data,JSON_UNESCAPED_UNICODE));
    }

    public function soilHumidChartData(){
        $data1 = [];
        $data2 = [];
        $date = '2023-04-24';
        // $date = date("Y-m-d");
        $data1 = $this->model['EnvModel']->getChartData(4,$date);
        $date = '2023-04-19';
        // $date = date("Y-m-d",strtotime("-1 days"));
        $data2 = $this->model['EnvModel']->getChartData(4,$date);
        file_put_contents(_DIR_ROOT.'/public/assets/json/soilHumidChart1.json',json_encode($data1,JSON_UNESCAPED_UNICODE));
        file_put_contents(_DIR_ROOT.'/public/assets/json/soilHumidChart2.json',json_encode($data2,JSON_UNESCAPED_UNICODE));
    }

    public function airHumidChartData(){
        $data1 = [];
        $data2 = [];
        $date = '2023-04-24';
        // $date = date("Y-m-d");
        $data1 = $this->model['EnvModel']->getChartData(3,$date);
        $date = '2023-04-19';
        // $date = date("Y-m-d",strtotime("-1 days"));
        $data2 = $this->model['EnvModel']->getChartData(3,$date);
        file_put_contents(_DIR_ROOT.'/public/assets/json/airHumidChart1.json',json_encode($data1,JSON_UNESCAPED_UNICODE));
        file_put_contents(_DIR_ROOT.'/public/assets/json/airHumidChart2.json',json_encode($data2,JSON_UNESCAPED_UNICODE));
    }

    public function tempChartData(){
        $data1 = [];
        $data2 = [];
        $date = '2023-04-24';
        // $date = date("Y-m-d");
        $data1 = $this->model['EnvModel']->getChartData(1,$date);
        $date = '2023-04-19';
        // $date = date("Y-m-d",strtotime("-1 days"));
        $data2 = $this->model['EnvModel']->getChartData(1,$date);
        file_put_contents(_DIR_ROOT.'/public/assets/json/tempHumidChart1.json',json_encode($data1,JSON_UNESCAPED_UNICODE));
        file_put_contents(_DIR_ROOT.'/public/assets/json/tempHumidChart2.json',json_encode($data2,JSON_UNESCAPED_UNICODE));
    }

    public function lightChartData(){
        $data1 = [];
        $data2 = [];
        $date = '2023-04-24';
        // $date = date("Y-m-d");
        $data1 = $this->model['EnvModel']->getChartData(2,$date);
        $date = '2023-04-19';
        // $date = date("Y-m-d",strtotime("-1 days"));
        $data2 = $this->model['EnvModel']->getChartData(2,$date);
        file_put_contents(_DIR_ROOT.'/public/assets/json/lightHumidChart1.json',json_encode($data1,JSON_UNESCAPED_UNICODE));
        file_put_contents(_DIR_ROOT.'/public/assets/json/lightHumidChart2.json',json_encode($data2,JSON_UNESCAPED_UNICODE));
    }

    public function autoAddLog(){
        $data = $this->model['Log']->get4Log();
        file_put_contents(_DIR_ROOT.'/public/assets/json/log.json',json_encode($data,JSON_UNESCAPED_UNICODE));
    }
}

