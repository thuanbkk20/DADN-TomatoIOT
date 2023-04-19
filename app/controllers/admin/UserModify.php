<?php
class userModify extends Controller{
    public $data=[], $model;
    public function __construct()
    {
        $this->model['userModel'] = $this->model("UserModel"); 
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
        $data = $this->model['userModel']->getAll();
        $this->data['sub_content']['user'] = $this->data['user'];
        $this->data['sub_content']['userArr'] = $data;
        $this->data["content"] = 'user/list';
        $this->data["header_content"]["noti"] = $this->model['Log']->get4Log();
        $this->render('layouts/basic_layout', $this->data);
    }

    public function create(){
        $request = new Request();
        if($request->isPost()){
            //set rules
            $request->rules([
                'last_name' => 'required|max:50',
                'first_name' => 'required|max:50',
                'phone_number' => 'required|length:10',
                'email' => 'required|email|min:7|unique:user:username',
                'password' => 'required|min:3',
                'confirm_password' => 'required|match:password'
            ]);

            //set message
            $request->message([
                'last_name.required' => 'Họ tên không được để trống',
                'last_name.max' => 'Họ tên phải bé hơn 50 ký tự',
                'first_name.required' => 'Họ tên không được để trống',
                'first_name.max' => 'Họ tên phải bé hơn 50 ký tự',
                'phone_number.required' => 'Số điện thoại không được để trống',
                'phone_number.length' => 'Độ dài của số điện thoại là 10',
                'email.required' => 'Email không được để trống',
                'email.email' => 'Định dạng email không hợp lệ',
                'email.min' => 'Email phải lớn hơn 7 ký tự',
                'email.unique' => 'Email đã tồn tại trong hệ thống',
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
                $new_user['username'] = trim($_POST['email']);
                $new_user['first_name'] = trim($_POST['first_name']);
                $new_user['last_name'] = trim($_POST['last_name']);
                $new_user['phone_number'] = trim($_POST['phone_number']);
                $new_user['role'] = trim($_POST['role']);
                $new_user['password'] = password_hash(trim($_POST['password']), PASSWORD_BCRYPT);
                //Tạo user mới
                $this->model['userModel']->addUser($new_user);
                //Them log
                $mgs = 'Quản lý '.$this->data['user']['first_name'].' đã thêm người dùng mới có tên đăng nhập: '.$new_user['username'].' với vai trò '.$new_user['role'];
                $this->model['Log']->addLog($mgs);

                $message = "Bạn đã thêm người dùng mới thành công, chuyển đến trang quản lí?";
                $url = "/admin/UserModify";

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
        //Thông tin user
        $this->data['sub_content']['user'] = $this->data['user'];
        $this->data["content"] = 'user/add';
        $this->data["header_content"]["noti"] = $this->model['Log']->get4Log();
        $this->render('layouts/basic_layout', $this->data);
    }

    public function update(){
        $request = new Request();
        if($request->isPost()){
            //set rules
            $this->data['sub_content']['userToUpdate'] = $this->model['userModel']->getUser($_POST['id']);
            $request->rules([
                'last_name' => 'required|max:50',
                'first_name' => 'required|max:50',
                'phone_number' => 'required|length:10',
                'email' => 'required|email|min:7|callback_check_email',
                'password' => 'required|min:3',
                'confirm_password' => 'required|match:password'
            ]);

            //set message
            $request->message([
                'last_name.required' => 'Họ tên không được để trống',
                'last_name.max' => 'Họ tên phải bé hơn 50 ký tự',
                'first_name.required' => 'Họ tên không được để trống',
                'first_name.max' => 'Họ tên phải bé hơn 50 ký tự',
                'phone_number.required' => 'Số điện thoại không được để trống',
                'phone_number.length' => 'Độ dài của số điện thoại là 10',
                'email.required' => 'Email không được để trống',
                'email.email' => 'Định dạng email không hợp lệ',
                'email.min' => 'Email phải lớn hơn 7 ký tự',
                'email.callback_check_email' => 'Email đã tồn tại trong hệ thống',
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
                $new_user['username'] = trim($_POST['email']);
                $new_user['first_name'] = trim($_POST['first_name']);
                $new_user['last_name'] = trim($_POST['last_name']);
                $new_user['phone_number'] = trim($_POST['phone_number']);
                $new_user['role'] = trim($_POST['role']);
                $new_user['password'] = password_hash(trim($_POST['password']), PASSWORD_BCRYPT);
                //Tạo user mới
                $this->model['userModel']->updateUser($_POST['id'],$new_user);
                //Them log
                $mgs = 'Quản lý '.$this->data['user']['first_name'].' đã cập nhật thông tin cho người dùng mới có tên đăng nhập: '.$new_user['username'];
                $this->model['Log']->addLog($mgs);

                $message = "Bạn đã cập nhật thông tin cho người dùng thành công, chuyển đến trang quản lí?";
                $url = "/admin/UserModify";

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
        //Thông tin user
        $this->data['sub_content']['user'] = $this->data['user'];
        if(isset($_GET['id'])) $this->data['sub_content']['userToUpdate'] = $this->model['userModel']->getUser($_GET['id']);
        $this->data["content"] = 'user/update';
        $this->data["header_content"]["noti"] = $this->model['Log']->get4Log();
        $this->render('layouts/basic_layout', $this->data);
    }

    public function delete(){
        // Xóa user có id = $_GET['id']
        $this->model['userModel']->deleteUser($_GET['id']);
        $username = $this->model['userModel']->getUserName($_GET['id']);
        $mgs = 'Quản lý '.$this->data['user']['first_name'].' đã xóa người dùng có tên đăng nhập: '.$username.' khỏi hệ thống';
        $this->model['Log']->addLog($mgs);

        $message = "Bạn đã xóa người dùng thành công, chuyển đến trang quản lí?";
        $url = "/admin/UserModify";

        // Generate the JavaScript code for the popup alert and redirect
        echo '<script>';
        echo 'if (confirm("' . $message . '")) {';
        echo '    window.location.href = "' . $url . '";';
        echo '} else {';
        echo '    window.location.href = "' . $url . '";';
        echo '}';
        echo '</script>';
    }

    public function check_email($email){
        if(!$this->model['userModel']->getUserId($email)) return true;
        return $this->model['userModel']->getUserId($email)['id'] == $this->data['sub_content']['userToUpdate']['id'];
    }
}
