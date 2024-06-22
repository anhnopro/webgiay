  <div style="width: calc(100% - 220px);">
            <div class="row mt-3 ms-2">
                <div class="col-md-9">
                    <table class=" table border">
                        <thead>
                        <tr>
                            <th>ID</th>
                           
                            <th>Tên</th>
                            <th>Ảnh</th>
                            
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php  foreach($category as $cate): ?>
                        <tr>
                            
                            <td><?= $cate['id_category'] ?></td>
                            <td><?= $cate['name'] ?></td>
                            
                            <td>
                                <div style="height: 60px;">
                                    <img src="<?= ROOT_PATH ?>assets/<?= $cate['image'] ?>" class="w-100 h-100">
                                </div>
                            </td>
                            
                            <td >
                                <div class="dropdown">
                                    <button class="btn btn-light " type="button" id="dropdownMenuButton" >
                                        ...
                                    </button>
                                    <div class="dropdown-menu" >
                                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#myModal">
                                            Xóa
                                        </a>
                                        <a class="dropdown-item" href="#">Thêm</a>
                                        <a class="dropdown-item" href="<?= ROOT_PATH ?>category/update/<?= $cate['id_category'] ?>">Sửa</a>
                            
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#" style="height: 35px;"><i class='bx bx-chevrons-left'></i></a></li>
                            <li class="page-item"><a class="page-link" href="#" style="height: 35px;">1</a></li>
                            <li class="page-item "><a class="page-link" href="#" style="height: 35px;">2</a></li>
                            <li class="page-item"><a class="page-link" href="#" style="height: 35px;">3</a></li>
                            <li class="page-item"><a class="page-link" href="#" style="height: 35px;"><i class='bx bx-chevrons-right'></i></a></li>
                        </ul>
                    </div>
                </div>
          
                <div class="col-md-3">
                  <div class="bg-white d-flex p-4 rounded-3 border">
                      <div>
                          <h5>Tìm kiếm tại đây</h5>
                          <div class="d-flex">
                              <input type="text" class="form-control rounded-0 btn-sm" placeholder="Nike, Adidas">
                              <button class="btn btn-white border rounded-0 btn-sm"><i class='bx bx-search-alt-2'></i></button>
                          </div>
                      </div>
                  </div>
                  <div class="mt-3">
                      <div class="bg-white border  p-4 rounded-3">
                          <h5>Danh mục</h5>
                          <div class="">
                              <p> <input type="checkbox" name="" id=""> Nike </p>
                              <p> <input type="checkbox" name="" id=""> Adidas </p>
                              <p> <input type="checkbox" name="" id=""> Khác </p>
                          </div>
                          <div>
                              <button class="w-100 btn btn-primary">Lọc</button>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>

<!-- Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
      <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Xóa sản phẩm</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
          <!-- Modal body -->
          <div class="modal-body">
            Bạn có muốn xóa không?
          </div>
          <!-- Modal footer -->
          <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">OK</button>
              <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
          </div>
      </div>
  </div>
</div>

</body>
</html>
