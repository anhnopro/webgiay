<?php

namespace App\Controllers\Admin;

use App\Models\AttributeModel;
use App\Models\CategoryModel;
use App\Models\ProductModel;
use App\Models\ProductAttrModel;

class ProductController extends BaseController
{
    public function list()
    {
        $products = ProductModel::listPrd();
        $this->view("product/listsp", ['products' => $products]);
    }

    public function showadd()
    {
        $category = CategoryModel::all();
        $size = AttributeModel::where("name", '=', "size")->get();
        $color = AttributeModel::where("name", '=', "color")->get();
        $this->view("product/addprd", ["category" => $category, "size" => $size, 'color' => $color]);
    }
    public function listDetail($id)
    
    { 
        $product_detail = ProductModel::listprdDetail($id);
        $this->view("product/detailprd", ["product_detail" => $product_detail]);
    }


    public function showaddAttr($id){
        $products = ProductModel::listprdDetail($id);
        $size = AttributeModel::where("name", '=', "size")->get();
        $color = AttributeModel::where("name", '=', "color")->get();
        $this->view("product/addprdAttr",["products" => $products ,"size" => $size, 'color' => $color]);
    }

    public function updateProductAttribute() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_product = $_POST['id_product'];
            $sizes = isset($_POST['sizes']) ? $_POST['sizes'] : [];
            $colors = isset($_POST['colors']) ? $_POST['colors'] : [];
            $original_sizes = isset($_POST['original_sizes']) ? $_POST['original_sizes'] : [];
            $original_colors = isset($_POST['original_colors']) ? $_POST['original_colors'] : [];
    
            // Calculate which sizes to delete
            $delete_sizes = array_diff($original_sizes, $sizes);
    
            // Calculate which colors to delete
            $delete_colors = array_diff($original_colors, $colors);
    
            // Xóa các thuộc tính size được chọn
            foreach ($delete_sizes as $size) {
                ProductAttrModel::deleteByProductAndAttribute($id_product, $size);
            }
    
            // Xóa các thuộc tính color được chọn
            foreach ($delete_colors as $color) {
                ProductAttrModel::deleteByProductAndAttribute($id_product, $color);
            }
    
            // Thêm các thuộc tính size mới
            foreach ($sizes as $size) {
                if (!$this->attributeExists($id_product, $size)) {
                    ProductAttrModel::add([
                        'id_product' => $id_product,
                        'id_attribute' => $size
                    ]);
                }
            }
    
            // Thêm các thuộc tính color mới
            foreach ($colors as $color) {
                if (!$this->attributeExists($id_product, $color)) {
                    ProductAttrModel::add([
                        'id_product' => $id_product,
                        'id_attribute' => $color
                    ]);
                }
            }
    
            // Chuyển hướng sau khi cập nhật thành công
            header("Location: " . ROOT_PATH . "add/product/attr/$id_product");
        }
    }
    
    private function attributeExists($id_product, $id_attribute) {
        return ProductAttrModel::exists($id_product, $id_attribute);
    }
    
    
    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            echo print_r($_POST);
            $data = [
                'id_product' => $_POST['id_product'],
                'id_category' => $_POST['id_category'],
                'name' => $_POST['name'],
                'price' => $_POST['price'],
                'sale_price' => $_POST['sale_price'],
                'status' => 1,

                // 'qty' => $_POST['qty'],
                'describe' => $_POST['describe']
            ];

            if (isset($_FILES['path']) && $_FILES['path']['error'] == 0) {
                $target_dir = "assets/images/";
                $target_file = $target_dir . basename($_FILES["path"]["name"]);
                if (move_uploaded_file($_FILES["path"]["tmp_name"], $target_file)) {
                    $data['image'] = $target_file;
                }
            }

         
            $id_product = ProductModel::add($data);

         
            if ($id_product) {
                $sizes = $_POST['sizes'] ?? [];
                $colors = $_POST['colors'] ?? [];

                foreach ($sizes as $size) {
                    ProductAttrModel::add(['id_product' => $id_product, 'id_attribute' => $size]);
                }

                foreach ($colors as $color) {
                    ProductAttrModel::add(['id_product' => $id_product, 'id_attribute' => $color]);
                }
            }

   
            header("Location: " . ROOT_PATH . "list/product");
            exit();
        }
    }
    public function showUpdate($id)
    {    $category=CategoryModel::all();
        $products = ProductModel::listprdDetail($id);
        $this->view("product/edit", ['products' => $products,"category"=>$category]);
    }
    public function update($id)
    {
        if (isset($_POST['btn_update'])) {
            $data = [
                'id_category' => $_POST['id_category'],
                'name' => $_POST['name'],
                'price' => $_POST['price'],
                'sale_price' => $_POST['sale_price'],
                'describe' => $_POST['describe'],
                'status' => $_POST['status']
            ];
    
            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $target_dir = "assets/images/";
                $target_file = $target_dir . basename($_FILES["image"]["name"]);
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    $data['image'] = $target_file;
                }
            }
    
            ProductModel::updateProduct($id, $data);
    
            // Update sizes and colors
            $sizes = array_filter($_POST['sizes']); // Filter out empty values
            $colors = array_filter($_POST['colors']); // Filter out empty values
    
            ProductModel::updateProductAttributes($id, 'size', $sizes);
            ProductModel::updateProductAttributes($id, 'color', $colors);
    
            header('Location: ' . ROOT_PATH . 'list/product');
            exit();
        }
    }
}
