<div style="width: calc(100% - 220px);">
    <div class="container p-4">
        <h5 class="p-4">Form chỉnh sửa thuộc tính sản phẩm</h5>
        <form action="<?= ROOT_PATH ?>product/update/attr" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="id_product" class="form-label">Mã sản phẩm</label>
                <input type="hidden" class="form-control" id="id_product" value="<?= $products['id'] ?>" name="id_product">
            </div>
            <div class="mb-3">
                <label for="size" class="form-label">Size</label><br>
                <?php 
                $selectedSizes = explode(',', $products['sizes']);
                foreach ($size as $sizes) : ?>
                    <div class="form-check form-check-inline">
                        <input type="hidden" name="original_sizes[]" value="<?= $sizes['id_attribute'] ?>" <?= in_array($sizes['value'], $selectedSizes) ? '' : 'disabled' ?>>
                        <input class="form-check-input" type="checkbox" name="sizes[]" value="<?= $sizes['id_attribute'] ?>"
                            <?= in_array($sizes['value'], $selectedSizes) ? 'checked' : '' ?>>
                        <label class="form-check-label"><?= $sizes['value'] ?></label>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="mb-3">
                <label for="color" class="form-label">Color</label><br>
                <?php 
                $selectedColors = explode(',', $products['colors']);
                foreach ($color as $colors) : ?>
                    <div class="form-check form-check-inline">
                        <input type="hidden" name="original_colors[]" value="<?= $colors['id_attribute'] ?>" <?= in_array($colors['value'], $selectedColors) ? '' : 'disabled' ?>>
                        <input class="form-check-input" type="checkbox" name="colors[]" value="<?= $colors['id_attribute'] ?>"
                            <?= in_array($colors['value'], $selectedColors) ? 'checked' : '' ?>>
                        <label class="form-check-label">
                            <i class='bx bxs-brush' style="color:<?= $colors['value'] ?>;font-size:20px;"></i>
                        </label>
                    </div>
                <?php endforeach; ?>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
