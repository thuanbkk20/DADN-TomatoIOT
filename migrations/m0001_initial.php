<?php 
class m0001_initial{
    public function up(){
        $dbObject = new DB();
        $db = $dbObject->db;
        $sql = "CREATE DATABASE IF NOT EXISTS TomatoIoT;
        Use TomatoIoT;
        
        DROP TABLE IF EXISTS user;
        CREATE TABLE user(
            id varchar(10) not null,
            username varchar(50) not null,
            password varchar(50) not null,
            name varchar(50) not null,
            phone_number varchar(50) not null,
            role varchar(50) not null,
            primary key (id)
        );
        
        DROP TABLE IF EXISTS sensor;
        CREATE TABLE sensor(
            id varchar(10) not null,
            type varchar(50) not null,
            last_sent_data date not null,
            area varchar(10) not null,
            primary key (id)
        );
        
        DROP TABLE IF EXISTS area;
        CREATE TABLE area(
            id varchar(10) not null,
            location varchar(50) not null,
            name varchar(50) not null,
            primary key(id)
        );
        
        DROP TABLE IF EXISTS equipment;
        CREATE TABLE equipment(
            id varchar(10) not null,
            level int not null,
            type varchar(50) not null,
            area varchar(10) not null,
            primary key(id)
        );
        
        DROP TABLE IF EXISTS log;
        CREATE TABLE log(
            id varchar(10) not null,
            time date, 
            description varchar(500) not null,
            primary key(id)
        );
        
        DROP TABLE IF EXISTS setting;
        CREATE TABLE setting(
            type varchar(20) not null,
            max_value int not null,
            min_value int not null,
            user_id varchar(10) not null,
            time date not null,
            primary key(type)
        );
        
        DROP TABLE IF EXISTS env_index;
        CREATE TABLE env_index(
            sensor_id varchar(10) not null,
            time date not null,
            value int not null,
            primary key(sensor_id)
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
        ADD FOREIGN KEY (type) REFERENCES setting(type);";

        $db->query($sql);
    }
}