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


    //Data migration 
    public function applyMigrations(){
        echo "applyMigrations";
        $this->createMigrationsTable();
        $newMigration = [];
        $migrate_dir = scandir('migrations');
        if(!empty($migrate_dir)){
            foreach($migrate_dir as $item){
                if($item != '.' && $item != '..' && file_exists('migrations/'.$item)){ 
                    require_once 'migrations/'.$item;
                    $className = trim($item,'.php');
                    $instance = new $className;
                    $this->log("Applying migration $item");
                    $instance->up();
                    $this->log("Applied migration $item".PHP_EOL);
                    $newMigration[] = $item;
                }
            }
        }

        if(!empty($newMigration)){
            $this->saveMigrations($newMigration);
        }else{
            $this->log("All migrations are applied.\n");
        }
    } 

    public function createMigrationsTable()
    {
        $this->query("
            CREATE TABLE IF NOT EXISTS migrations (
                id INT AUTO_INCREMENT PRIMARY KEY,
                migration VARCHAR(255),
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            ) ENGINE=INNODB;
        ");
    }

    public function saveMigrations(array $migrations)
    {
        $str = implode(",", array_map(fn ($m) => "('$m')", $migrations));
        $sql = "INSERT INTO migrations (migration) VALUES $str";
        $this->query($sql);
    }

    protected function log($message){
        echo '[' . date('Y-m-d H:i:s') . '] - ' . $message . PHP_EOL;
    }

}