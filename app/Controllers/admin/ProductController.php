<?php
namespace App\Controllers\Admin;

use App\Models\CategoryModel;
use App\Models\ProductModel;

class ProductController extends BaseController{
   public function list(){
      $product=ProductModel::getProductList();
    $this->view("product/listsp",["product"=>$product]);
   }
   public function showadd(){
      $category=CategoryModel::all();
      $this->view("product/addprd",["category"=>$category]);
   }
   public function add(){
      
         $id_product = $_POST['id_product'];
         $productName = $_POST['name'];
         $productDescription = $_POST['description'];
         $productCategory = $_POST['category'];
         $productStatus = 1; // You can set the default status or get it from the form
 
         $detailColor = $_POST['color'];
         $detailSize = $_POST['size'];
         $detailPrice = $_POST['price'];
         $detailQty = $_POST['qty'];
 
         // Handle file upload
         if (isset($_FILES['path']) && $_FILES['path']['error'] == 0) {
             $uploadDir = 'images/';
             $uploadFile = $uploadDir . basename($_FILES['path']['name']);
             if (move_uploaded_file($_FILES['path']['tmp_name'], $uploadFile)) {
                 $imagePath = $uploadFile;
             } else {
                 $imagePath = '';
             }
         } else {
             $imagePath = '';
         }
 
         $productData = [
             'id_product' => $id_product,
             'name' => $productName,
             'describe' => $productDescription,
             'status' => $productStatus,
             'id_category' => $productCategory
         ];
 
         $detailData = [
             'color' => $detailColor,
             'size' => $detailSize,
             'price' => $detailPrice,
             'qty' => $detailQty
         ];
 
         $imageData = [
             'path' => $imagePath
         ];
 
         $product = new ProductModel();
         $product->insertProductWithDetails($productData, $detailData, $imageData);
 
         // header("Location: success_page.php"); // Redirect to a success page
     }
 }
?>