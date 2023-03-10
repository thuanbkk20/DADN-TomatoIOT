<?php
class Database{
    private $__conn;
    use QueryBuilder;

    function __construct(){
        global $db_config; 
        $this->__conn = Connection::getInstance($db_config);
    }

    //Them du lieu
    function insertData($table, $data){

        if(!empty($data)){
            $fieldStr = '';
            $valueStr = '';
            foreach( $data as $key=>$value ){
                $fieldStr.= $key.',';
                $valueStr.="'".$value."',";
            }
            $fieldStr = rtrim($fieldStr, ',');
            $valueStr = rtrim($valueStr, ',');

            $sql = "INSERT INTO $table($fieldStr) VALUES ($valueStr)";
            
            $status = $this->query($sql);

            if($status){
                return true;
            }
            return false;
        }
    }

    //Sua du lieu
    function updateData($table, $data, $condition=''){
        if(!empty($data)){
            $updateStr = '';
            foreach($data as  $key=>$value){
                $updateStr.="$key='$value',";
            }
            $updateStr = rtrim($updateStr, ',');
        }

        if($condition){
            $sql = "UPDATE $table SET $updateStr WHERE $condition";
        }else{
            $sql = "UPDATE $table SET $updateStr";
        }
        $status = $this->query($sql);

        if($status){
            return true;
        }
        return false;
    }

    //Xoa du lieu
    function deleteData($table, $condition=''){
        if(!empty($condition)){
            $sql = "DELETE FROM $table WHERE $condition";
        }else{
            $sql = "DELETE FROM $table";
        }

        $status = $this->query($sql);
        if($status){
            return true;
        }
        return false;
    }

    //Thuc hien truy van cau lenh SQL
    function query($sql){
        try{
            $statement = $this->__conn->prepare($sql);

            $statement->execute();
            return $statement;
        }catch(Exception $exception){
            $mess = $exception->getMessage();
            $data['message'] = $mess;
            APP::$app->loadError('database', $data);
            die();
        }
    }

    //Tra ve id moi nhat sau khi da insert
    function lastInsertId(){
        return $this->__conn->lastInsertId();
    }
}