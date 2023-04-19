<?php
class site extends Controller{
    public $data=[], $userModel, $model;
    public function __construct()
    {
        $this->userModel = $this->model("UserModel"); 
        $this->model['Log'] = $this->model('Log');
        $this->data['user'] = [];
        //Lấy user để hiện thông tin trên header
        if(Session::data('user_id')!=null){
            $this->db = new Database();
            $query = $this->db->query("SELECT * FROM user WHERE id = '".Session::data('user_id')."';");
            $this->data['user'] = $query->fetch(PDO::FETCH_ASSOC);
        } 
    }
    public function login(){
        $request = new Request();
        if($request->isPost()){
            //set rules
            $request->rules([
                'email' => 'required|exist:user:username',
                'password' => 'required|correct:user:username:email:password',
            ]);

            //set message
            $request->message([
                'email.required' => 'Email không được để trống',
                'email.exist' => 'Email này chưa được đăng ký',
                'password.required' => 'Mật khẩu không được để trống',
                'password.correct'  => 'Mật khẩu không khớp',
            ]);

            //validate
            $validate = $request->validate();
            if(!$validate){
                Session::Flash('errors',$request->errors());
                Session::Flash('msg','Đã có lỗi xảy ra! Vui lòng kiểm tra lại');
                Session::Flash('old',$request->getFields());
            }else{
                //Trường hợp đăng nhập thành công   
                $userID = $this->userModel->getUserID($_POST['email'])['id'];
                Session::data('user_id',$userID);
                $response = new Response();
                $response->reDirect('home');
            } 
        }
        $this->data['errors'] = Session::Flash('errors');
        $this->data['msg'] = Session::Flash('msg');
        $this->data['old'] = Session::Flash('old');
        $this->render("auth/login", $this->data);
    }

    public function logout(){
        Session::delete('user_id');
        $response = new Response();
        $response->reDirect('site/login');
    }

    public function error(){
        App::$app->loadError('permission');
    }
}