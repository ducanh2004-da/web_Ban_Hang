<?php
include('./partial/header.php');
include ("./Class/product_class.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./public/cart.css">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
</head>
<?php
if (!isset($_GET['brand_id']) || $_GET['brand_id'] == null) {
    echo "<script>window.location = 'brand_list.php'</script>";
} else {
    $brand_id = $_GET['brand_id'];
}
$product = new Product();
$select_product = $product->getProduct($brand_id);
?>
        <!--------------- CONTENT ------------->

        <div class="container">
          <section id="cart-top" class="row">
            <div class="giohang row col-lg-4 col-sm-4 col-xs-4 top-item active">
              <i class="fa fa-cart-plus col-lg-2 col-xs-2 col-sm-2 giohang-icon"></i>
              <div class="line GachGioHang col-lg-10 col-sm-10 col-xs-10"></div>
            </div>
            <div class="DiaChi row col-lg-4 col-sm-4 col-xs-4 top-item">
              <i class="fa fa-flag-o col-lg-2 col-xs-2 col-sm-2 deliver-icon"></i>
              <div class="line GachGioHang col-lg-10 col-sm-10 col-xs-10"></div>
            </div>
            <div class="ThanhToan col-lg-4 col-sm-4 col-xs-4">
              <i class="fa fa-id-card thanhtoan-icon"></i>
            </div>
          </section>
          <section id="cart">
              <div id="cart-content" class="row">
                <div class="cart-content-left col-lg-8">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Sản Phẩm</th>
                                <th>Tên Sản Phẩm</th>
                                <th>Màu</th>
                                <th>Size</th>
                                <th>SL</th>
                                <th>Thành Tiền</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                if ($select_product) {
                    while ($row = mysqli_fetch_assoc($select_product)) {
                ?>
                            <tr class="cart-01">
                                <td><img src="img/<?php echo htmlspecialchars($row['product_img']); ?>"></td>
                                <td><?php echo $row['product_name']; ?></td>
                                <td><div class="bg-black"></td>
                                <td>30</td>
                                <td>3</td>
                                <td><?php echo $row['product_price']; ?><sup>đ</sup></td>
                                <td><span><button class="delete_cart">X</button></span></td>
                            </tr>
                          
                            
                        </tbody>
                    </table>
                </div>
                <div class="cart-content-right col-lg-4">
                  <h3 class="text-center">TỔNG TIỀN GIỎ HÀNG</h3>
                  <div class="khung-1 row">
                    <div class="khung-1-left col-lg-8 col-sm-8 col-xs-8">
                      <p>TỔNG SẢN PHẨM</p>
                      <p>TỔNG TIỀN HÀNG</p>
                      <p>VẬN CHUYỂN</p>
                      <p>THÀNH TIỀN</p>
                    </div>
                    
                    <div class="khung-1-right col-lg-4 col-sm-4 col-xs-4">
                      <p>1</p>
                      <br><p><?php echo $row['product_price']; ?><sup>đ</sup></p>
                      <br><p>50.000<sup>đ</sup></p>
                      <br><p><?php echo $row['product_price']+50000; ?><sup>đ</sup></p>
                    </div>
                  </div>
                  <div class="khung-2 row">
                    <div class="khung-2-left col-lg-8 col-sm-8 col-xs-8">
                      <p>TẠM TÍNH</p>
                    </div>
                    <div class="khung-2-right col-lg-4 col-xs-4 col-sm-4">
                      <p><?php echo $row['product_price']+50000; ?><sup>đ</sup></p>
                    </div>
                    
                    <div class="other">
                      <p class="text-center">Bạn sẽ được miễn phí vận chuyển với đơn hàng trên 2.000.000 đ</p>
                      <p class="text-center">Mua thêm 112.000 để được miễn phí</p>
                      <div class="btn-other row">
                        <button class="col-lg-6">Tiếp tục mua sắm</button>
                        <button id="cart-btn" class="col-lg-6">Thanh toán</button>
                      </div>
                      <p>Tài khoản IVY</p>
                      <p>Hãy <span>Đăng nhập</span> tài khoản của bạn</p>
                    </div>
                  </div>
                </div>
                </div>
              </section>

              <!-- DELIVERY -->
               <section id="delivery" class="row">
                <div class="deliver-left col-lg-8">
                  <div class="deliver-top">
                    <h3>Vui lòng chọn địa chỉ giao hàng</h3>
                  </div>
                  <div class="deliver-body">
                    <p><span>Đăng nhập</span> (Nếu bạn có tài khoản)</p>
                    <form class="deliver-form" action="./cart.html">
                      <input type="radio">Khách lẻ(Nếu bạn không muốn lưu thông tin)<br>
                      <input type="radio">Dăng ký(Tạo mới tài khoản với thông tin bên dưới)
                      <div class="row">
                        <div class="col-lg-6"><span>Họ tên:</span><input type="text"></div>
                          <div class="col-lg-6"><span>Điện thoại:</span><input type="text"></div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6"><span>Tỉnh/TP:</span><input type="text"></div>
                          <div class="col-lg-6"><span>Quận/Huyện:</span><input type="text"></div>
                      </div>
                      <span>Phường Xã:</span><input style="width:100%;height:28px;" class="long-inp" type="text">
                      <span>Địa chỉ:</span><input style="width:100%;height:28px;" class="long-inp" type="text">
                    </form>
                  </div>
                  <div class="deliver-bottom">
                      <button class="reverse-btn">Quay lại giỏ hàng</button>
                      <button id="deliver-btn" class="xac-nhan">Thanh Toán và Giao Hàng</button>
                  </div>
                </div>
                <div class="deliver-right col-lg-4">
                  <table class="table">
                    <tr>
                      <th>Tên sản phẩm</th>
                      <th>Giảm giá</th>
                      <th>Số lượng</th>
                      <th>Thành tiền</th>
                    </tr>
                    <tr>
                      <td><?php echo $row['product_name']; ?></td>
                      <td>0%</td>
                      <td>1</td>
                      <td><?php echo $row['product_price']; ?><sup>đ</sup></td>
                    </tr>
                  </table>
                  <div class="deliver-right-bottom">
                    <div class="tongtien row">
                    <p class="col-lg-9 col-sm-9 col-xs-9">Tổng số tiền:</p>
                    <p class="col-lg-3 col-sm-3 col-xs-3"><?php echo $row['product_price']+50000; ?><sup>đ</sup></p>
                    </div>
                    <div class="thanhtien row">
                      <p class="col-lg-9 col-sm-9 col-xs-9">Tạm tính</p>
                      <p class="col-lg-3 col-sm-3 col-xs-3"><?php echo $row['product_price']+50000; ?><sup>đ</sup></p>
                    </div>
                  </div>
                </div>
               </section>

               <!-- PURCHASE -->
                <section id="purchase" class="row">
                  <div class="purchase-left col-lg-7">
                    <div class="pt-giao">
                      <h3><b>Phương thức giao hàng</b></h3>
                      <input required type="radio" value="Giao hàng">Giao Hàng Chuyển phát nhanh<br>
                      <small>Chuyển hàng tới địa chỉ khách hàng</small>
                    </div>
                    <div class="pt-tt">
                      <h3><b>Phương thức thanh toán</b></h3>
                      <p>Mọi giao dịch đều được bảo mật và mã hóa. Thông tin ứng dụng sẽ không bao giờ được lưu</p>
                      <input type="radio" value="Thanh Toan The">Thanh toán bằng thẻ tín dụng(OnePay)<br>
                      <img src="./img/visa.png"><br>
                      <input type="radio" value="Thanh Toan ATM">Thanh toán bằng thẻ ATM(OnePay)<br>
                      <input type="radio" value="Thanh Toan Momo">Thanh toán bằng Momo<br>
                    </div>
                    <button id="purchase-btn" class="end-btn">Tiếp tục thanh toán</button>
                  </div>
                  <div class="purchase-right col-lg-5">
                    <table class="table">
                      <tr>
                        <td><input type="text" placeholder="Mã giảm giá/Quà tặng"></td>
                        <td><button>&#8730;</button></td>
                      </tr>
                      <tr>
                        <td><input type="text" placeholder="Mã cộng tác viên"></td>
                        <td><button>&#8730;</button></td>
                      </tr>
                      <tr>
                        <td><select name="NVid" class="NVid" placeholder="Chọn mã nhân viên thân thiết">
                          <option value="volvo">Chọn Mã Nhân Viên thân thiết</option>
                          <option value="saab">124124</option>
                          <option value="mercedes">5235241</option>
                          <option value="audi">5256243</option>
                        </select></td>
                        <td></td>
                      </tr>
                    </table>
                    <table class="table">
                      <tr>
                        <th>Tên sản phẩm</th>
                        <th>Giảm giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                      </tr>
                      <tr>
                         <td><?php echo $row['product_name']; ?></td>
                         <td>0%</td>
                         <td>1</td>
                         <td><?php echo $row['product_price']; ?><sup>đ</sup></td>
                      </tr>
                      <tr>
                        <td>Tổng tiền hàng( <span><?php echo $row['product_price']; ?><sup>đ</sup></span>)</td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>Tạm tính</td>
                        <td></td>
                        <td></td>
                        <td><?php echo $row['product_price']; ?><sup>đ</sup></td>
                      </tr>
                      <tr>
                        <td>Chuyển phát nhanh</td>
                        <td></td>
                        <td></td>
                        <td>50.000<sup>đ</sup></td>
                      </tr>
                      <tr>
                        <td>Tiền cần thanh toán</td>
                        <td></td>
                        <td></td>
                        <td><?php echo $row['product_price']+50000; ?><sup>đ</sup></td>
                      </tr>
                    </table>
                    <?php
                    }
                  }
                            ?>
                  </div>
                </section>

        <!-- Footer -->
        <?php
      include('./partial/footer.php');
      ?>
      </div>
      <script src="./public/cart.js"></script>
</body>
</html>