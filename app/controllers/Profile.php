<?php
class profile extends Controller{
    public $data = [], $model = [];

    public function __construct(){
        $this->model['userModel'] = $this->model("UserModel");
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
            //set rules
            $request->rules([
                'last_name' => 'required|max:50',
                'first_name' => 'required|max:50',
                'phone_number' => 'required|length:10',
            ]);

            //set message
            $request->message([
                'last_name.required' => 'Họ tên không được để trống',
                'last_name.max' => 'Họ tên phải bé hơn 50 ký tự',
                'first_name.required' => 'Họ tên không được để trống',
                'first_name.max' => 'Họ tên phải bé hơn 50 ký tự',
                'phone_number.required' => 'Số điện thoại không được để trống',
                'phone_number.length' => 'Độ dài của số điện thoại là 10',
            ]);

            //validate
            $validate = $request->validate();
            if(!$validate){
                Session::Flash('errors',$request->errors());
                Session::Flash('msg','Đã có lỗi xảy ra! Vui lòng kiểm tra lại');
                Session::Flash('old',$request->getFields());
            }else{
                //Lấy dữ liệu từ form
                $new_user = [];
                $new_user['first_name'] = $_POST['first_name'];
                $new_user['last_name'] = $_POST['last_name'];
                $new_user['phone_number'] = $_POST['phone_number'];

                //Update user
                $this->model['userModel']->updateUser($this->data['user']['id'],$new_user);

                $message = "Bạn đã thay đổi thông tin cá nhân thành công!";
                $url = _WEB_ROOT."/profile";

                // Generate the JavaScript code for the popup alert and redirect
                echo '<script>';
                echo 'if (confirm("' . $message . '")) {';
                echo '    window.location.href = "' . $url . '";';
                echo '} else {';
                echo '    window.location.href = "' . $url . '";';
                echo '}';
                echo '</script>';
            }
        }
        $this->data['sub_content']['errors'] = Session::Flash('errors');
        $this->data['sub_content']['msg'] = Session::Flash('msg');
        $this->data['sub_content']['old'] = Session::Flash('old');
        $this->data['sub_content']['user'] = $this->data['user'];
        $this->data["content"] = 'profile/info';
        $this->data["header_content"]["noti"] = $this->model['Log']->get4Log();
        $this->render('layouts/basic_layout', $this->data);
    }

    public function change_password(){
        $request = new Request();
        if($request->isPost()){
            //set rules
            $request->rules([
                'password' => 'required|min:3',
                'confirm_password' => 'required|match:password'
            ]);

            //set message
            $request->message([
                'password.required' => 'Mật khẩu không được để trống',
                'password.min'  => 'Mật khẩu phải lớn hơn 3 ký tự',
                'confirm_password.required' => 'Xác nhận mật khẩu không được để trống',
                'confirm_password.match' => 'Mật khẩu nhập lại không khớp'
            ]);

            //validate
            $validate = $request->validate();
            if(!$validate){
                Session::Flash('errors',$request->errors());
                Session::Flash('msg','Đã có lỗi xảy ra! Vui lòng kiểm tra lại');
                Session::Flash('old',$request->getFields());
            }else{
                //Lấy dữ liệu từ form
                $new_user = [];
                $new_user['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT);

                //Update user
                $this->model['userModel']->updateUser($this->data['user']['id'],$new_user);

                $message = "Bạn đã thay đổi mật khẩu thành công!";
                // Generate the JavaScript code for the popup alert and redirect
                echo "<script type='text/javascript'>alert('$message');</script>";
            }
        }
        $this->data['sub_content']['errors'] = Session::Flash('errors');
        $this->data['sub_content']['msg'] = Session::Flash('msg');
        $this->data['sub_content']['old'] = Session::Flash('old');
        $this->data['sub_content']['user'] = $this->data['user'];
        $this->data["content"] = 'profile/change_password';
        $this->data["header_content"]["noti"] = $this->model['Log']->get4Log();
        $this->render('layouts/basic_layout', $this->data);
    }
}