<?php
namespace App\Controllers\Client;
class OrderController extends BaseController{
  public function showCart(){
    session_start();
    $this->view("order/cart",[]);
  }
 public function addCart() {
    session_start();
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    
    $id_product = $_POST['id_product'];
    $qty = $_POST['qty'];
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    $colors = $_POST['colors'];
    $sizes = $_POST['sizes'];

    $product = [
        'id_product' => $id_product,
        'qty' => $qty,
        'product_name' => $product_name,
        'price' => $price,
        'image' => $image,
        'colors' => $colors,
        'sizes' => $sizes
    ];

    $_SESSION['cart'][$id_product] = $product;
    $this->view("order/cart", ['product' => $product]);
}
public function deleteCart() {
  session_start();
  if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
      $_SESSION['cart'] = [];
  }
  header("Location: " . ROOT_PATH . "home");
  exit();
}


  
}
?>