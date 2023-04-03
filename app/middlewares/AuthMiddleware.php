<?php
class AuthMiddleware extends Middleware{
    function handle(){
        $model = Load::model('HomeModel');
        if(Session::data('admin_login')==null){
            $response = new Response();
            var_dump(Session::data());
        }
    }
}