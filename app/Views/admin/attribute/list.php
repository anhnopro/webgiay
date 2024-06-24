<div style="width: calc(100% - 220px);">
    <div class="row mt-3 ms-2">
        <div class="col-md-9">
            <table class="table border">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên thuộc tính</th>
                        <th>Giá trị</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    // Hiển thị các giá trị size trước
                    foreach ($attribute as $column => $value):
                        if ($value['name'] == 'size'): ?>
                            <tr>
                                <td><?= $value['id_attribute'] ?></td>
                                <td><?= $value['name'] ?></td>
                                <td><p><?= $value['value'] ?></p></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-light" type="button" id="dropdownMenuButton">...</button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#myModal">Xóa</a>
                                            <a class="dropdown-item" href="#">Thêm</a>
                                            <a class="dropdown-item" href="<?= ROOT_PATH ?>category/update/<?= $cate['id_category'] ?>">Sửa</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endif; 
                    endforeach; ?>

                    <?php 
                    // Hiển thị các giá trị color sau
                    foreach ($attribute as $column => $value):
                        if ($value['name'] != 'size'): ?>
                            <tr>
                                <td><?= $value['id_attribute'] ?></td>
                                <td><?= $value['name'] ?></td>
                                <td><i class='bx bxs-brush' style='color: <?= $value['value'] ?>; font-size:20px;'></i></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-light" type="button" id="dropdownMenuButton">...</button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#myModal">Xóa</a>
                                            <a class="dropdown-item" href="#">Thêm</a>
                                            <a class="dropdown-item" href="<?= ROOT_PATH ?>category/update/<?= $cate['id_category'] ?>">Sửa</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endif; 
                    endforeach; ?>
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#" style="height: 35px;"><i class='bx bx-chevrons-left'></i></a></li>
                    <li class="page-item"><a class="page-link" href="#" style="height: 35px;">1</a></li>
                    <li class="page-item"><a class="page-link" href="#" style="height: 35px;">2</a></li>
                    <li class="page-item"><a class="page-link" href="#" style="height: 35px;">3</a></li>
                    <li class="page-item"><a class="page-link" href="#" style="height: 35px;"><i class='bx bx-chevrons-right'></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Xóa sản phẩm</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                Bạn có muốn xóa không?
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">OK</button>
                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

</body>
</html>
