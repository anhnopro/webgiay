
<div class="modal-dialog mt-5" style="max-width: 1000px; margin: auto;">
    <div class="modal-content">
        <div class="modal-header d-flex justify-content-between align-items-center">
            <h3 class="modal-title">Đơn hàng</h3>
            <div class="d-flex align-items-center">
                <a class="dropdown-item" href="#" style="margin-right: 10px;">Xử lí đơn hàng</a>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
        </div>
        <div class="modal-body mt-2">
            <?php if (!empty($billId)) : ?>
                <div>
                    <h4>Thông tin thanh toán</h4>
                    <p><?= htmlspecialchars($billId[0]['name']) ?></p>
                    <p><?= htmlspecialchars($billId[0]['address']) ?></p>
                </div>
                <div>
                    <h4>Số điện thoại</h4>
                    <p><?= htmlspecialchars($billId[0]['phone_number']) ?></p>
                </div>
                <div>
                    <h4>Email</h4>
                    <p><?= htmlspecialchars($billId[0]['email']) ?></p>
                </div>
                <hr>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Tổng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $products = json_decode('[' . $billId[0]['product_details'] . ']', true);
                        foreach ($products as $product) : ?>
                            <tr>
                                <td><?= htmlspecialchars($product['product_name']) ?></td>
                                <td><?=number_format($product['price'], 0, ",", ".") ?></td>
                                
                                <td><?= htmlspecialchars($product['qty']) ?></td>
                                <td><?= number_format($product['total'], 0, ",", ".") ?> VNĐ</td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else : ?>
                <p>Không tìm thấy thông tin đơn hàng.</p>
            <?php endif; ?>
        </div>
        <div class="modal-footer text-center">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><a href="<?= ROOT_PATH ?>admin/order/list" class="nav-link">Close</a></button>
            
        </div>
    </div>
</div>
