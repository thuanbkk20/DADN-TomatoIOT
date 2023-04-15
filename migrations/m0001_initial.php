<?php 
class m0001_initial{
    public function up(){
        $dbObject = new DB();
        $db = $dbObject->db;
        $sql = "CREATE DATABASE IF NOT EXISTS TomatoIoT;
        Use TomatoIoT;
       
        DROP TABLE IF EXISTS user;
        CREATE TABLE user(
            id INT PRIMARY KEY AUTO_INCREMENT,
            username varchar(50) not null,
            password varchar(100) not null,
            name varchar(50) not null,
            phone_number varchar(50) not null,
            role varchar(50) not null
        );
       
        DROP TABLE IF EXISTS sensor;
        CREATE TABLE sensor(
            id INT PRIMARY KEY AUTO_INCREMENT,
            type varchar(50) not null,
		setting INT not null,
            last_sent_data TIMESTAMP not null,
            area INT not null
        );
       
        DROP TABLE IF EXISTS area;
        CREATE TABLE area(
            id INT PRIMARY KEY AUTO_INCREMENT,
            location varchar(100) not null,
            name varchar(50) not null
        );
       
        DROP TABLE IF EXISTS equipment;
        CREATE TABLE equipment(
            id INT PRIMARY KEY AUTO_INCREMENT,
            level int not null,
            type varchar(50) not null,
		 name varchar(50) not null,
            area INT not null
        );
       
        DROP TABLE IF EXISTS log;
        CREATE TABLE log(
            id INT PRIMARY KEY AUTO_INCREMENT,
            time TIMESTAMP,
            description varchar(500) not null
        );
       
        DROP TABLE IF EXISTS setting;
        CREATE TABLE setting(
		id INT PRIMARY KEY AUTO_INCREMENT,
            type varchar(20) not null,
            max_value int not null,
            min_value int not null,
            user_id INT not null,
		green_mode INT default 0,
		day_mode INT default 0,
            time TIMESTAMP not null
        );
       
        DROP TABLE IF EXISTS env_index;
        CREATE TABLE env_index(
            sensor_id INT PRIMARY KEY AUTO_INCREMENT,
            time TIMESTAMP not null,
            value int not null
        );
       
        ALTER TABLE env_index
        ADD FOREIGN KEY (sensor_id) REFERENCES sensor(id);
       
        ALTER TABLE setting
        ADD FOREIGN KEY (user_id) REFERENCES user(id);
       
        ALTER TABLE equipment
        ADD FOREIGN KEY (area) REFERENCES area(id);
       
        ALTER TABLE sensor
        ADD FOREIGN KEY (area) REFERENCES area(id);
       
        ALTER TABLE sensor
        ADD FOREIGN KEY (setting) REFERENCES setting(id);";

        $db->query($sql);
    }
}