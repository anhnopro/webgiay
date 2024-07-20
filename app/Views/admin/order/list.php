<div class="container-fluid">
    <div style="background-color: rgb(249, 247, 247);">
        <div class="d-flex justify-content-between">
            <div class="container" style="width: calc(100% - 220px);">
                <div class="row mt-3 ms-2">
                    <div>
                        <table class="table border">
                            <thead>
                                <tr>
                                    <th>Đơn hàng</th>
                                    <th>Ngày</th>
                                    <th>Tình trạng</th>
                                    <th>Tổng</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($bill as $list) : ?>
                                    <tr>
                                        <td>#<?= $list['id_order'] ?> <?= $list['name'] ?></td>
                                        <td><?= $list['date'] ?></td>
                            
                                        <td><span class="badge bg-danger"><?= $list['condition'] ?></span></td>
                                        <td><?= number_format($list['total_payment'], 0, ",", ".") ?> VNĐ</td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-light " type="button" id="dropdownMenuButton">...</button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="<?= ROOT_PATH ?>admin/order/edit/<?= $list['id_order'] ?>">Xử lí đơn hàng</a>
                                                    <a class="dropdown-item" href="<?= ROOT_PATH ?>admin/order/show/<?= $list['id_order'] ?>">Xem</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#" style="height: 35px;"><i class='bx bx-chevrons-left'></i></a></li>
                                <li class="page-item"><a class="page-link" href="#" style="height: 35px;">1</a></li>
                                <li class="page-item "><a class="page-link" href="#" style="height: 35px;">2</a></li>
                                <li class="page-item"><a class="page-link" href="#" style="height: 35px;">3</a></li>
                                <li class="page-item"><a class="page-link" href="#" style="height: 35px;"><i class='bx bx-chevrons-right'></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

       
    
</div>
