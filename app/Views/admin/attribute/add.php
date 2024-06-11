<div style="width: calc(100% - 220px);">
  <div class="container p-4">
    <h5 class="p-4 text-center">Form thêm thuộc tính</h5>
    <form action="<?= ROOT_PATH ?>add/attribute" method="post">
      <div>
        <p>Tên thuộc tính</p>
        <select name="name" id="check_attr" class="form-control">
          <option value="size">Size</option>
          <option value="color">Color</option>
        </select>
      </div>
      <p>Giá trị</p>
      <div class="mb-2 mt-2">
        <input type="text" class="form-control contents" id="size" placeholder="Enter size" name="size_value" style="display: none;">
        <input type="color" class="form-control contents" id="color" placeholder="Enter color" name="color_value" style="display: none;">
      </div>
      <div class="text-center mt-3">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
</div>

<script>
document.getElementById('check_attr').addEventListener('change', function() {
    var value = this.value;
    var contents = document.querySelectorAll('.contents');
    contents.forEach(function(content) {
        if (content.id === value) {
            content.style.display = 'block';
        } else {
            content.style.display = 'none';
        }
    });
});

// Optionally, trigger the change event on page load to hide all content by default
document.getElementById('check_attr').dispatchEvent(new Event('change'));
</script>
