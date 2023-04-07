<?php
class ParamsMiddleware extends Middleware{
    public function handle(){
        $response = new Response();
        if(!Session::data('user_id')&& $_SERVER['REQUEST_URI']!='/site/login'){
            $response->reDirect('site/login');
        }
    }
}