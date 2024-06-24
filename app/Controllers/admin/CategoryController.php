<?php
namespace App\Controllers\Admin;

use App\Models\CategoryModel;

class   CategoryController extends BaseController{
    public function all(){
        $category=CategoryModel::all();
        $this->view("category/list",["category"=>$category]);
    }
    public function showAddCategory(){
        $this->view("category/add");
    }
    public function addCategory(){
         if(isset($_POST['btn_insert'])){
          $data=[
          'name'=>$_POST['name']
          ];
         if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $target_dir = "assets/images/";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $data['image'] = $target_file;
            }
        }
        CategoryModel::add($data);
        header("location:".ROOT_PATH."category/list");
         }
       
    }
     public function showUpdateCategory($id){
        
        $category=CategoryModel::find($id);
        $this->view("category/edit",['category'=>$category]);
     }
     public function updateCategory(){
        if(isset($_POST['btn_update'])){
            $data=[
                'id_category'=>$_POST['id_category'],
                'name'=>$_POST['name'],
           
    
            ];
            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $target_dir = "assets/images/";
                $target_file = $target_dir . basename($_FILES["image"]["name"]);
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    $data['image'] = $target_file;
                }
            }
            CategoryModel::update($data['id_category'],$data);
            header("location:".ROOT_PATH."category/list");
        }
       
     }
}
?>