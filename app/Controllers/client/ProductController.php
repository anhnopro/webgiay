<?php
namespace App\Controllers\Client;

use App\Models\ProductModel;

class ProductController extends BaseController {
    public function home() {
        $product = ProductModel::getProductsWithDetails();
        return $this->view("client/index", ["product" => $product]);
    }
}
?>
