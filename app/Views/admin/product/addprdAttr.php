<div style="width: calc(100% - 220px);">
    <div class="container p-4">
        <h5 class="p-4">Form thêm thuộc tính sản phẩm </h5>
        <form action="<?= ROOT_PATH ?>add/product/attr" method="post" enctype="multipart/form-data">
            <div class="mb-2 mt-2">
                <input type="hidden" class="form-control" id="id_product" value="<?= $products['id'] ?>" name="id_product">
            </div>
            <div class="mb-2 mt-2">
                <label for="size" class="form-label">Size</label><br>
                <?php 
                $selectedSizes = explode(',', $products['sizes']);
                foreach ($size as $sizes) : ?>
                    <label class="p-1">
                        <input type="checkbox" name="sizes[]" value="<?= $sizes['id_attribute'] ?>"
                            <?= in_array($sizes['value'], $selectedSizes) ? 'checked' : '' ?>> <?= $sizes['value'] ?>
                    </label>
                <?php endforeach; ?>
            </div>
            <div class="mb-2 mt-2">
                <label for="color" class="form-label">Color</label><br>
                <?php 
                $selectedColors = explode(',', $products['colors']);
                foreach ($color as $colors) : ?>
                    <label class="p-1">
                        <input type="checkbox" name="colors[]" value="<?= $colors['id_attribute'] ?>"
                            <?= in_array($colors['value'], $selectedColors) ? 'checked' : '' ?>>
                        <i class='bx bxs-brush' style="color:<?= $colors['value'] ?>;font-size:20px;"></i>
                    </label>
                <?php endforeach; ?>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
