<?php

class temperature extends Controller{
    
    public $model, $data=[], $aio;
    public function __construct()
    {
        $this->model['TemperatureModel'] = $this->model("TemperatureModel"); 
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
        $request = new Request();
        if($request->isPost()){
            if(isset($_POST['updateMode'])){
                $fanMode = (int)$_POST['fanMode'];
                $this->db->query("UPDATE mode SET value ='".$fanMode."' WHERE id = '3';");

                $dayMode = $this->isDaytime();

                //Gửi dữ liệu về các mode lên adafruit
                $morningFeed = $this->aio->getFeed('morning','morning');
                $morningFeed->send($dayMode);

                $statusFeed = $this->aio->getFeed('status','status');
                //Do trên adafruitIO quy định chế độ bằng tay là 0  
                $statusFeed->send($fanMode);

                $message = "Bạn đã đổi chế độ thành công!";
                // Generate the JavaScript code for the popup alert
                echo "<script type='text/javascript'>alert('$message');</script>";
            }

            if(isset($_POST['updatefan'])){
                $value = (int)$_POST['fanLevel'];
                $this->db->query("UPDATE equipment SET level ='".$value."' WHERE id = '1';");

                //Gửi dữ liệu về mức của quạt máy lên AdaFruit
                $manualFeed = $this->aio->getFeed('manual','manual');
                $manualFeed ->send($value);

                $message = "Bạn đã thay đổi mức hoạt động của quạt máy thành công!";
                // Generate the JavaScript code for the popup alert
                echo "<script type='text/javascript'>alert('$message');</script>";
            }
        
        }

        //Lấy dữ liệu mới nhất từ server, lưu vào database
        $tempFeed = $this->aio->getFeed('TEMP','temp');
        $tempLastData = $tempFeed->getLastData();
        $tempLastUpdate = date('y/m/d H:i:s',strtotime($tempFeed->getLastUpdate()));

        $this->model['EnvModel']->addData(1,$tempLastUpdate,$tempLastData);

        //Lấy mode từ cơ sở dữ liệu:
        $query = $this->db->query("SELECT * FROM mode WHERE modeName = 'fanAutoMode'");
        $fanAutoMode = $query->fetchAll(PDO::FETCH_ASSOC)[0]['value'];
        //Nếu là auto mode
        if($fanAutoMode==1){
            $this->autoFan();
        }
        $query = $this->db->query("SELECT * FROM equipment WHERE id = 1");
        $fanLevel = $query->fetchAll(PDO::FETCH_ASSOC)[0]['level'];

        $this->data['sub_content']['temperature']['min_value'] = $this->model['SensorSetting']->getMinValue('temperature','day_mode',$this->isDaytime());
        $this->data['sub_content']['temperature']['max_value'] = $this->model['SensorSetting']->getMaxValue('temperature','day_mode',$this->isDaytime());
        $this->data['sub_content']['fanAutoMode'] = $fanAutoMode;
        $this->data['sub_content']['fanLevel'] = $fanLevel;

        $areaArr = $this->model['TemperatureModel']->getAllAreaId();
        foreach ($areaArr as $arae){
            $this->data['sub_content']['areaArr'][$arae['id']]['fan'] = $this->model['TemperatureModel']->getEquipInfo($arae['id'],'fan');
            $this->data['sub_content']['areaArr'][$arae['id']]['envIndex'] = $this->model['EnvModel']->getValue(1);
        }

        $this->data["content"] = 'manage/temperature';
        $this->render('layouts/basic_layout', $this->data);
    }

    public function autoFan(){
        $tempFeed = $this->aio->getFeed('TEMP','temp');
        $auto_fanFeed = $this->aio->getFeed('auto_fan','auto-fan');
        $max_value = $this->model['SensorSetting']->getMaxValue('temperature','day_mode',$this->isDaytime());

        $tempLastData = $tempFeed->getLastData();
        $tempLastUpdate = date('y/m/d H:i:s',strtotime($tempFeed->getLastUpdate()));
        //Cập nhật giá trị nhiệt độ gần nhất vào cơ sở dữ liệu
        $this->model['EnvModel']->addData(1,$tempLastUpdate,$tempLastData);
        if($tempLastData > $max_value){
            $auto_fanFeed->send(2);
            //Cập nhật mức quạt vào cơ sở dữ liệu
            $this->db->query("UPDATE equipment SET level ='2' WHERE id = '1';");
            $data['fanLevel'] = 2;
        }else{
            $auto_fanFeed->send(0);
            //Cập nhật mức quạt vào cơ sở dữ liệu
            $this->db->query("UPDATE equipment SET level ='0' WHERE id = '1';");
            $data['fanLevel'] = 0;
        }
        $data['temp'] = $tempLastData;
        file_put_contents(_DIR_ROOT.'/public/assets/json/temperature.json',json_encode($data,JSON_UNESCAPED_UNICODE));
    }

    public function isDaytime() {
        date_default_timezone_set('Asia/Ho_Chi_Minh'); // Đặt múi giờ theo định dạng của bạn
        $hour = (int) date('H'); // Lấy giờ hiện tại (định dạng 24 giờ)
        return ($hour >= 6 && $hour < 18)?1:0; // Kiểm tra xem giờ hiện tại có nằm trong khoảng thời gian ban ngày hay không
    }
}