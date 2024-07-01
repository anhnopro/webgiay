<div class="container-fluid">
    <section>
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-6">
                    <img src="<?= ROOT_PATH ?>/<?= $product['image'] ?>" width="465px" height="400" id="main-img">
                    <p>
                        <img src="images/sp2.jpg" width="90">
                        <img src="images/sp3.jpg" width="90">
                        <img src="images/sp4.jpg" width="90">
                        <img src="images/sp5.jpg" width="90">
                        <img src="images/sp6.jpg" width="90">
                    </p>
                </div>

                <div class="col-md-6">
                    <h4 style="font-size: 15px;"><?= $product['product_name'] ?></h4>
                    <hr>
                    <h4 style="font-size: 15px;"><?= number_format($product['price'], 0, ',', '.') . ' VND' ?></h4>
                    <hr>
                    <p>Màu sắc</p>

                    <div class="color-selection">
                        <?php
                        $colors = explode(',', $product['colors']);
                        foreach ($colors as $color) : ?>
                            <button type="button" class="color-option border rounded-circle m-1" style="width: 20px; height: 20px;background-color:<?= $color; ?>" data-color="<?= $color ?>"></button>
                        <?php endforeach; ?>
                    </div>
                    <hr>
                    <p>Size giày</p>
                    <div class="size-selection">
                        <?php
                        $sizes = explode(',', $product['sizes']);
                        foreach ($sizes as $size) :
                        ?>
                            <button type="button" class="size-option bg-primary border m-1" data-size="<?= $size ?>"><?= $size ?></button>
                        <?php endforeach; ?>
                    </div>
                    <hr>

                    <form id="add-to-cart-form" action="<?= ROOT_PATH ?>order/addCart" method="post">
                        <input type="hidden" name="id_product" value="<?= $product['id'] ?>">
                        <div class="group-button">
                            <button type="button" class="soluong border" onclick="thaydoisoluong('-')" style="width: 30px;">-</button>
                            <input type="tel" class="soluong1 text-center border" value="1" id="soluong" name="qty" style="width: 90px; height: 30px;">
                            <button type="button" class="soluong border" onclick="thaydoisoluong('+')" style="width: 30px;">+</button>
                        </div>
                        <input type="hidden" name="product_name" value="<?= $product['product_name'] ?>">
                        <input type="hidden" name="price" value="<?= $product['price'] ?>">
                        <input type="hidden" name="image" value="<?= $product['image'] ?>">
                        <input type="hidden" id="selected-color" name="colors">
                        <input type="hidden" id="selected-size" name="sizes">
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary-button btn-block mt-4" id="add-to-cart-btn">Thêm vào giỏ hàng</button>
                        </div>
                    </form>

                    <div class="mt-4 mota">
                        <h4>Mô tả</h4>
                        <p><?= $product['describe'] ?></p>
                        <ul>
                            <li>Chất liệu cao cấp EVA, PU, Cushlon, Phylon.</li>
                            <li>Bền đẹp, tăng tính đàn hồi, giày nhẹ và êm ái hơn. Mũi giày đầy đặn, form dáng chuẩn.</li>
                            <li>Bảo vệ đầu ngón chân khi hoạt động.</li>
                            <li>Bên trong có lớp lót êm.</li>
                            <li>Giúp bảo vệ và hạn chế đau chân, có độ đàn hồi cao khi vận động, di chuyển. Cổ giày ôm sát theo chân.</li>
                            <li>Thiết kế ôm theo vùng mắt cá, có lớp đệm bảo vệ cổ chân. Đế cao su công nghệ đệm êm ái.</li>
                            <li>Bền, thoải mái khi mang.</li>
                            <li>Lớp lót trong có đệm êm ái kết hợp với công nghệ thoáng khí Air Cooled Memory Foam vừa ngăn mùi, vừa không gây bí chân</li>
                            <li>Đế cao su nhẹ bền có độ đàn hồi tốt giúp giảm tối đa chấn thương khi bạn tập luyện hoặc chơi thể thao.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container mt-5">
        <h4 class="text-center"> Sản phẩm liên quan </h4>
        <div class="row">
            <div class="col-md-2 mb-3">
                <img src="images/sp1.jpg" width="200" height="200">
                <h4>Tên sản phẩm</h4>
                <span>400.000VNĐ</span>
            </div>
            <div class="col-md-2 mb-3">
                <img src="images/sp2.jpg" width="200" height="200">
                <h4>Tên sản phẩm</h4>
                <span>400.000VNĐ</span>
            </div>
            <div class="col-md-2 mb-3">
                <img src="images/sp3.jpg" width="200" height="200">
                <h4>Tên sản phẩm</h4>
                <span>400.000VNĐ</span>
            </div>
            <div class="col-md-2 mb-3">
                <img src="images/sp4.jpg" width="200" height="200">
                <h4>Tên sản phẩm</h4>
                <span>400.000VNĐ</span>
            </div>
            <div class="col-md-2 mb-3">
                <img src="images/sp5.jpg" width="200" height="200">
                <h4>Tên sản phẩm</h4>
                <span>400.000VNĐ</span>
            </div>
            <div class="col-md-2 mb-3">
                <img src="images/sp6.jpg" width="200" height="200">
                <h4>Tên sản phẩm</h4>
                <span>400.000VNĐ</span>
            </div>
            <div class="col-md-2 mb-3">
                <img src="images/sp7.jpg" width="200" height="200">
                <h4>Tên sản phẩm</h4>
                <span>400.000VNĐ</span>
            </div>
            <div class="col-md-2 mb-3">
                <img src="images/sp8.jpg" width="200" height="200">
                <h4>Tên sản phẩm</h4>
                <span>400.000VNĐ</span>
            </div>
            <div class="col-md-2 mb-3">
                <img src="images/sp2.jpg" width="200" height="200">
                <h4>Tên sản phẩm</h4>
                <span>400.000VNĐ</span>
            </div>
            <div class="col-md-2 mb-3">
                <img src="images/sp1.jpg" width="200" height="200">
                <h4>Tên sản phẩm</h4>
                <span>400.000VNĐ</span>
            </div>
            <div class="col-md-2 mb-3">
                <img src="images/sp6.jpg" width="200" height="200">
                <h4>Tên sản phẩm</h4>
                <span>400.000VNĐ</span>
            </div>
            <div class="col-md-2 mb-3">
                <img src="images/sp7.jpg" width="200" height="200">
                <h4>Tên sản phẩm</h4>
                <span>400.000VNĐ</span>
            </div>
        </div>
    </div>


