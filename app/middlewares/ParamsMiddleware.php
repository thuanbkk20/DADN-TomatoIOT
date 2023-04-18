<?php
class ParamsMiddleware extends Middleware{
    public function handle(){
        $response = new Response();
        $urlArr = ['/site/login','/site/register'];
        $flag = true;
        foreach($urlArr as $url){
            if($_SERVER['REQUEST_URI']==$url){
                $flag = false;
                break;
            }
        }

        if(!Session::data('user_id') && $flag){
            $response->reDirect('site/login');
        }
        
        $user = $this->db->table('user')->where('id','=',Session::data('user_id'))->getFirst();
        //Check xem tac vu co yeu cau la admin khong
        $arr = explode("/",$_SERVER['REQUEST_URI']);
        $adminFlag = $arr[1]=='admin'?1:0;
        if($adminFlag && $user['role']!='Quản lý'){
            $response->reDirect('loadError/permission');
            // header("Location: $url");
        }
    }
}