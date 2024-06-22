
          <div style="width: calc(100% - 220px);">
            <div class="container p-4" >
                <h5 class="p-4">Form thêm  danh mục</h5>
                <form action="<?= ROOT_PATH ?>category/add" method="post" enctype="multipart/form-data">
                    
                    <div class="mb-2 mt-2">
                      <label for="name" class="form-label">Tên danh mục</label>
                      <input type="name" class="form-control" id="name" placeholder="Enter name" name="name">
                    </div>
                
                    <div class="mb-2 mt-2">
                      <label for="image" class="form-label">Ảnh</label>
                      <input type="file" class="form-control" id="image" placeholder="Enter ảnh" name="image">
                    </div>
                   
                    
                    <button type="submit" class="btn btn-primary" name="btn_insert">Submit</button>
                  </form>
            </div>
          </div>
        </div>
      </div>
