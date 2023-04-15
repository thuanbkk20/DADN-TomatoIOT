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
    }
}