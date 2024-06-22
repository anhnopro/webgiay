
          <div style="width: calc(100% - 220px);">
            
            <div class="container p-4" >
                <h5 class="p-4">Form thêm  danh mục</h5>
                <form action="/action_page.php">
                    
                    <div class="mb-2 mt-2">
                    
                      <input type="hiden" class="form-control" id="name" placeholder="Enter name" name="name" value="<?= $category['id_category'] ?>">
                    </div>
                    <div class="mb-2 mt-2">
                      <label for="name" class="form-label">Tên danh mục</label>
                      <input type="name" class="form-control" id="name" placeholder="Enter name" name="name" value="<?= $category['name'] ?>">
                    </div>
                
                    <div class="mb-2 mt-2">
                      <label for="image" class="form-label">Ảnh</label>
                      <input type="text" class="form-control" id="image" placeholder="Enter ảnh" name="image" value="ảnh mới">
                    </div>
                   
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
          </div>
        </div>
      </div>
  
