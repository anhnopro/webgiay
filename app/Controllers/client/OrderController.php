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


    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

   
    $id_product = $_POST['id_product'];
    $qty = $_POST['qty'];
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    $color = $_POST['colors'];
    $size = $_POST['sizes'];

    $flag = false;

 
    foreach ($_SESSION['cart'] as &$item) {
     
        if ($item['id_product'] == $id_product && $item['sizes'] == $size && $item['colors'] == $color) {
            $flag = true;
          
            $item['qty'] += $qty;
            break;
        }
    }


    if (!$flag) {
  
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
     
        $orderData = [
            'phone_number' => $_POST['phone_number'],
            'address' => $_POST['address'],
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'date' => date('Y-m-d')
        ];

   
        $orderId = OrderModel::add($orderData);


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