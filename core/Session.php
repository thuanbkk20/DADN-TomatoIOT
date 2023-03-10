<?php
class Session{
    /*
    *   data(key, value) => set session
    *   data(key) => get session
     */
    static public function data($key='', $value=''){
        $sessionKey = self::isInValid();
        if(!empty($value)){
            if(!empty($key)){
                $_SESSION[$sessionKey][$key] = $value;  //set
                return true;
            }
            return false;
        }else{
            if(empty($key)){
                if(isset($_SESSION[$sessionKey])){
                    return $_SESSION[$sessionKey];
                }
            }else{
                if(isset($_SESSION[$sessionKey][$key])){
                    return $_SESSION[$sessionKey][$key]; //get
                }
            }
        }
    }

    /*
    * delete(key) => Xóa session với key
    * delete() => Xóa hết session
    */ 
    static public function delete($key=''){
        $sessionKey = self::isInvalid();
        if(!empty($key)){
            if(isset($_SESSION[$sessionKey][$key])){
                unset($_SESSION[$sessionKey][$key]);
                return true;
            }
            return false;
        }else{
            unset($_SESSION[$sessionKey]);
            return true;
        }
        return false;
    }

    /*
     * Flash data
     * - set flash data => giống set session
     * - get flash data => giống get session, xóa luôn session đó sau khi get xong
     */
    static public function flash($key = '', $value = ''){
        $dataFlash = self::data($key, $value);
        if(empty($value)){
            self::delete($key);
        }
        return $dataFlash;
    }

    static function showError($message){
        $data = ['message' => $message];
        App::$app->loadError('exception', $data);
        die();
    }

    static function isInValid(){
        global $config;
        if(!empty($config['session'])){
            $sessionConfig = $config['session'];
            if(!empty($sessionConfig['session_key'])){
                $sessionKey = $sessionConfig['session_key'];
                return $sessionKey;
            }else{
                self::showError('Thiếu cấu hình session_key, vui lòng kiểm tra file: config/session.php');
            }
        }else{
            self::showError('Thiếu cấu hình session, vui lòng kiểm tra file: config/session.php');
        }
    }
}