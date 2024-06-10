<?php
namespace App\Controllers\Admin;
class BaseController{
   public function view($path,$data=[]){
    extract($data);
    include_once './app/Views/admin/header.php';
    include_once "./app/Views/admin/$path.php";
    include_once './app/Views/admin/footer.php';

   }
}
?>