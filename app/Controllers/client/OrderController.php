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

   
    $flag=0;
    if(count($_SESSION['cart'])>0){
      foreach ($_SESSION['cart'] as $key => $value) {
        if($key==$id_product){
          $flag=1;
          $_SESSION['cart'][$id_product]['qty'] += $qty;
          break;
        }
      }
     

    }
    if($flag==0){
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
    
    }
  header("location:".ROOT_PATH."order/addCart");
}
public function deleteCart() {
  session_start();
  if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
      $_SESSION['cart'] = [];
  }
  header("Location: " . ROOT_PATH . "home");
  exit();
}
public function deleteProductCart($id){
  session_start();
  unset($_SESSION['cart'][$id]);
   $this->view("order/cart",[]);
}


  
}
?>