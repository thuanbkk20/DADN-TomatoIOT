<?php

class setting extends Controller{
    public $data = [], $model;

    public function __construct(){
        $this->model['SensorSetting'] = $this->model("SensorSetting");
        $this->model['Log'] = $this->model("Log");
        $this->data['user'] = [];
        //Lấy user để hiện thông tin trên header
        if(Session::data('user_id')!=null){
            $this->db = new Database();
            $query = $this->db->query("SELECT * FROM user WHERE id = '".Session::data('user_id')."';");
            $this->data['user'] = $query->fetch(PDO::FETCH_ASSOC);
        }
    }

    public function index(){
        $this->temperature();
    }

    public function temperature(){
        $request = new Request();
        if($request->isPost()){
            //set rules
            $request->rules([
                'min_value1' => 'required|min_val:0',
                'max_value1' => 'required|max_val:100|bigger:min_value1',
                'min_value2' => 'required|min_val:0',
                'max_value2' => 'required|max_val:100|bigger:min_value2',
            ]);

            //set message
            $request->message([
                'min_value1.required' => 'Trường này không được để trống',
                'min_value1.min_val' => 'Giá trị trường này không được bé hơn 0',
                'max_value1.required' => 'Trường này không được để trống',
                'max_value1.max_val' => 'Giá trị trường này không được lớn hơn 100',
                'max_value1.bigger' => 'Giá trị trường này phải lớn hơn trường ngưỡng dưới',
                'min_value2.required' => 'Trường này không được để trống',
                'min_value2.min_val' => 'Giá trị trường này không được bé hơn 0',
                'max_value2.required' => 'Trường này không được để trống',
                'max_value2.max_val' => 'Giá trị trường này không được lớn hơn 100',
                'max_value2.bigger' => 'Giá trị trường này phải lớn hơn trường ngưỡng dưới'
            ]);

            //validate
            $validate = $request->validate();
            if(!$validate){
                Session::Flash('errors',$request->errors());
                Session::Flash('msg','Đã có lỗi xảy ra! Vui lòng kiểm tra lại');
                Session::Flash('old',$request->getFields());
            }else{
                //Truong hop du lieu hop le 
                $setting['user_id'] = $this->data['user']['id'];

                $setting['min_value'] = $_POST['min_value1'];
                $setting['max_value'] = $_POST['max_value1'];
                $val1 = $this->model['SensorSetting']->getMinValue('temperature','day_mode',1);
                $val2 = $this->model['SensorSetting']->getMaxValue('temperature','day_mode',1);
                if($setting['min_value'] != $val1 || $setting['max_value'] != $val2){
                    $this->model['SensorSetting']->updateSetting('temperature','day_mode',1,$setting);
                    $msg = "Admin ".$this->data['user']['first_name']." đã cập nhật nhiệt độ ban ngày: ".$setting['min_value']." - ".$setting['max_value']."°C";
                    $this->model['Log']->addLog($msg);
                }

                $setting['min_value'] = $_POST['min_value2'];
                $setting['max_value'] = $_POST['max_value2'];
                $val1 = $this->model['SensorSetting']->getMinValue('temperature','day_mode',0);
                $val2 = $this->model['SensorSetting']->getMaxValue('temperature','day_mode',0);
                if($setting['min_value'] != $val1 || $setting['max_value'] != $val2){
                    $this->model['SensorSetting']->updateSetting('temperature','day_mode',0,$setting);
                    $msg = "Admin ".$this->data['user']['first_name']." đã cập nhật nhiệt độ ban đêm: ".$setting['min_value']." - ".$setting['max_value']."°C";
                    $this->model['Log']->addLog($msg);
                }
                echo "<script>alert('Bạn đã cập nhật dữ liệu thành công!');</script>";
            }
        }
            // Thông báo lỗi và hiện dữ liệu cũ
        $this->data['sub_content']['errors'] = Session::Flash('errors');
        $this->data['sub_content']['msg'] = Session::Flash('msg');
        $this->data['sub_content']['old'] = Session::Flash('old');
        //Thông tin user
        $this->data['sub_content']['user'] = $this->data['user'];

        //Giá trị setting các sensor lưu trong database
        $this->data['sub_content']['min_value1'] = $this->model['SensorSetting']->getMinValue('temperature','day_mode',1);
        $this->data['sub_content']['max_value1'] = $this->model['SensorSetting']->getMaxValue('temperature','day_mode',1);
        $this->data['sub_content']['min_value2'] = $this->model['SensorSetting']->getMinValue('temperature','day_mode',0);
        $this->data['sub_content']['max_value2'] = $this->model['SensorSetting']->getMaxValue('temperature','day_mode',0);

        $this->data["content"] = 'setting/temperature';
        $this->render('layouts/basic_layout', $this->data);
    }