</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('p img').mouseenter(function() {
            let imgPath = $(this).attr('src');
            $('#main-img').attr('src', imgPath);
        });

        $('p img').click(function() {
            let imgPath = $(this).attr('src');
            $('#main-img').attr('src', imgPath);
        });

        // Color selection
        const colorOptions = document.querySelectorAll('.color-option');
        colorOptions.forEach(option => {
            option.addEventListener('click', function() {
                colorOptions.forEach(opt => opt.classList.remove('selected'));
                this.classList.add('selected');
                document.getElementById('selected-color').value = this.dataset.color;
                checkFormValidity();
            });
        });

        // Size selection
        const sizeOptions = document.querySelectorAll('.size-option');
        sizeOptions.forEach(option => {
            option.addEventListener('click', function() {
                sizeOptions.forEach(opt => opt.classList.remove('selected'));
                this.classList.add('selected');
                document.getElementById('selected-size').value = this.dataset.size;
                checkFormValidity();
            });
        });

        // Check form validity to enable/disable Add to Cart button
        function checkFormValidity() {
            const selectedColor = document.getElementById('selected-color').value;
            const selectedSize = document.getElementById('selected-size').value;
            const addToCartBtn = document.getElementById('add-to-cart-btn');
            if (selectedColor && selectedSize) {
                addToCartBtn.disabled = false;
            } else {
                addToCartBtn.disabled = true;
            }
        }

        // Handle quantity change
        const quantityInput = document.getElementById('soluong');
        const decreaseBtn = document.querySelector('button.soluong:nth-child(1)');
        const increaseBtn = document.querySelector('button.soluong:nth-child(3)');

        decreaseBtn.addEventListener('click', function() {
            let currentValue = parseInt(quantityInput.value, 10);
            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
            }
        });

        increaseBtn.addEventListener('click', function() {
            let currentValue = parseInt(quantityInput.value, 10);
            quantityInput.value = currentValue + 1;
        });

        // Ensure the input field allows only valid numeric values and within specified range
        quantityInput.addEventListener('input', function() {
            let value = parseInt(this.value, 10);
            if (isNaN(value) || value < 1) {
                this.value = 1;
            } else if (value > 10) {
                this.value = 10;
            }
        });
    });
</script>


<script src="js/bootstrap.min.js">

</script>