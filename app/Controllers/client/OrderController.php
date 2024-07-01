<?php
namespace App\Controllers\Client;

use App\Models\OrderDetailModel;
use App\Models\OrderModel;

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
    session_start();
    $this->view("order/pay",[]);
}

public function showBill(){
    $bill=OrderDetailModel::listBill();
    $this->view("order/bill",['bill'=>$bill]);
}

function addBill() {
    if (isset($_POST['btn_insertCart'])) {
        session_start();
        // Prepare order data
        $orderData = [
            'phone_number' => $_POST['phone_number'],
            'address' => $_POST['address'],
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'date' => date('Y-m-d')
        ];

        // Insert order into the orders table
        $orderId = OrderModel::add($orderData);

        // Insert each product in the cart into the order_details table
        foreach ($_SESSION['cart'] as $item) {
            $orderDetailData = [
                'name_product' => $item['product_name'],

                'total' => $item['qty'] * $item['price'],
                'qty' => $item['qty'],
                'id_order' => $orderId,
                'id_product' => $item['id_product'],
                'total_payment'=> $totalPayment = array_reduce($_SESSION['cart'], function ($carry, $item) {
                    return $carry + ($item['qty'] * $item['price']);
                }, 0)
               
            ];
            OrderDetailModel::add($orderDetailData);
        }
    }
}


  
}
?>