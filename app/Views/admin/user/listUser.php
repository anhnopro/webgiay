<div class="row mt-3 ms-2 container mt-4">
    <div class="col-md-9 mt-2">

        <table class=" table border ">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Tên người dùng </th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Password</th>
                    <th>Vai trò</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <td><?= $user['id_user'] ?></td>
                        <td><?= $user['nick_name'] ?></td>
                        <td><?= $user['email']  ?></td>

                        <td><?= $user['phone_number']  ?></td>
                        <td><?= $user['password'] ?></td>
                        <td>
                            <?php if ($user['role'] == 1) :
                                echo 'Người dùng';
                            ?>
                            <?php elseif ($user['role'] == 0) :
                                echo 'Quản lí '; ?>

                            <?php endif; ?>
                        </td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-light " type="button" id="dropdownMenuButton">
                                    ...
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#myModal">
                                        Xóa
                                    </a>
                                    <a class="dropdown-item" href="<?= ROOT_PATH ?>admin/product/add/attr/<?= $product['id'] ?>">Thêm/Xóa thuộc tính</a>
                                    <a class="dropdown-item" href="<?= ROOT_PATH ?>admin/product/update/<?= $product['id'] ?>">Sửa</a>
                                    <a class="dropdown-item" href="<?= ROOT_PATH ?>admin/product/detail/<?= $product['id'] ?>">Xem Chi Tiết</a>
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