  <?php ?>
          <div style="width: calc(100% - 220px);">
            
            <div class="container p-4" >
                <h5 class="p-4">Form thêm  danh mục</h5>
                <form action="" method="post" enctype="multipart/form-data">
                    
                    <div class="mb-2 mt-2">
                    
                      <input type="hiden" class="form-control" id="id_category" placeholder="Enter name" name="id_category" value="<?= $category['id_category'] ?>">
                    </div>
                    <div class="mb-2 mt-2">
                      <label for="name" class="form-label">Tên danh mục</label>
                      <input type="name" class="form-control" id="name" placeholder="Enter name" name="name" value="<?= $category['name'] ?>">
                    </div>
                
                    <div class="mb-2 mt-2">
                      <label for="image" class="form-label">Ảnh</label>
                      <img src="<?= ROOT_PATH ?>assets/<?= $category['image'] ?>">
                      <input type="file" class="form-control" id="image" placeholder="Enter ảnh" name="image" value="ảnh mới">
                    </div>
                   
                    
                    <button type="submit" class="btn btn-primary" name="btn_update">Submit</button>
                  </form>
            </div>
          </div>
        </div>
      
  
