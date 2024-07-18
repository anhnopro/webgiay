
    <div class="container p-4">
        <h5 class="p-4">Tình trạng đơn hàng</h5>
        <?php foreach($orders as $order): ?>
        <form action="<?= ROOT_PATH ?>cart/edit/<?= $order['id_order'] ?>" method="POST">
            <input type="hidden" name="id_order" value="<?= $order['id_order']; ?>">
            <div class="mt-3 mb-3">
                <p>Trạng thái đơn hàng</p>
                <select name="condition" class="form-control">
                    <option value="Đang chờ" <?php if ($order['condition'] == 'Đang chờ') echo 'selected'; ?>>Đang chờ</option>
                    <option value="Đang xử lí" <?php if ($order['condition'] == 'Đang xử lí') echo 'selected'; ?>>Đang xử lí</option>
                    <option value="Đã xác nhận" <?php if ($order['condition'] == 'Đã xác nhận') echo 'selected'; ?>>Đã xác nhận</option>
                    <option value="Đang giao" <?php if ($order['condition'] == 'Đang giao') echo 'selected'; ?>>Đang giao</option>
                    <option value="Đã giao" <?php if ($order['condition'] == 'Đã giao') echo 'selected'; ?>>Đã giao</option>
                    <option value="Đã hủy" <?php if ($order['condition'] == 'Đã hủy') echo 'selected'; ?>>Đã hủy</option>
                    <option value="Chờ thanh toán" <?php if ($order['condition'] == 'Chờ thanh toán') echo 'selected'; ?>>Chờ thanh toán</option>
                    <option value="Thất bại" <?php if ($order['condition'] == 'Thất bại') echo 'selected'; ?>>Thất bại</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="btn_updateOrder">Submit</button>
        </form>
        <?php endforeach; ?>
    </div>
