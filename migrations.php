<?php
define('_DIR_ROOT', __DIR__);
$config_dir = scandir('configs');

if(!empty($config_dir)){
    foreach($config_dir as $item){
        if($item != '.' && $item != '..' && file_exists('configs/'.$item)){
            require_once('configs/' . $item);
        }
    }
}

if(!empty($config['database'])){
    //
    $db_config = array_filter($config['database']);
    if(!empty($db_config)){
        require_once 'core/Connection.php';
        require_once 'core/QueryBuilder.php';
        require_once 'core/Database.php';
        require_once 'core/DB.php';
    }
    $dbObject = new DB();

    $db = $dbObject->db;
    $db->applyMigrations();
}
