<?php

class history extends Controller{
    
    public $model, $data=[];
    public function __construct()
    {
        $this->model['Log'] = $this->model('Log');
        $this->data['user'] = [];
        //Lấy user để hiện thông tin trên header
        if(Session::data('user_id')!=null){
            $this->db = new Database();
            $query = $this->db->query("SELECT * FROM user WHERE id = '".Session::data('user_id')."';");
            $this->data['user'] = $query->fetch(PDO::FETCH_ASSOC);
        }
        $this->data["header_content"]["noti"] = $this->model['Log']->get4Log();
    }

    public function index(){
        $data = $this->model['Log']->getAll();
        $this->data['sub_content']['historyArr'] = $data;
        $this->data["content"] = 'history';
        $this->data["header_content"]["noti"] = $this->model['Log']->get4Log();
        $this->render('layouts/basic_layout', $this->data);
    }
}