<?php
define('_DIR_ROOT', __DIR__);


//Xu li http root
if(!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on'){
    $web_root = "https://".$_SERVER['HTTP_HOST'];
    $root = "https://localhost:3000";
}else{
    $web_root = "http://".$_SERVER['HTTP_HOST'];
    $root = "http://localhost:3000";
}
define('_WEB_ROOT',$web_root);
define('_ROOT',$root);
/*
** Tu dong load configs
*/
$config_dir = scandir('configs');

if(!empty($config_dir)){
    foreach($config_dir as $item){
        if($item != '.' && $item != '..' && file_exists('configs/'.$item)){
            require_once('configs/' . $item);
        }
    }
}

//Load all services
if(!empty($config['app']['services'])){
    $allServices = $config['app']['services'];
    if(!empty($allServices)){
        foreach($allServices as $serviceName){
            if(file_exists('app/core'.$serviceName.'.php')){
                require_once 'app/core'.$serviceName.'.php';
            }
        }
    }
}

require_once 'core/serviceProvider.php'; //Load serviceProvider class

require_once 'core/View.php'; //Load view class

require_once 'core/Load.php'; //Load 

require_once 'core/Middleware.php'; //Load middleware class

require_once 'core/Route.php';  //Load route class

require_once 'core/Session.php'; //Load session class

//Kiem tra config va load database
if(!empty($config['database'])){
    //
    $db_config = array_filter($config['database']);
    if(!empty($db_config)){
        require_once 'core/Connection.php';
        require_once 'core/QueryBuilder.php';
        require_once 'core/Database.php';
        require_once 'core/DB.php';
    }
}

require_once 'core/Helper.php';

//Load all helpers
$allHelpers = scandir('app/helpers');
if(!empty($allHelpers)){
    foreach($allHelpers as $item){
        if($item != '.' && $item != '..' && file_exists('app/helpers/'.$item)){
            require_once('app/helpers/' . $item);
        }
    }
}

require_once 'app/App.php'; //Load app

require_once 'core/Model.php'; //Load model

require_once 'core/AdafruitIO.php'; //Load adafruit

require_once 'core/AdafruitIOFeed.php'; //Load adafruit feed

require_once 'core/Controller.php';  //Load base controller

require_once 'core/Request.php'; //Load request 

require_once 'core/Response.php'; //Load response

