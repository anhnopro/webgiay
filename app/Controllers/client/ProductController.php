<?php
namespace App\Controllers\Client;

use App\Models\ProductModel;

class ProductController extends BaseController {
    public function home(){
        $products=ProductModel::all();
        $this->view("home",['products'=>$products]);
    }
    public function detailPrd($id){
        $products=ProductModel::listprdDetail($id);
        $this->view("product/detailPrd",['products'=>$products]);
    }
}
?>
