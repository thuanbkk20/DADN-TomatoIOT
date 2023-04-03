<?php 
class Load{
    static public function model($model){
        if(file_exists("app/models/".$model.".php")){
            require_once "app/models/".$model.".php";
            if(class_exists($model)){
                $model = new $model();
                return $model;
            }
        }
        return false;
    }

    public function view($view, $data = []){
        extract($data); //Bien cac key cua mang thanh bien tuong ung
        if(file_exists("app/views/".$view.".php")){
            require_once "app/views/".$view.".php";
        }else{
            return false;
        }
    }
}