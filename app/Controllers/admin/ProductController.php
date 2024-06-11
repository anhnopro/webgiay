<?php
namespace App\Controllers\Admin;

use App\Models\AttributeModel;
use App\Models\CategoryModel;
use App\Models\ProductModel;
use App\Models\ProductAttrModel;

class ProductController extends BaseController{
    public function list(){
        $products=ProductModel::all();
        $this->view("product/listsp",['products'=>$products]);
        }
    public function showadd(){
        $category = CategoryModel::all();
        $size = AttributeModel::where("name", '=', "size")->get();
        $color = AttributeModel::where("name", '=', "color")->get();
        $this->view("product/addprd", ["category" => $category, "size" => $size, 'color' => $color]);
    }

    public function add(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
         echo print_r($_POST);
            $data = [
                'id_product'=>$_POST['id_product'],
                'id_category' => $_POST['id_category'],
                'name' => $_POST['name'],
                'price' => $_POST['price'],
                'sale_price'=>$_POST['sale_price'],
                'status'=>1,

                // 'qty' => $_POST['qty'],
                'describe' => $_POST['describe']
            ];

            if (isset($_FILES['path']) && $_FILES['path']['error'] == 0) {
                $target_dir = "images/";
                $target_file = $target_dir . basename($_FILES["path"]["name"]);
                if (move_uploaded_file($_FILES["path"]["tmp_name"], $target_file)) {
                    $data['path'] = $target_file;
                }
            }

            // Lưu sản phẩm
            $id_product = ProductModel::add($data);

            // Lưu thuộc tính size và color
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

            // Điều hướng lại trang hoặc hiển thị thông báo thành công
            header("Location: " . ROOT_PATH . "list/product");
            exit();
        }
    }
}

?>