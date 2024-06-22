
<section>
    <div class="container">
        <h1 class="text-center">Giỏ hàng của bạn</h1>
        <p class="text-center">Có 2 sản phẩm trong giỏ hàng</p>
       <div class="container mt-4">
        
            <div class="row d-flex justify-content-between">
                <div class="col-md-6">
                    <table>
                        <tr class="mb-3">
                            <td>
                                <div class="border border-danger">
                                    <img src="assets/images/3.jpg" height="130px" class="mh-100">
                                </div>
                            </td>
                            <td class="ml-3 ">
                               <div class="ms-3">
                                <h5>Football Shoes for Men</h5>
                                <p>
                                    32,000,000₫
                                </p>
                                <p>Xanh/39</p>
                                <p>
                                    <div class="group-button">
                                        <button type="button" class="soluong border" onclick="thaydoisoluong('-')" style="width: 30px;">-</button>
                                        <input type="tel" class="soluong1 text-center border" value="1" id="soluong" style="width: 90px; ">
                                        <button type="button" class="soluong border" onclick="thaydoisoluong('+')" style="width: 30px;">+</button>
                                      </div>
                                </p>
                               </div>
                            </td>
                            
                        </tr>
                       
                    </table>
                </div>
                <div class="col-md-1">
                    <div class="d-flex flex-column align-items-start">
                        <div class="mb-3">
                           <a href="#"> <p class="display-6">X</p></a>
                        </div>
                        <div class="mt-5">
                            <p>32,000,000₫</p>
                        </div>
                    </div>
                </div>
                
                <hr>
                
            </div>
        
            
        
       </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row d-flex justify-content-between">
            <div class="col-md-6 mt-3">
              <textarea class="form-control w-100" rows="3" > 
             Ghi chú
              </textarea>
            </div>
            <div class="col-md-3">
                <p>Tổng tiền :<h3>64,000,000₫</h3></p>
                <div class="d-flex">
                    <button class="btn btn-primary rounded-0 btn-sm">Tiếp tục mua hàng</button>
                    <button class="btn btn-primary rounded-0 tn-sm ms-2">Thanh toán</button>
                </div>
            </div>
      </div>
    </div>
</section>

    
 </div>
    

    <script src="js/bootstrap.min.js">

    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            $('p img').mouseenter(function(){
                let imgPath = $(this).attr('src');
                $('#main-img').attr('src', imgPath);
            });
        });
      function thaydoisoluong(toantu) {
                let luong = $('#soluong');
                let soluong = luong.val();
    
                if (toantu === '-') {
                    if (parseInt(soluong) > 1) {
                        luong.val(parseInt(soluong) - 1);
                    }
                } else if (toantu === '+') {
                    luong.val(parseInt(soluong) + 1);
                } else {
                    alert('cảnh báo nguy hiểm');
                }
            }
    
            $(() => {
                $('p img').click(function () {
                    let imgPath = $(this).attr('src');
                    $('#main_img').attr('src', imgPath);
                })
            }) 
    </script>