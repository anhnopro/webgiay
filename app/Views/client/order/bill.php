<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8" style="width: 1000px;">
            <!-- Begin loop over orders -->
            <div class="card mb-3">
                <div class="card-body">
                <?php foreach($bill as $list): ?>
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="card-title">Thông tin đơn hàng</h5>
                            <p class="card-text"><strong>Tên khách hàng:</strong> <?= $list['name'] ?></p>
                            <p class="card-text"><strong>Email:</strong> <?= $list['email'] ?></p>
                            <p class="card-text"><strong>Số điện thoại:</strong> <?= $list['phone_number'] ?></p>
                            <p class="card-text"><strong>Địa chỉ:</strong> <?= $list['address'] ?></p>
                        </div>
                        <div class="col-md-6">
                            <h5 class="card-title">Danh sách sản phẩm</h5>
                            <?php $product_details = json_decode('[' . $list['product_details'] . ']', true); ?>
                            <?php foreach($product_details as $product): ?>
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h6 class="card-title"><?= $product['product_name'] ?></h6>
                                    <p class="card-text">Product Description</p>
                                    <p class="card-text">Số lượng: <?= $product['qty'] ?></p>
                                    <p class="card-text">Size: M</p>
                                    <p class="card-text">Giá: <?= $product['price'] ?></p>
                                    <p class="card-text">Tổng tiền: <?= $product['total'] ?></p>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="card-title">Tổng đơn hàng</h5>
                            <p class="card-text"><strong>Tổng đơn hàng:</strong> <?= $bill[0]['total_payment'] ?></p>
                        </div>
                        <div class="col-md-6">
                            <h5 class="card-title">Trạng thái đơn hàng</h5>
                            <div class="progress">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">Chờ xác nhận</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End loop over orders -->
        </div>
        <div class="col-lg-4">
          
        </div>
    </div>
</div>
