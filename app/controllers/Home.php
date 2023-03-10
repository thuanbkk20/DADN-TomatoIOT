<?php

class Home extends Controller{
    
    public $model_home, $data=[];
    public function __construct()
    {
        $this->model_home = $this->model("HomeModel"); 
    }

    public function index(){
        // Session::data('username','Minh Thuan');
        // Session::data('email','thuan@gmail.com');
        // Session::Flash('msg','Welcome');
        // echo Session::Flash('msg');
        // echo '<pre>';print_r(Session::data());echo '</pre>';

        $this->data['sub_content']['page_title'] = "Dashboard";
        $this->data['sub_content']['product_list'] = $this->model_home->All();
        $this->data["content"] = 'products/list';
        $this->render('layouts/basic_layout', $this->data);
    }

    // public function get_user(){
    //     $this->data['errors'] = Session::Flash('errors');
    //     $this->data['msg'] = Session::Flash('msg');
    //     $this->data['old'] = Session::Flash('old');
    //     $this->render("users/add", $this->data);
    // }

    // public function post_user(){
    //     $request = new Request();
        
    //     if($request->isPost()){
    //         //set rules
    //         $request->rules([
    //             'fullname' => 'required|min:5|max:30',
    //             'age' => 'required|callback_check_age',
    //             'email' => 'required|email|min:7|unique:users:email',
    //             'password' => 'required|min:3',
    //             'confirm_password' => 'required|match:password'
    //         ]);

    //         //set message
    //         $request->message([
    //             'fullname.required' => 'Họ tên không được để trống',
    //             'fullname.min' => 'Họ tên phải lớn hơn 5 ký tự',
    //             'fullname.max' => 'Họ tên phải bé hơn 30 ký tự',
    //             'age.required' => 'Tuổi không được để trống',
    //             'age.callback_check_age' => 'Tuổi không được nhỏ hơn 20',
    //             'email.required' => 'Email không được để trống',
    //             'email.email' => 'Định dạng email không hợp lệ',
    //             'email.min' => 'Email phải lớn hơn 7 ký tự',
    //             'email.unique' => 'Email đã tồn tại trong hệ thống',
    //             'password.required' => 'Mật khẩu không được để trống',
    //             'password.min'  => 'Mật khẩu phải lớn hơn 3 ký tự',
    //             'confirm_password.required' => 'Xác nhận mật khẩu không được để trống',
    //             'confirm_password.match' => 'Mật khẩu nhập lại không khớp'
    //         ]);

    //         //validate
    //         $validate = $request->validate();
    //         if(!$validate){
    //             Session::Flash('errors',$request->errors());
    //             Session::Flash('msg','Đã có lỗi xảy ra! Vui lòng kiểm tra lại');
    //             Session::Flash('old',$request->getFields());
    //         }  
    //     }
            
    //     $response = new Response();
    //     $response->reDirect('home/get_user');
        
    // }

    // public function check_age($age){
    //     return $age>=20;
    // }
}