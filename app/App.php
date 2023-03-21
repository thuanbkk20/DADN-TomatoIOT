<?php
class App{
    private $__controller, $__action, $__params, $__routes, $__db;

    public static $app;
    
    public function __construct(){

        global $routes, $config;

        self::$app = $this;

        $this->__routes = new Route();

        if(!empty($routes['default_controller'])){
            $this->__controller = $routes['default_controller'];
        }else{
            $this->__controller = 'home';
        }
        $this->__action = 'index';
        $this->__params = [];
        
        //Tao DB de co the dung o cac controller
        if(class_exists('DB')){
            $dbObject = new DB();
            $this->__db = $dbObject->db;
        }

        $this -> handleUrl();
    }

    function getUrl(){
        if(!empty($_SERVER['PATH_INFO'])){
            $url = $_SERVER['PATH_INFO'];
        }else{
            $url ='/';
        }
        return $url;
    }

    public function handleUrl(){
        $url = $this->getUrl();
        $url = $this->__routes->handleRoute($url);

        $urlArr = array_filter(explode("/", $url));
        $urlArr = array_values($urlArr);

        $urlCheck = '';
        if(!empty($urlArr)){
            foreach($urlArr as $key=>$item){
                $urlCheck.=$item.'/';
                $fileCheck = rtrim($urlCheck,'/');
                $fileArr = explode('/',$fileCheck);
                $fileArr[count($fileArr)-1] = ucfirst($fileArr[count($fileArr)-1]);
                $fileCheck = implode('/',$fileArr);
    
                if(!empty($urlArr[$key-1])){
                    unset($urlArr[$key-1]);
                }
    
                if(file_exists('app/controllers/'.$fileCheck.'.php')){
                    $urlCheck = $fileCheck;
                    break;
                }
            }
            $urlArr = array_values($urlArr);
        }
        
        //Xu li controller
        if(!empty($urlArr[0])){
            $this->__controller = ucFirst($urlArr[0]);
        }else{
            $this->__controller = ucFirst($this->__controller);
        }

        //Xu li khi url rong
        if(empty($urlCheck)){
            $urlCheck = $this->__controller;
        }

        if(file_exists('app/controllers/'.$urlCheck.'.php')){
            require_once 'controllers/'.$urlCheck.'.php';

            //Kiem tra class $this->__controller ton tai
            if(class_exists($this->__controller)){
                $this->__controller = new $this->__controller();
                if(!empty($this->__db)){
                    $this->__controller->db = $this->__db;
                }
            }else{
                $this->loadError();
            }
            
            unset($urlArr[0]);
        }else{
            $this->loadError();
        }

        //Xu li action
        if(!empty($urlArr[1])){
            $this->__action = ucFirst($urlArr[1]);
            unset($urlArr[1]);
        }
        
        //Xu li parameters
        $this->__params = array_values($urlArr);

        //Kiem tra ham ton tai
        if(method_exists($this->__controller,$this->__action)){
            call_user_func_array([$this->__controller, $this->__action],$this->__params);
        }else{
            $this->loadError();
        }
    }

    public function loadError($name='404', $data = []){
        extract($data);
        require_once 'errors/'.$name.'.php';
    }

    public function getCurrentController() {
        return $this->__controller;
    }

    public function getDatabase(){
        return $this->__db;
    }
}