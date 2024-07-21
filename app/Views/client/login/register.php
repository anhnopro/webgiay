
    <div class="container">
        <div class="d-flex justify-content-center mt-5">
          
        <form action="<?= ROOT_PATH ?>user/register" method="post">
            <h3 class="text-center">Đăng Ký</h3>
            <div class="mb-3 mt-5">
              <label for="name" class="form-label">Tên tài khoản</label>
              <input type="name" class="form-control" id="name"  name="nick_name" style="width: 600px;">
            </div>
            <div class="mb-3 d-flex">
                <div>
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email"  name="email"  style="width: 380px;">
                </div>
               <div class="ms-2">
                <label for="phone" class="form-label">Số điện thoại</label>
                <input type="phone" class="form-control" id="phone"  name="phone_number"  >
               </div>
              </div>
            <div class="mb-3">
              <label for="pwd" class="form-label">Password:</label>
              <input type="password" class="form-control" id="pwd"  name="password" style="width: 600px;">
            </div>
           
            
           <div class="text-center">
            <button type="submit" class="btn btn-primary rounded-5" style="width: 200px;" name="btn_register">Đăng ký</button>
           </div>
           <div class="mt-5">
            <p class="text-center">Bạn có thể đăng nhập theo hình  thức</p>
            <div class="text-center">
                <button class="btn btn-primary mb-2 btn-sm" style="width: 200px;"><i class='bx bxl-facebook-square'></i> Login width Facebook</button><br>
            <button class="btn btn-primary  btn-sm " style="width: 200px;"><i class='bx bxl-google' ></i> Login width Google</button>
            </div>
          </div>
          </form>
         
        </div>
    </div>
