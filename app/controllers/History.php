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
        //Phân trang
        if(!isset($_GET['page'])){
            $page = 1;
        }else{
            $page = $_GET['page'];
        }
        $results_per_page = 10;
        $page_first_result = ($page-1) * $results_per_page;
        $query = $this->db->query("SELECT * FROM log");
        $number_of_result = $query->rowCount();
        //determine the total number of pages available
        $number_of_page = ceil ($number_of_result / $results_per_page);
        //Lấy dữ liệu gửi đến view
        $query = "SELECT * FROM log LIMIT " . $page_first_result . "," . $results_per_page;
        $query = $this->db->query($query);
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        // $data = $this->model['Log']->getAll();

        if(isset($_GET['page'])){
            $this->data['sub_content']['curPage'] = $_GET['page'];
        }else{
            $this->data['sub_content']['curPage'] = 1;
        }
        $this->data['sub_content']['historyArr'] = $data;
        $this->data['sub_content']['number_of_page'] = $number_of_page;
        $this->data["content"] = 'history';
        $this->data["header_content"]["noti"] = $this->model['Log']->get4Log();
        $this->render('layouts/basic_layout', $this->data);
    }
}