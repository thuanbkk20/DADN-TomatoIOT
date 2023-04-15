<?php
class Request{
    /*
        1. Method
        2. Body
    */
    private $__rules = [], $__message = [], $__errors = [];
    public $db;

    function __construct(){
        $this->db = new Database();
    }

    public function getMethod(){
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function isPost(){
        return $this->getMethod() == 'post';
    }

    public function isGet(){
        return $this->getMethod() == 'get';
    }

    public function getFields(){
        $dataFields = [];
        if($this->isGet()){
            //Xu li lay du lieu voi phuong thuc get
            if(!empty($_GET)){
                foreach($_GET as $key => $value){
                    if(is_array($value)){
                        $dataFields[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
                    }else{
                        $dataFields[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
                    }
                }
            }
            return $dataFields;
        }

        if($this->isPost()){
            //Xu li lay du lieu voi phuong thuc post
            if(!empty($_POST)){
                foreach($_POST as $key => $value){
                    if(is_array($value)){
                        $dataFields[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
                    }else{
                        $dataFields[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);    
                    }
                }
            }
            return $dataFields;
        }
    }

    //Validate
    //set rules
    public function rules($rules=[]){
        $this->__rules = $rules;
    }

    //set message
    public function message($message){
        $this->__message = $message;
    }

    //run validate 
    public function validate(){
        $this->__rules = array_filter($this->__rules);
        
        $checkValidate = true;

        if(!empty($this->__rules)){
            $dataFields = $this->getFields();

            foreach($this->__rules as $fieldName => $ruleItem){
                $ruleItemArr = explode('|', $ruleItem);

                foreach($ruleItemArr as $rule){
                    $ruleName = null;
                    $ruleValue = null;
                    $ruleArr = explode(':', $rule);

                    $ruleName = reset($ruleArr);

                    if(count($ruleArr)>1){
                        $ruleValue = end($ruleArr);
                    }
                    
                    if($ruleName == 'required'){
                        if(empty(trim($dataFields[$fieldName]))){
                            $checkValidate = false;
                            $this->setErrors($fieldName, $ruleName);
                        }
                    }

                    if($ruleName == 'min'){
                        if(strlen(trim($dataFields[$fieldName]))<$ruleValue){
                            $checkValidate = false;
                            $this->setErrors($fieldName, $ruleName);
                        }
                    }

                    if($ruleName == 'max'){
                        if(strlen(trim($dataFields[$fieldName]))>$ruleValue){
                            $checkValidate = false;
                            $this->setErrors($fieldName, $ruleName);
                        }
                    }

                    if($ruleName == 'length'){
                        if(strlen(trim($dataFields[$fieldName]))!=$ruleValue){
                            $checkValidate = false;
                            $this->setErrors($fieldName, $ruleName);
                        }
                    }

                    if($ruleName == 'email'){
                        if(!filter_var($dataFields[$fieldName],FILTER_VALIDATE_EMAIL)){
                            $checkValidate = false;
                            $this->setErrors($fieldName,$ruleName);
                        }
                    }
                    
                    if($ruleName == 'match'){
                        if(trim($dataFields[$fieldName])!= trim($dataFields[$ruleValue])){
                            $checkValidate = false;
                            $this->setErrors($fieldName,$ruleName);
                        }
                    }

                    if($ruleName == 'unique'){
                        $tableName = null;
                        $fieldCheck = null;

                        if(!empty($ruleArr[0])){
                            $tableName = $ruleArr[1];
                        }
                        if(!empty($ruleArr[1])){
                            $fieldCheck = $ruleArr[2];
                        }
                        
                        if(!empty($tableName)&&!empty($fieldCheck)&&!empty($dataFields[$fieldName])){
                            if(count($ruleArr)==3){
                                
                                $checkExist = $this->db->query("SELECT $fieldCheck FROM $tableName WHERE $fieldCheck = '$dataFields[$fieldName]';")->rowCount();
                            
                            }else if(count($ruleArr)==4){
        
                                if(!empty($ruleArr[3])&& preg_match('~.+?\=.+?~is',$ruleArr[3])){
                                    $conditionWhere = str_replace('=','<>',$ruleArr[3]);
                                    $checkExist = $this->db->query("SELECT $fieldCheck FROM $tableName WHERE $fieldCheck = '$dataFields[$fieldName]' AND $conditionWhere;")->rowCount();
                                }
                            }
                            if($checkExist>0){
                                $checkValidate = false;
                                $this->setErrors($fieldName, $ruleName);
                            }
                        }
                    }

                    if($ruleName == 'exist'){
                        $tableName = null;
                        $fieldCheck = null;

                        if(!empty($ruleArr[0])){
                            $tableName = $ruleArr[1];
                        }
                        if(!empty($ruleArr[1])){
                            $fieldCheck = $ruleArr[2];
                        }
                        
                        if(!empty($tableName)&&!empty($fieldCheck)&&!empty($dataFields[$fieldName])){
                            $checkExist = $this->db->query("SELECT $fieldCheck FROM $tableName WHERE $fieldCheck = '$dataFields[$fieldName]';")->rowCount();
                            if($checkExist==0){
                                $checkValidate = false;
                                $this->setErrors($fieldName, $ruleName);
                            }
                        }
                    }

                    if($ruleName == 'correct'){
                        $tableName = null;
                        $fieldCheck = null;
                        $fieldQuery = null;
                        $fieldValue = null;
                        if(!empty($ruleArr[1])){
                            $tableName = $ruleArr[1];
                        }
                        if(!empty($ruleArr[2])){
                            $fieldCheck = $ruleArr[2];
                        }
                        if(!empty($ruleArr[3])){
                            $fieldQuery = $ruleArr[3];
                        }
                        if(!empty($ruleArr[4])){
                            $fieldValue = $ruleArr[4];
                        }
                        if(!empty($tableName)&&!empty($fieldCheck)&&!empty($fieldQuery)
                        &&!empty($fieldValue)&&!empty($dataFields[$fieldName])){
                            $checkExist = $this->db->query("SELECT $fieldValue FROM $tableName WHERE $fieldCheck = '$dataFields[$fieldQuery]';")->rowCount();
                            if($checkExist==1){
                                $query = $this->db->query("SELECT $fieldValue FROM $tableName WHERE $fieldCheck = '$dataFields[$fieldQuery]';");
                                $value = $query->fetch(PDO::FETCH_ASSOC)[$fieldValue];
                                if($fieldValue=='password'){
                                    if(!password_verify($dataFields[$fieldName],$value)){
                                        $checkValidate = false;
                                        $this->setErrors($fieldName, $ruleName);
                                    }
                                }else if($value!=$dataFields[$fieldName]){
                                    $checkValidate = false;
                                    $this->setErrors($fieldName, $ruleName);
                                }
                            }
                        }
                    }
                }

                    if(preg_match('~^callback_(.+)~is', $ruleName, $callbackArr)){
                        if(!empty($callbackArr[1])){
                            $callbackName = $callbackArr[1];
                            $controller = App::$app->getCurrentController();
                            if(method_exists($controller,$callbackName)){
                                $checkCallback = call_user_func_array([$controller,$callbackName], [trim($dataFields[$fieldName])]);
                                if(!$checkCallback){
                                    $checkValidate = false;
                                    $this->setErrors($fieldName,$ruleName);
                                }
                            }
                        }
                    }

                }
            }
        return $checkValidate;
    }

    //get errors
    public function errors($fieldName = ''){
        if(!empty($this->__errors)){
            if(empty($fieldName)){
                $errorsArr = [];
                foreach($this->__errors as $key=>$error){
                    $errorsArr[$key] =  reset($error);
                }
                return $errorsArr;
            }else{
                return reset($this->__errors[$fieldName]);
            }
        }
        return false;
    }

    //set errors
    public function setErrors($fieldName, $ruleName){
        $this->__errors[$fieldName][$ruleName] = $this->__message[$fieldName.'.'.$ruleName];
    }
}