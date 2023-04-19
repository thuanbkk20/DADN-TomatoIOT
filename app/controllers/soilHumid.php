<?php

class soilHumid extends Controller{
    
    public $model, $data=[], $aio;
    public function __construct()
    {
        $this->model['SoilHumidModel'] = $this->model("SoilHumidModel"); 
        $this->model['EnvModel'] = $this->model("EnvModel");
        $this->model['SensorSetting'] = $this->model("SensorSetting");
        $this->model['Log'] = $this->model("Log");
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
                $greenMode = (int)$_POST['valueMode'];
                $this->db->query("UPDATE mode SET value ='".$greenMode."' WHERE id = '1';");

                $pumpMode = (int)$_POST['pumpMode'];
                $this->db->query("UPDATE mode SET value ='".$pumpMode."' WHERE id = '2';");

                //Gửi dữ liệu về các mode lên adafruit
                $greenFeed = $this->aio->getFeed('green','green');
                $greenFeed->send($greenMode);

                $statusFeed = $this->aio->getFeed('status','status');
                //Do trên adafruitIO quy định chế độ bằng tay là 0  
                $statusFeed->send($pumpMode);

                $message = "Bạn đã đổi chế độ thành công!";
                // Generate the JavaScript code for the popup alert
                echo "<script type='text/javascript'>alert('$message');</script>";
            }

            if(isset($_POST['updatePump'])){
                $value = (int)$_POST['pumpLevel'];
                $this->db->query("UPDATE equipment SET level ='".$value."' WHERE id = '2';");

                //Gửi dữ liệu về mức của máy bơm lên AdaFruit
                $manualFeed = $this->aio->getFeed('manual','manual');
                $manualFeed ->send($value+4);

                $message = "Bạn đã thay đổi mức hoạt động của máy bơm thành công!";
                // Generate the JavaScript code for the popup alert
                echo "<script type='text/javascript'>alert('$message');</script>";
            }
        
        }
        //Lấy dữ liệu mới nhất từ server và lưu vào database
        $soil_humidFeed = $this->aio->getFeed('SOIL_HUMID','soil-humid');
        $soil_humidLastData = $soil_humidFeed->getLastData();
        $soil_humidLastUpdate = date('y/m/d H:i:s',strtotime($soil_humidFeed->getLastUpdate()));

        $this->model['EnvModel']->addData(4,$soil_humidLastUpdate,$soil_humidLastData);

        //Lấy mode từ cơ sở dữ liệu:
        $query = $this->db->query("SELECT * FROM mode WHERE modeName = 'greenMode'");
        $greenMode = $query->fetchAll(PDO::FETCH_ASSOC)[0]['value'];
        $query = $this->db->query("SELECT * FROM mode WHERE modeName = 'pumpAutoMode'");
        $pumpAutoMode = $query->fetchAll(PDO::FETCH_ASSOC)[0]['value'];

        //Nếu là autoMode
        if($pumpAutoMode==1){
            $this->autoPump();
        }

        $query = $this->db->query("SELECT * FROM equipment WHERE id = 2");
        $pumpLevel = $query->fetchAll(PDO::FETCH_ASSOC)[0]['level'];
        $this->data['sub_content']['soilHumid']['min_value'] = $this->model['SensorSetting']->getMinValue('soil_humid','green_mode',$greenMode);
        $this->data['sub_content']['soilHumid']['max_value'] = $this->model['SensorSetting']->getMaxValue('soil_humid','green_mode',$greenMode);
        $this->data['sub_content']['pumpAutoMode'] = $pumpAutoMode;
        $this->data['sub_content']['pumpLevel'] = $pumpLevel;

        $areaArr = $this->model['SoilHumidModel']->getAllAreaId();
        foreach ($areaArr as $arae){
            $this->data['sub_content']['areaArr'][$arae['id']]['pump'] = $this->model['SoilHumidModel']->getEquipInfo($arae['id'],'pump');
            $this->data['sub_content']['areaArr'][$arae['id']]['envIndex'] = $this->model['EnvModel']->getValue(4);
        }

        $this->data["content"] = 'manage/soilHumid';
        $this->data["header_content"]["noti"] = $this->model['Log']->get4Log();
        $this->render('layouts/basic_layout', $this->data);
    }

    public function autoPump(){
        $soil_humidFeed = $this->aio->getFeed('SOIL_HUMID','soil-humid');
        $auto_pumpFeed = $this->aio->getFeed('auto_pump','auto-pump');

        $query = $this->db->query("SELECT * FROM mode WHERE modeName = 'greenMode'");
        $greenMode = $query->fetchAll(PDO::FETCH_ASSOC)[0]['value'];
        $min_value = $this->model['SensorSetting']->getMinValue('soil_humid','green_mode',$greenMode);

        $soil_humidLastData = $soil_humidFeed->getLastData();
        $soil_humidLastUpdate = date('y/m/d H:i:s',strtotime($soil_humidFeed->getLastUpdate()));
        //Cập nhật giá trị nhiệt độ gần nhất vào cơ sở dữ liệu
        $this->model['EnvModel']->addData(4,$soil_humidLastUpdate,$soil_humidLastData);

        //Lấy dữ mức quạt hiện tại
        $query = $this->db->query("SELECT * FROM equipment WHERE id = '2';");
        $currentLevel = $query->fetch(PDO::FETCH_ASSOC)['level'];
        if($soil_humidLastData < $min_value){
            $auto_pumpFeed->send(2);
            if($currentLevel!=2){
                //Cập nhật mức quạt vào cơ sở dữ liệu
                $this->db->query("UPDATE equipment SET level ='2' WHERE id = '2';");
                $data['pumpLevel'] = 2;
                //Thêm log
                $mgs = "Máy bơm 1 ở khu vực 1 đã tự động bật mức 2 do độ ẩm đất dưới ngưỡng";
                $this->model['Log']->addLog($mgs);
            }
        }else{
            $auto_pumpFeed->send(0);
            if($currentLevel!=0){
                //Cập nhật mức quạt vào cơ sở dữ liệu
                $this->db->query("UPDATE equipment SET level ='0' WHERE id = '2';");
                $data['pumpLevel'] = 0;
                //Thêm log
                $mgs = "Máy bơm 1 ở khu vực 1 đã tự động tắt do độ ẩm đất trở về mức bình thường";
                $this->model['Log']->addLog($mgs);
            }
        }
        $data['soilHumid'] = $soil_humidLastData;
        file_put_contents(_DIR_ROOT.'/public/assets/json/soilHumid.json',json_encode($data,JSON_UNESCAPED_UNICODE));
    }

}