    public function soil_humid(){
        $request = new Request();
        if($request->isPost()){
            //set rules
            $request->rules([
                'min_value1' => 'required|min_val:0',
                'max_value1' => 'required|max_val:100|bigger:min_value1',
                'min_value2' => 'required|min_val:0',
                'max_value2' => 'required|max_val:100|bigger:min_value2',
            ]);

            //set message
            $request->message([
                'min_value1.required' => 'Trường này không được để trống',
                'min_value1.min_val' => 'Giá trị trường này không được bé hơn 0',
                'max_value1.required' => 'Trường này không được để trống',
                'max_value1.max_val' => 'Giá trị trường này không được lớn hơn 100',
                'max_value1.bigger' => 'Giá trị trường này phải lớn hơn trường ngưỡng dưới',
                'min_value2.required' => 'Trường này không được để trống',
                'min_value2.min_val' => 'Giá trị trường này không được bé hơn 0',
                'max_value2.required' => 'Trường này không được để trống',
                'max_value2.max_val' => 'Giá trị trường này không được lớn hơn 100',
                'max_value2.bigger' => 'Giá trị trường này phải lớn hơn trường ngưỡng dưới'
            ]);

            //validate
            $validate = $request->validate();
            if(!$validate){
                Session::Flash('errors',$request->errors());
                Session::Flash('msg','Đã có lỗi xảy ra! Vui lòng kiểm tra lại');
                Session::Flash('old',$request->getFields());
            }else{
                //Truong hop du lieu hop le 
                $setting['user_id'] = $this->data['user']['id'];

                $setting['min_value'] = $_POST['min_value1'];
                $setting['max_value'] = $_POST['max_value1'];
                $val1 = $this->model['SensorSetting']->getMinValue('soil_humid','green_mode',1);
                $val2 = $this->model['SensorSetting']->getMaxValue('soil_humid','green_mode',1);
                if($setting['min_value'] != $val1 || $setting['max_value'] != $val2){
                    $this->model['SensorSetting']->updateSetting('soil_humid','green_mode',1,$setting);
                    $msg = "Admin ".$this->data['user']['first_name']." đã cập nhật độ ẩm đất cho chế độ còn xanh: ".$setting['min_value']." - ".$setting['max_value']."%";
                    $this->model['Log']->addLog($msg);
                }

                $setting['min_value'] = $_POST['min_value2'];
                $setting['max_value'] = $_POST['max_value2'];
                $val1 = $this->model['SensorSetting']->getMinValue('soil_humid','green_mode',0);
                $val2 = $this->model['SensorSetting']->getMaxValue('soil_humid','green_mode',0);
                if($setting['min_value'] != $val1 || $setting['max_value'] != $val2){
                    $this->model['SensorSetting']->updateSetting('soil_humid','green_mode',0,$setting);
                    $msg = "Admin ".$this->data['user']['first_name']." đã cập nhật độ ẩm đất cho chế ra hoa kết quả: ".$setting['min_value']." - ".$setting['max_value']."%";
                    $this->model['Log']->addLog($msg);
                }
                echo "<script>alert('Bạn đã cập nhật dữ liệu thành công!');</script>";
            }
        }
            // Thông báo lỗi và hiện dữ liệu cũ
        $this->data['sub_content']['errors'] = Session::Flash('errors');
        $this->data['sub_content']['msg'] = Session::Flash('msg');
        $this->data['sub_content']['old'] = Session::Flash('old');
        //Thông tin user
        $this->data['sub_content']['user'] = $this->data['user'];

        //Giá trị setting các sensor lưu trong database
        $this->data['sub_content']['min_value1'] = $this->model['SensorSetting']->getMinValue('soil_humid','green_mode',1);
        $this->data['sub_content']['max_value1'] = $this->model['SensorSetting']->getMaxValue('soil_humid','green_mode',1);
        $this->data['sub_content']['min_value2'] = $this->model['SensorSetting']->getMinValue('soil_humid','green_mode',0);
        $this->data['sub_content']['max_value2'] = $this->model['SensorSetting']->getMaxValue('soil_humid','green_mode',0);

        $this->data["content"] = 'setting/soil_humid';
        $this->render('layouts/basic_layout', $this->data);
    }

