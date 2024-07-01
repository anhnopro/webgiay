<?php

$total_payment = 0;
if (count($_SESSION['cart']) > 0) {
    $total_payment = array_reduce($_SESSION['cart'], function ($carry, $item) {
        return $carry + ((int)$item['qty'] * (int)$item['price']);
    }, 0);
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        .vertical-line {
            border-left: 2px solid rgb(213, 213, 213);
            height: 90vh;
            margin: 0;
            padding: 0;
        }
    </style>
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="container">
            <div class="container">
                <div class="row mt-5">
                    <div class="col-md-6">
                        <form action="<?= ROOT_PATH ?>pay/bill" method="post">
                            <h2>Mega Shoes</h2>
                            <p>Giỏ hàng/Thông tin thanh toán giao hàng</p>
                            <h4>Thông tin giao hàng</h4>
                            <input type="text" name="name" id="" placeholder="Họ và Tên" class="form-control"><br>
                            <div class="d-flex ">
                                <input type="text" name="email" id="" placeholder="Email" class="form-control" style="width: 350px;">
                                <div class="ms-2">
                                    <input type="text" name="phone_number" id="" placeholder="Số điện thoại" class="form-control" style="width: 200px;">
                                </div>
                            </div><br>
                            <input type="text" name="address" id="" placeholder="Địa Chỉ" class="form-control"><br>
                            <div class="d-flex justify-content-between">
                                <div>
                                    <a href="">Giỏ hàng</a>
                                </div>
                                <input type="hidden" name="total" value="<?= $total_payment ?>">
                                <div>
                                   
                                    <button class="btn btn-primary rounded-0" type="submit" name="btn_insertCart">Thanh Toán Sản Phẩm</button>
                                </div>
                            </div>
                       
                    </div>

                    <div class="col-md-6 d-flex">
                        <div class="vertical-line"></div>
                        <div class="ms-3">
                            <?php foreach ($_SESSION['cart'] as $index => $item) :
                                $total = (int)($item['qty']) * (int)($item['price']);
                                $colors = is_array($item['colors']) ? implode(', ', $item['colors']) : $item['colors'];
                                $sizes = is_array($item['sizes']) ? implode(', ', $item['sizes']) : $item['sizes']; ?>
                                    <input type="hidden" name="name_product" value="<?= $item['product_name'] ?>">
                                    <input type="hidden" name="total" value="<?= $total ?>">
                                    <input type="hidden" name="total_payment" value="<?= $total_payment ?>">
                                    <input type="hidden"  name="id_product" value="<?= $id_product ?>">
                                    <input type="hidden"  name="colors" value="<?= $colors ?>">
                                    <input type="hidden" name="sizes" value="<?= $sizes ?>">
                                <table class="table table">
                                    <tr>
                                        <td class="align-middle text-center" style="width: 80px;">
                                            <img src="<?= ROOT_PATH ?>/<?= htmlspecialchars($item['image']) ?>" class="img-fluid" width="70px">
                                        </td>
                                        <td class="align-middle">
                                            <div class="ms-4">
                                                <h5 class="mb-1" ><?= htmlspecialchars($item['product_name']) ?></h5>
                                                <p class="mb-1"><?= htmlspecialchars($colors) ?> / <?= htmlspecialchars($sizes) ?></p>
                                            </div>
                                        </td>
                                        <td class="align-middle text-end">
                                            <p class="mb-0"><?= number_format($total, 0, ',', '.') ?> VNĐ</p>
                                        </td>
                                    </tr>
                                </table>

                            <?php endforeach ?>
                            <hr>
                          
                                <div class="d-flex">
                                    <input type="text" class="form-control rounded-0 border" style="width: 350px;" placeholder="Mã giảm giá">
                                    <button class="btn btn-primary rounded-0 ms-2 ">Áp dụng</button>
                                </div>
                                <hr>
                           
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p>Tạm tính</p>
                                </div>
                                <div>
                                    <p><?= number_format($total_payment, 0, ',', '.') ?> VNĐ</p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p>Phí vận chuyển</p>
                                </div>
                                <div>
                                    <p>0₫</p>
                                </div>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between">
                                <div>Tổng cộng</div>
                                <div>
                                    <h3><?= number_format($total_payment, 0, ',', '.') ?> VNĐ</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>