<?php
$total_payment = 0;
$html_cart = '';
if (count($_SESSION['cart']) > 0) {
    foreach ($_SESSION['cart'] as $index => $item) {
        $total = (int)($item['qty']) * (int)($item['price']);
        $total_payment += $total;
        $colors = is_array($item['colors']) ? implode(', ', $item['colors']) : $item['colors'];
        $sizes = is_array($item['sizes']) ? implode(', ', $item['sizes']) : $item['sizes'];
        $html_cart .= '<div class="container mt-5">
            <div class="row d-flex justify-content-between">
                <div class="col-md-6">
                    <table>
                        <tr class="mb-3">
                            <td>
                                <div class="border border-danger">
                                    <img src="' . ROOT_PATH . '/' . $item['image'] . '" height="130px" class="mh-100">
                                </div>
                            </td>
                            <td class="ml-3">
                               <div class="ms-3">
                                <h5>' . $item['product_name'] . '</h5>
                                <p>' . number_format($item['price'], 0, ',', '.') . ' VNĐ </p>
                                <p>' . htmlspecialchars($colors) . ' / ' . htmlspecialchars($sizes) . '</p>
                                <p>
                                    <div class="group-button">
                                        <button type="button" class="soluong border" onclick="thaydoisoluong(\'' . $index . '\', \'-\')" style="width: 30px;">-</button>
                                        <input type="tel" class="soluong1 text-center border" value="' . $item['qty'] . '" id="soluong' . $index . '" style="width: 90px;" onkeyup="kiemtrasoluong(this, ' . $index . ')">
                                        <button type="button" class="soluong border" onclick="thaydoisoluong(\'' . $index . '\', \'+\')" style="width: 30px;">+</button>
                                    </div>
                                </p>
                               </div>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-1">
                    <div class="d-flex flex-column align-items-start">
                        <div class="mb-3">
                           <a href="' . ROOT_PATH . 'order/deleteProductCart/' . $item['id_product'] . '/' . urlencode($item['colors']) . '/' . urlencode($item['sizes']) . '" class="nav-link">
                               <p class="display-6">X</p>
                           </a>
                        </div>
                        <div class="mt-5">
                            <p>' . number_format($total, 0, ',', '.') . ' VNĐ </p>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
       </div>';
    }
}

?>

<section>
    <div class="container">
        <h1 class="text-center mt-4">Giỏ hàng của bạn</h1>
        <p class="text-center">Có 2 sản phẩm trong giỏ hàng</p>
        <?= $html_cart; ?>
    </div>
</section>
<section>
    <div class="container">
        <div class="row d-flex justify-content-between">
            <div class="col-md-6 mt-3">
                <textarea class="form-control w-100" rows="3">
             Ghi chú
              </textarea>
            </div>
            <div class="col-md-3">
                <p>Tổng tiền :
                <h3><?= number_format($total_payment, 0, ',', '.') ?> VNĐ</h3>
                </p>
                <div class="d-flex">
                    <button class="btn btn-primary rounded-0 btn-sm">Tiếp tục mua hàng</button>
                    <button class="btn btn-primary rounded-0 tn-sm ms-2">Thanh toán</button>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('p img').mouseenter(function() {
            let imgPath = $(this).attr('src');
            $('#main-img').attr('src', imgPath);
        });
    });

    function kiemtrasoluong(x) {
        var number = parseInt(x.value);
        if (number < 1) {
            x.value = 1;
            alert("Phải nhập số lượng ít nhất là 1");
        }
        if (number > 10) {
            x.value = 10;
            alert("Phải nhập số lượng nhiều nhất là 10");
        }
    }

    function thaydoisoluong(index, toantu) {
        let luong = $('#soluong' + index);
        let soluong = luong.val();

        console.log('Current value:', soluong);

        soluong = parseInt(soluong);

        if (isNaN(soluong)) {
            alert('Giá trị không hợp lệ');
            return;
        }

        if (toantu === '-') {
            if (soluong > 1) {
                luong.val(soluong - 1);
            }
        } else if (toantu === '+') {
            luong.val(soluong + 1);
        } else {
            alert('Cảnh báo nguy hiểm');
        }
    }

    $(() => {
        $('p img').click(function() {
            let imgPath = $(this).attr('src');
            $('#main_img').attr('src', imgPath);
        })
    });
</script>