    public function air_humid(){
        $request = new Request();
        if($request->isPost()){
            //set rules
            $request->rules([
                'min_value1' => 'required|min_val:0',
                'max_value1' => 'required|max_val:100|bigger:min_value1',
            ]);

            //set message
            $request->message([
                'min_value1.required' => 'Trường này không được để trống',
                'min_value1.min_val' => 'Giá trị trường này không được bé hơn 0',
                'max_value1.required' => 'Trường này không được để trống',
                'max_value1.max_val' => 'Giá trị trường này không được lớn hơn 100',
                'max_value1.bigger' => 'Giá trị trường này phải lớn hơn trường ngưỡng dưới'
            ]);

            //validate
            $validate = $request->validate();
            if(!$validate){
                Session::Flash('errors',$request->errors());
                Session::Flash('msg','Đã có lỗi xảy ra! Vui lòng kiểm tra lại');
                Session::Flash('old',$request->getFields());
            }else{
                //Truong hop du lieu hop le 
                $setting['user_id'] = $this->data['user']['id'];

                $setting['min_value'] = $_POST['min_value1'];
                $setting['max_value'] = $_POST['max_value1'];
                $val1 = $this->model['SensorSetting']->getMinValue('air_humid','day_mode',0);
                $val2 = $this->model['SensorSetting']->getMaxValue('air_humid','day_mode',0);
                if($setting['min_value']!=$val1 || $setting['min_value']!= $val2){
                    $this->model['SensorSetting']->updateSetting('air_humid','day_mode',0,$setting);
                    $msg = "Admin ".$this->data['user']['first_name']." đã cập nhật độ ẩm không khí: ".$setting['min_value']." - ".$setting['max_value']."%";
                    $this->model['Log']->addLog($msg);
                    echo "<script>alert('Bạn đã cập nhật dữ liệu thành công!');</script>";
                }
            }
        }
            // Thông báo lỗi và hiện dữ liệu cũ
        $this->data['sub_content']['errors'] = Session::Flash('errors');
        $this->data['sub_content']['msg'] = Session::Flash('msg');
        $this->data['sub_content']['old'] = Session::Flash('old');
        //Thông tin user
        $this->data['sub_content']['user'] = $this->data['user'];

        //Giá trị setting các sensor lưu trong database
        $this->data['sub_content']['min_value1'] = $this->model['SensorSetting']->getMinValue('air_humid','day_mode',0);
        $this->data['sub_content']['max_value1'] = $this->model['SensorSetting']->getMaxValue('air_humid','day_mode',0);

        $this->data["content"] = 'setting/air_humid';
        $this->render('layouts/basic_layout', $this->data);
    }

    public function light(){
        $request = new Request();
        if($request->isPost()){
            //set rules
            $request->rules([
                'min_value1' => 'required|min_val:0',
                'max_value1' => 'required|max_val:100|bigger:min_value1',
            ]);

            //set message
            $request->message([
                'min_value1.required' => 'Trường này không được để trống',
                'min_value1.min_val' => 'Giá trị trường này không được bé hơn 0',
                'max_value1.required' => 'Trường này không được để trống',
                'max_value1.max_val' => 'Giá trị trường này không được lớn hơn 100',
                'max_value1.bigger' => 'Giá trị trường này phải lớn hơn trường ngưỡng dưới'
            ]);

            //validate
            $validate = $request->validate();
            if(!$validate){
                Session::Flash('errors',$request->errors());
                Session::Flash('msg','Đã có lỗi xảy ra! Vui lòng kiểm tra lại');
                Session::Flash('old',$request->getFields());
            }else{
                //Truong hop du lieu hop le 
                $setting['user_id'] = $this->data['user']['id'];

                $setting['min_value'] = $_POST['min_value1'];
                $setting['max_value'] = $_POST['max_value1'];
                $val1 = $this->model['SensorSetting']->getMinValue('light','day_mode',0);
                $val2 = $this->model['SensorSetting']->getMaxValue('light','day_mode',0);
                if($setting['min_value']!=$val1 || $setting['min_value']!= $val2){
                    $this->model['SensorSetting']->updateSetting('light','day_mode',0,$setting);
                    $msg = "Admin ".$this->data['user']['first_name']." đã cập nhật giá trị ánh sáng: ".$setting['min_value']." - ".$setting['max_value']."%";
                    $this->model['Log']->addLog($msg);
                    echo "<script>alert('Bạn đã cập nhật dữ liệu thành công!');</script>";
                }
            }
        }
            // Thông báo lỗi và hiện dữ liệu cũ
        $this->data['sub_content']['errors'] = Session::Flash('errors');
        $this->data['sub_content']['msg'] = Session::Flash('msg');
        $this->data['sub_content']['old'] = Session::Flash('old');
        //Thông tin user
        $this->data['sub_content']['user'] = $this->data['user'];

        //Giá trị setting các sensor lưu trong database
        $this->data['sub_content']['min_value1'] = $this->model['SensorSetting']->getMinValue('light','day_mode',0);
        $this->data['sub_content']['max_value1'] = $this->model['SensorSetting']->getMaxValue('light','day_mode',0);

        $this->data["content"] = 'setting/light';
        $this->render('layouts/basic_layout', $this->data);
    }
}





