<?php
class m0002_importData{
    public function up(){
        $dbObject = new DB();
        $db = $dbObject->db;
        $cur_time = date('Y-m-d H:i:s');
        //Insert data into user table
        $sql = '
        INSERT INTO TomatoIoT.user
        VALUES (1,"admin@gmail.com","$2y$10$kR3IBZ4Aunux/zENSwsLremmklA5x.iJT4nXlRPlYCeGjeleRfJ4i","Nguyen","Thuan","0123456789","Quản lý","");
       
        INSERT INTO TomatoIoT.area VALUES (1,"0:0;10:0;10:10;0:10","Khu vuc 1");
        INSERT INTO TomatoIoT.setting VALUES (1,"temperature",27,21,1,0,1,"'.$cur_time.'");
        INSERT INTO TomatoIoT.setting VALUES (2,"temperature",18,16,1,0,0,"'.$cur_time.'");
        INSERT INTO TomatoIoT.setting VALUES (3,"soil_humid",70,60,1,1,0,"'.$cur_time.'");
        INSERT INTO TomatoIoT.setting VALUES (4,"soil_humid",80,70,1,0,0,"'.$cur_time.'");
        INSERT INTO TomatoIoT.setting VALUES (5,"light",75,60,1,0,0,"'.$cur_time.'");
        INSERT INTO TomatoIoT.setting VALUES (6,"air_humid",60,45,1,0,0,"'.$cur_time.'");

        INSERT INTO TomatoIoT.sensor VALUES (1,"temperature","'.$cur_time.'",1);
        INSERT INTO TomatoIoT.sensor VALUES (2,"light","'.$cur_time.'",1);
        INSERT INTO TomatoIoT.sensor VALUES (3,"air_humid","'.$cur_time.'",1);
        INSERT INTO TomatoIoT.sensor VALUES (4,"soil_humid","'.$cur_time.'",1);
            
        INSERT INTO TomatoIoT.equipment VALUES (1,0,"fan","Quạt máy 1",1);
        INSERT INTO TomatoIoT.equipment VALUES (2,0,"pump","Máy bơm 1",1);

        INSERT INTO TomatoIoT.mode VALUES (1,"greenMode",0);
        INSERT INTO TomatoIoT.mode VALUES (2,"pumpAutoMode",0);
        INSERT INTO TomatoIoT.mode VALUES (3,"fanAutoMode",0);
        ' ;
        $db->query($sql);
    }
}