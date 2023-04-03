<?php
class UserModel extends Model{
    private $_table = 'user'; //Just an example

    function __construct(){
        parent::__construct();
    }

    function tableFill(){
        return $this->_table;
    }

    function fieldFill()
    {
        return "*";
    }

    function primaryKey()
    {
        return "id";
    }

    public function getUserId($userName){
        $data = $this->db->table($this->_table)->where('username','=',$userName)->select('id')->getFirst();
        return $data;
    }

    // public function insertCart($data){
        // $this->db->table("categories")->insert($data);
        // return $this->db->lastID();
    // }

    // public function updateCart($data, $id){
    //     $this->db->table("product_in_cart")->where('user_id','=',$id)->update($data);
    // }

    // public function deleteCart($id){
    //     $this->db->table("product_in_cart")->where('user_id','=',$id)->delete();
    // }
}
?>