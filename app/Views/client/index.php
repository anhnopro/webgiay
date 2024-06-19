<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>

<body>


    <header>
        <div class="container-fluid bgtop1 ">
            <h4 i class='bx bxs-phone small'></i> ĐIỆN THOẠI:</h4>
            <span class="small text-warning">09771*4545</span>
        </div>
        <div class="container">
            <div class="d-flex justify-content-between mt-4">
                <div></div>
                <h1 class="text-center  maulogo ">Mega Shoes</h1>
                <div class="mt-2">
                    <i class='bx bx-search'></i>

                    <a href="dangnhap.html"> <i class='bx bx-user-circle'></i></a>
                    <i class='bx bx-shopping-bag'></i>
                </div>

            </div>

            <div>

                <div class="list-ds  mt-3">
                    <ul class="list-inline  d-flex justify-content-center">
                        <li><a href="index.html" class="m-3">Trang chủ</a></li>
                        <li><a href="" class="m-3">Giới thiệu</a></li>
                        <li><a href="sanpham.html" class="m-3">Danh mục sản phẩm</a></li>
                        <li><a href="tintuc.html" class="m-3">Tin tức </a></li>
                        <li><a href="lienhe.html" class="m-3">Liên hệ</a></li>
                    </ul>
                </div>

            </div>
        </div>
        <section>
            <div class="container-fluid bgtop1 text-right">
                <img src="assets/images/banner3.jpg" style="width: 100%;height: auto;">
                <div class="row">
                    <div class="col-md-3 text-center ">
                        <img src="assets/images/support_1_ic.png" alt="" width="70" height="40">
                        <h3>Giao Hàng Miễn Phí</h3>
                        <span>Cho đơn hàng trên 599k</span>
                    </div>
                    <div class="col-md-3 text-center">
                        <img src="assets/images/support_1_ic.png" alt="" width="70" height="40">
                        <h3>Miễn Phí Đổi Trả</h3>
                        <span>Trong vòng 7 ngày</span>
                    </div>
                    <div class="col-md-3 text-center">
                        <img src="assets/images/support_3_ic.png" alt="" width="70" height="40">
                        <h3>Đặt Hàng Trực Tuyến</h3>
                        <span>Hotline : 1900.XXX.XXX</span>
                    </div>
                    <div class="col-md-3 text-center">
                        <img src="assets/images/support_4_ic.png" alt="" width="70" height="40">
                        <h3>Hỗ Trợ 24/7</h3>
                        <span>Hỗ Trợ online /offline 24/7</span>
                    </div>

                </div>
            </div>

        </section>

    </header>
    <section>
        <div class="container-fluid mt-4">
            <h1 class="text-center">Sản phẩm mới</h1>
            <div class="row mt-4">
                <div class="col-md-6">
                    <img src="assets/images/sp15.jpg" width="650" height="400" class="zoom-img img-fluid">
                </div>
                <?php foreach ($products as $product) : ?>
                    <div class="col-md-2 mb-3">
                        <img src="<?= ROOT_PATH ?>/<?= $product['image'] ?>" width="100%" height="100%" class="zoom-img img-fluid">
                        <h4><?= $product['name'] ?></h4>
                        <span>Giá: <?= $product['price'] ?></span>
                    </div>
                <?php endforeach; ?>

               
            </div>
        
        </div>

    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-6 bg-white">
                    <div class="bg-new">
                        <h1 class="text-center ">NEW</h1>
                        <img class="" src="assets/images/sp9.png" width="450" height="400">
                    </div>
                </div>

                <div class="col-md-6 d-flex align-items-center">
                    <div>
                        <h3 class="text-center">Nike Navy Blue-White New</h3>
                        <p class="text-center">Giày thể thao Nike luôn gắn liền với các dòng giày chạy bộ Nike Free,
                            Nike Zoom. Tiếp đến, dòng giày bóng rổ
                            Nike Air Jordan không những thịnh
                            hành trên các sân bóng rổ mà còn
                            tạo nguồn cảm hứng cho những
                            đôi sneaker Nike đẹp như Nike Air Force 1 chẳng hạn.</p>
                        <a href="">
                            <h5 class="text-center">Xem thêm</h5>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <section style="margin-top: 130px;">
        <div class="container-fluid">
            <div class="row no-gutters">
                <div class="col-md-3">
                    <div class="position-relative">
                        <img src="assets/images/mau1.jpg" class="zoom-img g-0" style="width: 300px; height: 400px;">
                        <div class="position-absolute text-white" style="top: 69%; left: 5%;">
                            <p>Khuyến mại tới 50%</p>
                            <h3>Phụ kiện thời trang</h3>
                            <button class="btn btn-light btn-sm">Mua ngay</button>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="position-relative">
                        <img src="assets/images/mau2.jpg" class="zoom-img g-0" style="width: 300px; height: 400px;">
                        <div class="position-absolute text-white" style="top: 69%; left: 5%;">
                            <p>Khuyến mại tới 50%</p>
                            <h3>Phụ kiện thời trang</h3>
                            <button class="btn btn-light btn-sm">Mua ngay</button>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="position-relative">
                        <img src="assets/images/mau3.jpg" class="zoom-img g-0" style="width: 300px; height: 400px;">
                        <div class="position-absolute text-white" style="top: 69%; left: 5%;">
                            <p>Khuyến mại tới 50%</p>
                            <h3>Phụ kiện thời trang</h3>
                            <button class="btn btn-light btn-sm">Mua ngay</button>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="position-relative">
                        <img src="assets/images/mau4.jpg" class="zoom-img g-0" style="width: 300px; height: 400px;">
                        <div class="position-absolute text-white" style="top: 69%; left: 5%;">
                            <p>Khuyến mại tới 50%</p>
                            <h3>Phụ kiện thời trang</h3>
                            <button class="btn btn-light btn-sm">Mua ngay</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container-fluid">
            <h1 class="text-center mt-4">Sản phẩm mới</h1>
            <div class="row mt-4">
                <div class="col-md-6">
                    <img src="images/sp15.jpg" width="550" height="300" class="zoom-img img-fluid">
                </div>
                <div class="col-md-2 mb-3">
                    <img src="images/sp1.jpg" width="200" height="200" class="zoom-img img-fluid">
                    <h4>Tên sản phẩm</h4>
                    <span>400.000VNĐ</span>
                </div>
                <div class="col-md-2 mb-3">
                    <img src="images/sp2.jpg" width="200" height="200" class="zoom-img img-fluid">
                    <h4>Tên sản phẩm</h4>
                    <span>400.000VNĐ</span>
                </div>
                <div class="col-md-2 mb-3">
                    <img src="images/sp3.jpg" width="200" height="200" class="zoom-img img-fluid">
                    <h4>Tên sản phẩm</h4>
                    <span>400.000VNĐ</span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 mb-3">
                    <img src="images/sp3.jpg" width="200" height="200" class="zoom-img img-fluid">
                    <h4>Tên sản phẩm</h4>
                    <span>400.000VNĐ</span>
                </div>
                <div class="col-md-2 mb-3">
                    <img src="images/sp4.jpg" width="200" height="200" class="zoom-img img-fluid">
                    <h4>Tên sản phẩm</h4>
                    <span>400.000VNĐ</span>
                </div>
                <div class="col-md-2 mb-3">
                    <img src="images/sp5.jpg" width="200" height="200" class="zoom-img img-fluid">
                    <h4>Tên sản phẩm</h4>
                    <span>400.000VNĐ</span>
                </div>
                <div class="col-md-2 mb-3">
                    <img src="images/sp6.jpg" width="200" height="200" class="zoom-img img-fluid">
                    <h4>Tên sản phẩm</h4>
                    <span>400.000VNĐ</span>
                </div>
                <div class="col-md-2 mb-3">
                    <img src="images/sp7.jpg" width="200" height="200" class="zoom-img img-fluid">
                    <h4>Tên sản phẩm</h4>
                    <span>400.000VNĐ</span>
                </div>
                <div class="col-md-2 mb-3">
                    <img src="images/sp8.jpg" width="200" height="200" class="zoom-img img-fluid">
                    <h4>Tên sản phẩm</h4>
                    <span>400.000VNĐ</span>
                </div>

            </div>
        </div>
    </section>
    <section>
        <div class="container-fluid" style="margin-top: 100px;">
            <div class="row m-5">
                <div class="col-md-6 mt-4" style="margin-top: 40px;">
                    <h5 class="text-center ">Mega Shoes - Thương hiệu cùng thời gian</h5>
                    <h1 class="text-center">Giày Thể Thao Chính Hãng</h1>
                    <p class="text-center">Những đôi giày mang kiểu dáng thể thao khỏe khoắn đang ngày càng được giới trẻ ưa chuộng,
                        từ các dòng giày thi đấu chuyên nghiệp đến các sản phẩm thời trang đường phố dành cho giới trẻ. Mega Shoes đã và đang tiếp tục khẳng định vị trí
                        cũng như uy tín của mình trong việc hỗ trợ bạn mua sắm hàng hiệu dễ dàng và tiện lợi hơn bao giờ hết.</p>
                </div>
                <div class="col-md-6">
                    <img src="images/sp16.jpg" width="600" height="400">
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                    <img src="images/1.jpg" width="205px" class="zoom-img img-fluid">
                </div>
                <div class="col-md-2">
                    <img src="images/2.jpg" width="205px" class="zoom-img img-fluid">
                </div>
                <div class="col-md-2">
                    <img src="images/3.jpg" width="205px" class="zoom-img img-fluid">
                </div>
                <div class="col-md-2">
                    <img src="images/4.jpg" width="205px" class="zoom-img img-fluid">
                </div>
                <div class="col-md-2">
                    <img src="images/5.jpg" width="205px" class="zoom-img img-fluid">
                </div>
                <div class="col-md-2">
                    <img src="images/6.jpg" width="205px" class="zoom-img img-fluid">
                </div>
                <div class="col-md-2">
                    <img src="images/6.jpg" width="205px" class="zoom-img img-fluid">
                </div>
                <div class="col-md-2">
                    <img src="images/7.jpg" width="205px" class="zoom-img img-fluid">
                </div>
                <div class="col-md-2">
                    <img src="images/8.jpg" width="205px" class="zoom-img img-fluid">
                </div>
                <div class="col-md-2">
                    <img src="images/9.jpg" width="205px" class="zoom-img img-fluid">
                </div>
                <div class="col-md-2">
                    <img src="images/10.jpg" width="205px" class="zoom-img img-fluid">
                </div>
                <div class="col-md-2">
                    <img src="images/11.jpg" width="205px" class="zoom-img img-fluid">
                </div>

            </div>
        </div>


    </section>
    <footer>
        <div class="container-fluid">
            <hr>
            <div class="d-flex justify-content-between  align-items-center mt form-icon">
                <div>
                    <div>
                        <h5><i class='bx bx-envelope'></i> <span>Đăng kí nhận tin</span> </h5>
                    </div>
                </div>
                <div>
                    <form class="row g-2 align-items-center">
                        <div class="col-auto">
                            <input type="text" name="" placeholder="Nhập email của bạn" style="width: 400px; height: 30px;" class="rounded-0 border">
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-primary btn-sm rounded-0">Đăng kí</button>
                        </div>
                    </form>
                </div>
                <div>
                    <h5><i class='bx bxs-phone'></i><span>Đăng kí/Mua hàng :18000345</span> </h5>
                </div>
            </div>
            <hr>
            <div>
                <div class="row size-footer">
                    <div class="col-md-4">
                        <h4>Giới thiệu</h4>
                        <p>Mega Shoes trang mua sắm trực tuyến của thương hiệu thời trang Lama,
                            thời trang nam, nữ, phụ kiện, giúp bạn tiếp cận xu hướng thời trang mới nhất.</p>
                        <img src="images/logobct.png">
                    </div>
                    <div class="col-md-2">
                        <h4 class="text-left">Liên kết</h4>
                        <div>
                            <ul>
                                <li><a href="">Tìm kiến</a></li>
                                <li><a href="">Giới thiệu</a></li>
                                <li><a href="">Chính sách đổi trả</a></li>
                                <li><a href="">Chính sách bảo mật</a></li>
                                <li><a href="">Điều khoản dịch vụ</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <h4>Thông tin liên hệ</h4>
                        <p>Tầng X, tòa nhà Flemington, số XXX, đường Lê Đại Hành, phường XX, quận XX, Tp. Hồ Chí Minh.</p>
                        <p>Hotline:1900.XXX.XXX</p>
                        <p>Email: hotrotructuyen@gmail.com</p>

                    </div>
                    <div class="col-md-3">
                        <h4>Fanpage</h4>
                        <iframe width="220" height="100" src="https://www.youtube.com/embed/-iqWkbbsvGk?si=aezgIFYTu44XNxnm" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>
                </div>
                <hr>
                <p class="text-center" style="font-size: 10px;">Copyright © 2024 Mega Shoes. Powered by Haravan

                </p>
            </div>

        </div>

    </footer>



    <script src="js/bootstrap.min.js">

    </script>
</body>

</html>