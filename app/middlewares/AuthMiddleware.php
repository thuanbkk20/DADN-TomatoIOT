<?php
class AuthMiddleware extends Middleware{
    function handle(){
        $model = Load::model('HomeModel');
        if(Session::data('admin_login')==null){
            $response = new Response(); 
            if(!Session::data('user_id')){
                $response->reDirect('site/login');
            }
        }
    }
}