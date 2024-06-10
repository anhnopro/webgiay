<div style="width: calc(100% - 220px);">
  <div class="container p-4">
    <h5 class="p-4">Form thêm sản phẩm</h5>
    <form action="<?= ROOT_PATH ?>add/product" method="post" enctype="multipart/form-data">
      <div>
        <p>Danh mục</p>
        <select name="category" id="category" class="form-control">
          <option value="1">-Danh mục-</option>
          <?php foreach($category as $category1): ?>
          <option value="<?= $category1['id_category'] ?>"> <?= $category1['name_cate'] ?> </option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="mb-2 mt-2">
        <label for="id_product" class="form-label">Mã sản phẩm</label>
        <input type="text" class="form-control" id="id_product" placeholder="Enter product id" name="id_product">
      </div>
      <div class="mb-2 mt-2">
        <label for="name" class="form-label">Tên sản phẩm</label>
        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
      </div>
      <div class="mb-2 mt-2">
        <label for="path" class="form-label">Ảnh</label>
        <input type="file" class="form-control" id="path" name="path">
      </div>
      <div class="mb-2 mt-2">
        <label for="price" class="form-label">Giá</label>
        <input type="text" class="form-control" id="price" placeholder="Enter price" name="price">
      </div>
      <div class="mb-2 mt-2">
        <label for="qty" class="form-label">Số lượng</label>
        <input type="text" class="form-control" id="qty" placeholder="Enter qty" name="qty">
      </div>
      <div class="mb-2 mt-2">
        <label for="size" class="form-label">Size</label>
        <input type="text" class="form-control" id="size" placeholder="Enter size" name="size">
      </div>
      <div class="mb-2 mt-2">
        <label for="color" class="form-label">Màu sắc</label>
        <input type="text" class="form-control" id="color" placeholder="Enter color" name="color">
      </div>
      <div class="mb-2 mt-2">
        <label for="description" class="form-label">Mô tả</label>
        <textarea class="col-12 rol2 border rounded-2" id="description" name="description"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>
