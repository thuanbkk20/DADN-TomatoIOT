<?php
/*
    Ke thua tu class Model
*/
class HomeModel extends Model{
    private $_table = 'products'; //Just an example

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

    public function getListProducts(){
        //$data = $this->db->table($this->_table)->orderBy("price_show", "ASC")->limit(0,3)->getAll();
        // $data = $this->db->table("product_in_cart")->getAll();
        $data = $this->ALL();
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