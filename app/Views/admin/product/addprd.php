<div style="width: calc(100% - 220px);">
  <div class="container p-4">
    <h5 class="p-4">Form thêm sản phẩm</h5>
    <form action="<?= ROOT_PATH ?>admin/product/add" method="post" enctype="multipart/form-data">
      <div>
        <p>Danh mục</p>
        <select name="id_category" id="category" class="form-control">
          <option value="1">-Danh mục-</option>
          <?php foreach ($category as $category1) : ?>
            <option value="<?= $category1['id_category'] ?>"> <?= $category1['name'] ?> </option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="mb-2 mt-2">
        <label for="id_product" class="form-label">Mã sản phẩm</label>
        <input type="text" class="form-control" id="id_product" placeholder="Enter name" name="id_product">
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
        <label for="sale_price" class="form-label">Giá ưu đãi</label>
        <input type="text" class="form-control" id="sale_price" placeholder="Enter sale_price" name="sale_price">
      </div>
      <!-- <div class="mb-2 mt-2">
        <label for="qty" class="form-label">Số lượng</label>
        <input type="text" class="form-control" id="qty" placeholder="Enter qty" name="qty">      </div> -->
      <div class="mb-2 mt-2">
        <label for="size" class="form-label">Size</label><br>
        <?php foreach ($size as $sizes) : ?>
          <label class="p-1"> <input type="checkbox" name="sizes[]" id="" value="<?= $sizes['id_attribute'] ?>"> <?= $sizes['value'] ?></label>
        <?php endforeach; ?>
      </div>
      <div class="mb-2 mt-2">
        <label for="color" class="form-label">Color</label><br>
        <?php foreach ($color as $colors) : ?>
          <label class="p-1"><input type="checkbox" name="colors[]" id="" value="<?= $colors['id_attribute'] ?>"><i class='bx bxs-brush' style="color:<?= $colors['value'] ?>;font-size:20px;"></i></label>
        <?php endforeach; ?>
      </div>
      <div class="mb-2 mt-2">
        <label for="describe" class="form-label">Mô tả</label>
        <textarea class="col-12 rol2 border rounded-2" id="describe" name="describe"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>