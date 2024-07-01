<?php
session_start();

$id = $_POST['id'];
$colors = $_POST['colors'];
$sizes = $_POST['sizes'];
$number = intval($_POST['number']);
$price = intval($_POST['price']);

if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['id_product'] == $id && $item['colors'] == $colors && $item['sizes'] == $sizes) {
            $item['qty'] = $number;
            $item['total_payment'] = $number * $price;
            break;
        }
    }
    unset($item); 
}

$total_payment = array_reduce($_SESSION['cart'], function ($carry, $item) {
    return $carry + $item['total_payment'];
}, 0);

$result = array(
    'price' => $price,
    'number' => $number,
    'total' => number_format($number * $price, 0, ',', '.'),
    'total_payment' => number_format($total_payment, 0, ',', '.'),
);

echo json_encode($result);
?>
