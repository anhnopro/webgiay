<div style="width: calc(100% - 220px);" class="container my-4">
    <div class="container p-4">
        <h5 class="p-4">Form cập nhật sản phẩm</h5>
        <form action="" method="post" enctype="multipart/form-data">
            <div>
                <p>Danh mục</p>
             
                <select name="id_category" id="" class="form-control">
                <?php foreach($category as $cate) : ?>
                    <option value="<?= $cate['id_category'] ?>" selected><?= $cate['name'] ?></option>
                    <?php endforeach; ?>
                </select>
              
            </div>
            <input type="hidden" class="form-control" id="id" name="id" value="<?=  $products['id'] ?>">

            <div class="mb-2 mt-2">
                <label for="name" class="form-label">Tên sản phẩm</label>
                <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="<?= $products['product_name'] ?>">
            </div>
            <div class="mb-2 mt-2">
                <label for="price" class="form-label">Giá</label>
                <input type="text" class="form-control" id="price" placeholder="Enter price" name="price" value="<?= $products['price'] ?>">
            </div>
            <div class="mb-2 mt-2">
                <label for="sale_price" class="form-label">Giá giảm</label>
                <input type="text" class="form-control" id="sale_price" placeholder="Enter sale price" name="sale_price" value="<?= $products['sale_price'] ?>">
            </div>
            <div class="mb-2 mt-2">
                <label for="image" class="form-label">Ảnh</label><br>
                <img src="<?= ROOT_PATH ?>/<?= $products['image'] ?>" alt="Product Image">
                <input type="file" class="form-control" id="image" name="image">
            </div>
            <div class="mb-2 mt-2">
                <label for="size" class="form-label">Kích cỡ</label>
                <div id="size-inputs" class="row g-2">
                    <?php
                    $sizes = explode(',', $products['sizes']);
                    foreach ($sizes as $index => $size) : ?>
                        <div class="col-auto">
                            <input type="number" class="form-control" id="size_<?= $index ?>" name="sizes[]" value="<?= $size ?>">
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="mb-2 mt-2">
                <label for="color" class="form-label">Màu sắc</label>
                <?php
                $colors = explode(',', $products['colors']);
                foreach ($colors as $color) : ?>
                    <input type="color" class="form-control" name="colors[]" value="<?= $color ?>"><br>
                <?php endforeach; ?>
            </div>
            <div class="mb-2 mt-2">
                <label for="describe" class="form-label">Mô tả</label>
                <textarea class="col-12 rol2 border rounded-2" name="describe"><?= $products['describe'] ?></textarea>
            </div>
            <div class="mb-2 mt-2">
                <label for="soluong" class="form-label">Số lượng</label>
                <input type="number" class="form-control" id="soluong" placeholder="Enter số lượng" name="soluong" value="10">
            </div>
            <div class="mb-2 mt-2">
                <p>Trạng thái</p>
                <select name="status" id="" class="form-control">
                    <option value="1">-Trạng thái-</option>
                    <option value="2" selected>Còn hàng</option>
                    <option value="2">Hết hàng</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="btn_update">Submit</button>
        </form>
    </div>
</div>
