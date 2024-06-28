<?php
namespace App\Controllers\Client;

class OrderController extends BaseController{
  
  public function showCart(){
    session_start();
    $this->view("order/cart",[]);
  }
  public function addCart() {
    session_start();

    // Khởi tạo giỏ hàng nếu chưa tồn tại
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Lấy thông tin sản phẩm từ POST
    $id_product = $_POST['id_product'];
    $qty = $_POST['qty'];
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    $color = $_POST['colors'];
    $size = $_POST['sizes'];

    $flag = false;

    // Duyệt qua các sản phẩm trong giỏ hàng
    foreach ($_SESSION['cart'] as &$item) {
        // Nếu sản phẩm đã có trong giỏ hàng với cùng mã, size và màu sắc
        if ($item['id_product'] == $id_product && $item['sizes'] == $size && $item['colors'] == $color) {
            $flag = true;
            // Tăng số lượng sản phẩm
            $item['qty'] += $qty;
            break;
        }
    }

    // Nếu không có sản phẩm nào trùng mã, size và màu sắc
    if (!$flag) {
        // Tạo một mảng mới cho sản phẩm
        $product = [
            'id_product' => $id_product,
            'qty' => $qty,
            'product_name' => $product_name,
            'price' => $price,
            'image' => $image,
            'colors' => $color,
            'sizes' => $size
        ];
        // Thêm sản phẩm vào giỏ hàng
        $_SESSION['cart'][] = $product;
    }

    // Chuyển hướng người dùng đến trang giỏ hàng sau khi thêm sản phẩm thành công
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
public function deleteProductCart($id_product, $color, $size){
  session_start();
  

  $color = urldecode($color);
  $size = urldecode($size);

 
  foreach ($_SESSION['cart'] as $index => $item) {
      if ($item['id_product'] == $id_product && $item['colors'] == $color && $item['sizes'] == $size) {
      
          unset($_SESSION['cart'][$index]);
        
          $_SESSION['cart'] = array_values($_SESSION['cart']);
          break;
      }
  }
  

  $this->view("order/cart", []);
}
public function payment(){
    $this->view("order/pay",[]);
}




  
}
?>