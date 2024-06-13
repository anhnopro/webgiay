<?php 
echo print_r($product_detail);?>
<div style="width: calc(100% - 220px);">
            <div class="container p-4" >
                <h5 class="p-4">Form thêm sản phẩm</h5>
                <form action="">
                    <div>
                        <p>Danh mục</p>
                        <select name="" id="" class="form-control" disabled>
                            <option value="1">-Danh mục-</option>
                            <option value="2" disabled selected>    Nike      </option>
                            <option value="2">  Adidas   </option>
                        </select>
                    </div>
              
                    <div class="mb-2 mt-2">
                      <label for="name" class="form-label">Tên sản phẩm</label>
                      <input type="name" class="form-control" id="name" placeholder="Enter name" name="name"  value="<?= $product_detail['product_name'] ?>">
                    </div>
                    <div class="mb-2 mt-2">
                      <label for="pwd" class="form-label">Mô tả</label>
                       <textarea class="col-12 rol2 border  rounded-2" disabled>
                                     Sản phẩm bán chạy số 1 thế giới
                       </textarea>
                    </div>
                    <div class="mb-2 mt-2">
                      <label for="price" class="form-label">Giá</label>
                      <input type="price" class="form-control" id="price" placeholder="Enter price" name="price" disabled value="2.000.000 vnđ">
                    </div>
                    <div class="mb-2 mt-2">
                      <label for="image" class="form-label">Ảnh</label>
                      <input type="text" class="form-control" id="image" placeholder="Enter ảnh" name="image" disabled value="ảnh mới">
                    </div>
                    <div class="mb-2 mt-2">
                      <label for="soluong" class="form-label">Số lượng</label>
                      <input type="soluong" class="form-control" id="soluong" placeholder="Enter số lượng" name="soluong" disabled value="10">
                    </div>
                    <div class="mb-2 mt-2">
                        <p>Trang thái</p>
                        <select name="" id="" class="form-control" disabled>
                            <option value="1">-Trạng thái-</option>
                            <option value="2" selected>    Còn hàng      </option>
                            <option value="2">  Hết hàng   </option>
                        </select>
                    </div>
                  
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
          </div>