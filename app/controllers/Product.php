<?php
class Product extends Controller{

    public $data = [];
    public function index(){
        echo "Danh sách sản phẩm";
    }

    public function list(){
        $product = $this->model("ProductModel");

        $this->data['sub_content']['page_title'] = "Danh sach san pham";
        $this->data['sub_content']['product_list'] = $product->getProductList();
        $this->data["content"] = 'products/list';
        //Render view
        $this->render('layouts/client_layout', $this->data);
    }

    public function detail($id=0){
        $product = $this->model("ProductModel");
        $this->data['sub_content']['info'] = $product->getDetail($id);
        $this->data['sub_content']['page_title']= "Chi tiết sản phẩm";
        $this->data["content"] = 'products/detail';
        //Render view
        $this->render('layouts/client_layout', $this->data);
    }
}