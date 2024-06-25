<div class="row mt-3 ms-2 container mt-4">
<div>
            <div><a href="<?= ROOT_PATH ?>add/product" class="btn btn-success">Thêm sản phẩm</a></div>
        </div>
    <div class="col-md-9 mt-2">
       
        <table class=" table border ">
            <thead>
                <tr>
                    <th>Mã sản phẩm</th>
                    <th>Mục</th>
                    <th>Tên sản phẩm</th>
                    <th>Ảnh</th>
                    <th>Giá</th>
                    <th>Giá ưu đãi</th>
                    <th>Tình trạng</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product) : ?>
                    <tr>
                        <td><?= $product['id'] ?></td>
                        <td><?= $product['category_name'] ?></td>
                        <td><?= $product['product_name']  ?></td>
                        <td>
                            <div style="height: 60px;">
                                <img src="<?= ROOT_PATH  ?>/<?= $product['image']  ?>" class="w-100 h-100">
                            </div>
                        </td>
                        <td><?= $product['price']  ?></td>
                        <td><?= $product['sale_price'] ?></td>
                        <td>
                            <span class="badge bg-danger">Hết hàng</span>
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
                                    <a class="dropdown-item" href="<?= ROOT_PATH ?>add/product/attr/<?= $product['id'] ?>">Thêm thuộc tính</a>
                                    <a class="dropdown-item" href="<?= ROOT_PATH ?>update/product/<?= $product['id'] ?>">Sửa</a>
                                    <a class="dropdown-item" href="<?= ROOT_PATH ?>detail/product/<?= $product['id'] ?>">Xem Chi Tiết</a>




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

    <div class="col-md-3 mt-2">
        <div class="bg-white d-flex p-4 rounded-3 border">
            <div>
                <h5>Tìm kiếm tại đây</h5>
                <div class="d-flex">
                    <input type="text" class="form-control rounded-0 btn-sm" placeholder="Nike, Adidas">
                    <button class="btn btn-white border rounded-0 btn-sm"><i class='bx bx-search-alt-2'></i></button>
                </div>
            </div>
        </div>
        <div class="mt-3">
            <div class="bg-white border  p-4 rounded-3">
                <h5>Danh mục</h5>
                <div class="">
                    <p> <input type="checkbox" name="" id=""> Nike </p>
                    <p> <input type="checkbox" name="" id=""> Adidas </p>
                    <p> <input type="checkbox" name="" id=""> Khác </p>
                </div>
                <div>
                    <button class="w-100 btn btn-primary">Lọc</button>
                </div>
            </div>
        </div>
    </div>
</div>