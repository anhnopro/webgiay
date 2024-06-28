<?php
$number = intval($_POST['number']);
$price = intval($_POST['price']);
$total = $number * $price;
$total=$number*$price;
$total_payment=0;
$total_payment+=$total;
$result=array(
    'price'=>$price,
    'number'=>$number,
    'total'=>number_format($total, 0, ',', '.'),
    'total_payment'=>number_format($total_payment,0, ',', '.'),
);

echo json_encode($result);
?>