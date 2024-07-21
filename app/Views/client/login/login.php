<div class="container">
    <div class="d-flex justify-content-center mt-5">
        <form action="<?= ROOT_PATH ?>user/login" method="post">
            <div>
                <?php
                if (isset($error) && !empty($error)) {
                    foreach ($error as $err) {
                        echo "<p style='color:red'>" . htmlspecialchars($err) . "</p>";
                    }
                }
                ?>
            </div>
            <h3 class="text-center">Đăng Nhập</h3>
            <div class="mb-3 mt-5">
                <label for="email" class="form-label">Tên tài khoản hoặc địa chỉ email *</label>
                <input type="email" class="form-control" id="email" name="email" style="width: 600px;">
            </div>
            <div class="mb-3">
                <label for="pwd" class="form-label">Password:</label>
                <input type="password" class="form-control" id="pwd" name="password" style="width: 600px;">
            </div>
            <div class="mb-3">
                <a href=""><i class='bx bxs-lock-alt'></i> Quên mật khẩu ?</a>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary rounded-5" style="width: 200px;" name="btn_login">Đăng nhập</button>
            </div>
            <div class="mt-5">
                <p class="text-center">Bạn chưa có tài khoản ?<a href="<?= ROOT_PATH ?>user/register" class="ms-2">Đăng kí ngay</a></p>
                <div class="text-center">
                    <button class="btn btn-primary mb-2 btn-sm" style="width: 200px;"><i class='bx bxl-facebook-square'></i> Login with Facebook</button><br>
                    <button class="btn btn-primary btn-sm" style="width: 200px;"><i class='bx bxl-google'></i> Login with Google</button>
                </div>
            </div>
        </form>
    </div>
</div>
