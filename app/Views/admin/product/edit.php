<div style="width: calc(100% - 220px);">
    <div class="container p-4">
        <h5 class="p-4">Form thêm sản phẩm</h5>
        <form action="">
            <div>
                <p>Danh mục</p>
                <select name="" id="" class="form-control" disabled>
                    <option value="1">-Danh mục-</option>
                    <option value="2" disabled selected><?= $products['category_name'] ?></option>
                </select>
            </div>
            <div class="mb-2 mt-2">
                <label for="name" class="form-label">Tên sản phẩm</label>
                <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="<?= $products['product_name'] ?>">
            </div>
            <div class="mb-2 mt-2">
                <label for="price" class="form-label">Giá</label>
                <input type="text" class="form-control" id="price" placeholder="Enter price" name="price"  value="<?= $products['price'] ?>">
            </div>
            <div class="mb-2 mt-2">
                <label for="sale_price" class="form-label">Giá giảm</label>
                <input type="text" class="form-control" id="sale_price" placeholder="Enter sale price" name="sale_price"  value="<?= $products['sale_price'] ?>">
            </div>
            <div class="mb-2 mt-2">
                <label for="image" class="form-label">Ảnh</label><br>
                <img src="<?= ROOT_PATH ?>/<?= $products['image'] ?>">
                <input type="file" class="form-control" id="image" placeholder="Enter ảnh" name="image"  value="<?= $products['image'] ?>">
            </div>
            <div class="mb-2 mt-2">
                <label for="soluong" class="form-label">Số lượng</label>
                <input type="number" class="form-control" id="soluong" placeholder="Enter số lượng" name="soluong"  value="10">
            </div>
            <div class="mb-2 mt-2">
                <label for="describe" class="form-label">Mô tả</label>
                <textarea class="col-12 rol2 border rounded-2" disabled><?= $products['describe'] ?></textarea>
            </div>
            <div class="mb-2 mt-2">
                <p>Trạng thái</p>
                <select name="" id="" class="form-control" >
                    <option value="1">-Trạng thái-</option>
                    <option value="2" selected>Còn hàng</option>
                    <option value="2">Hết hàng</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
