<?php
namespace App\Controllers\Client;

use App\Models\ProductModel;

class ProductController extends BaseController {
    public function home(){
        $products=ProductModel::listPrdHome();
        $productHot=ProductModel::listPrdHomeHOT();
        $this->view("home",compact('products','productHot'));
    }
    
      
    
    
    public function detailPrd($id){
        ProductModel::view($id);
        $product=ProductModel::listprdDetail($id);
        $this->view("product/detailPrd",['product'=>$product]);
    }
}
?>
