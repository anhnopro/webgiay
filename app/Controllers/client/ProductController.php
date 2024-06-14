<?php
namespace App\Controllers\Client;

use App\Models\ProductModel;

class ProductController extends BaseController {
    public function home(){
        $products=ProductModel::all();
        $this->view("index",['products'=>$products]);
    }
}
?>
