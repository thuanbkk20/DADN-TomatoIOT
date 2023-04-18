<?php
class loadError extends Controller{
    public function index(){
        require_once _DIR_ROOT.'/app/errors/404.php';
    }

    public function exception($mgs){
        require_once _DIR_ROOT.'/app/errors/exception.php';
    }

    public function permission(){
        require_once _DIR_ROOT.'/app/errors/permission.php';
    }

}