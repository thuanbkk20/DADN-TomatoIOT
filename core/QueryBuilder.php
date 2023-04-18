<?php
trait QueryBuilder{

    public $tableName = '';
    public $where = '';
    public $operator = '';
    public $selectField = '*';
    public $limit = '';
    public $orderBy = '';
    public $innerJoin = '';

    public function table($tableName){
        $this->tableName = $tableName;
        return $this;
    }

    public function where($field, $compare, $value){
        if(empty($this->where)){
            $this->operator = " WHERE ";
        }else{
            $this->operator = " AND ";
        }
        $this->where .= "$this->operator $field $compare '$value'";
        return $this;
    }

    public function orWhere($field, $compare, $value){
        if(empty($this->where)){
            $this->operator = " WHERE ";
        }else{
            $this->operator = " OR ";
        }
        $this->where .= "$this->operator $field $compare '$value'";
        return $this;
    }

    public function whereLike($field, $value){
        if(empty($this->where)){
            $this->operator = " WHERE ";
        }else{
            $this->operator = " AND ";
        }
        $this->where .= "$this->operator $field LIKE '$value'";
        return $this;
    }

    public function select($field= "*"){
        $this->selectField = $field;
        return $this;
    }

    public function limit($number, $offset = 0){
        $this->limit = " LIMIT $offset, $number";
        return $this;
    }

    //ORDER BY id DESC
    public function orderBy($field, $type = "ASC"){
        $fieldArr = array_filter(explode(',',$field));
        if(!empty($fieldArr) && count($fieldArr)>=2){
            //SQL order by mul
            $this->orderBy = "ORDER BY ".implode(',',$fieldArr);
        }else{
            $this->orderBy = "ORDER BY ". $field." ".$type;
        }
        return $this;
    }

    //INDER join
    public function join($tableName, $relationship){
        $this->innerJoin .= "INNER JOIN ".$tableName. " ON ".$relationship." ";
        return $this;
    }

    public function insert($data){
        $tableName = $this->tableName;
        $insertStatus = $this->insertData($tableName, $data);
        $this->resetQuery();
        return $insertStatus;
    }

    //Lay id vua them vao
    public function lastID(){
        return $this->lastInsertId();
    }

    public function update($data){
        $tableName = $this->tableName;
        $where = str_replace('WHERE','',$this->where);
        $where = trim($where);
        $updateStatus = $this->updateData($tableName, $data, $where);
        $this->resetQuery();
        return $updateStatus;
    }

    public function delete(){
        $tableName = $this->tableName;
        $where = str_replace('WHERE','',$this->where);
        $where = trim($where);
        $deleteStatus = $this->deleteData($tableName, $where);
        $this->resetQuery();
        return $deleteStatus;
    }

    public function getAll(){
        $sqlQuery = "SELECT $this->selectField FROM $this->tableName $this->innerJoin $this->where $this->orderBy $this->limit";
        $sqlQuery = trim($sqlQuery);
        $query = $this->query($sqlQuery);

        //Reset fields
        $this->resetQuery();
        if(!empty($query)){
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        return false;
    }

    public function getFirst(){
        $sqlQuery = "SELECT $this->selectField FROM $this->tableName $this->innerJoin $this->where $this->limit";
        $sqlQuery = trim($sqlQuery);
        $query = $this->query($sqlQuery);

        //Reset fields
        $this->resetQuery();
        if(!empty($query)){
            return $query->fetch(PDO::FETCH_ASSOC);
        }
        return false;
    }

    public function resetQuery(){
        $this->tableName = '';
        $this->where = '';
        $this->operator = '';
        $this->selectField = '*';
        $this->limit = '';
        $this->orderBy = '';
        $this->innerJoin = '';
    }
}