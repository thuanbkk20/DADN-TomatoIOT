<?php
class m0002_importData{
    public function up(){
        $dbObject = new DB();
        $db = $dbObject->db;
        //Insert data into user table
        $sql = "USE TomatoIoT;
        INSERT INTO user
        VALUES ('avfae13','admin','12345678','NguyenVanA','0123456789','admin');";
        $db->query($sql);
    }
}