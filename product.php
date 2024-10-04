<?php
include('./partial/header.php');
include ("./Class/product_class.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./public/product.css">
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
<!------------- CONTENT -------------->

<div class="container">
        <section id="product">
             <?php
                if ($select_product) {
                    while ($row = mysqli_fetch_assoc($select_product)) {
                ?>
            <div class="product-head">
                <ul class="getbackbtn">
                    <li><a class="backbtn active" href="./index.php">Trang chủ</a><span>-></span></li>
                    <li><a class="backbtn" href="#"><?php echo $row['brand_name'] ?></a></li>
                </ul>
            </div>
            <div class="product-body row">
                
                <div class="product-body-left col-lg-8 col-sm-7 row">
                    <div class="product-body-left-item-1 col-lg-8 col-sm-6 col-xs-6">
                        <img id="big-img" src="img/<?php echo htmlspecialchars($row['product_img']); ?>" width="200" alt="Product Image" class="img-responsive">
                    </div>
                    <div class="product-body-left-item-2 col-lg-4 col-sm-4 col-xs-4">
                        <img id="small-img" src="./img/NewArrive2.jpg" class="img-responsive">
                        <img id="small-img" src="./img/NewArrive3.jpg" class="img-responsive">
                        <img id="small-img" src="./img/NewArrive4.jpg" class="img-responsive">
                        
                    </div>
                </div>
                <div class="product-body-right col-lg-4">
                    <h3><?php echo $row['product_name']; ?>(<?php echo $row['brand_name'] ?>)<br><small>MSP</small></h3>
                    <h3><?php echo $row['product_price']; ?><sup>đ</sup></h3>
                    <p>Màu sắc: <?php echo $row['product_color']; ?></p>
                    <div class="blue"></div>
                    <p>Size</p>
                    <div class="size row">
                        <div class="col-lg-1 col-sm-1 col-xs-1">S</div>
                        <div class="col-lg-1 col-sm-1 col-xs-1">M</div>
                        <div class="col-lg-1 col-sm-1 col-xs-1">L</div>
                        <div class="col-lg-1 col-sm-1 col-xs-1">XL</div>
                        <div class="col-lg-1 col-sm-1 col-xs-1">XXL</div>
                        <div class="col-lg-1 col-sm-1 col-xs-1">XXXL</div>
                    </div><br>
                    <p>Số lượng <input style="width: 40px; height: 30px;" type="number" min="1"></p>
                    <form action="" id="btn-product" class="row">
                    <a href="./cart.php?brand_id=<?php echo htmlspecialchars($row['brand_id']); ?>"><button type="button" class="btn btn-secondary col-xs-6">Mua Hàng</button></a>
                        <a href="./catagory.php"><button type="button" class="btn btn-secondary col-xs-6">Tìm tại cửa hàng</button></a>
                    </form><br>
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#home">Chi tiết</a></li>
                        <li><a data-toggle="tab" href="#menu1">Bảo Quản</a></li>
                        <li><a data-toggle="tab" href="#menu2">Tham khảo</a></li>
                    </ul>

                    <div class="tab-content">
                        <div id="home" class="tab-pane fade in active">
                            <h3>Chi tiết</h3>
                            <p><?php echo $row['product_detail']; ?></p>
                        </div>
                        <div id="menu1" class="tab-pane fade">
                            <h3>Bảo quản</h3>
                            <p><?php echo $row['product_maintain']; ?></p>
                        </div>
                        <div id="menu2" class="tab-pane fade">
                            <h3>Tham Khảo</h3>
                            <p><?php echo $row['product_consult']; ?></p>
                        </div>
                    </div>
                </div>
                <?php
                    }
                }
                ?>
            </div>
        </section>
    <section id="other-product">
      <div class="other-product-title">
        <h3 class="text-center">SẢN PHẨM LIÊN QUAN</h3>
      </div>
        <ul class="list-other row">
            <li class="col-lg-1 col-sm-1 col-xs-1"><-</li>
            <li class="other-item col-lg-2 col-xs-2 col-sm-2">
              <img src="./img/NewArrive1.jpg">
              <p class="text-center">800.000<sup>đ</sup></p>
            </li>
            <li class="other-item col-lg-2 col-xs-2 col-sm-2">
              <img src="./img/NewArrive2.jpg">
              <p class="text-center">800.000<sup>đ</sup></p>
            </li>
            <li class="other-item col-lg-2 col-xs-2 col-sm-2">
              <img src="./img/NewArrive3.jpg">
              <p class="text-center">800.000<sup>đ</sup></p>
            </li>
            <li class="other-item col-lg-2 col-xs-2 col-sm-2">
              <img src="./img/NewArrive4.jpg">
              <p class="text-center">800.000<sup>đ</sup></p>
            </li>
            <li class="other-item col-lg-2 col-xs-2 col-sm-2">
              <img src="./img/NewArrive5.jpg">
              <p class="text-center">800.000<sup>đ</sup></p>
            </li>
            <li class="col-lg-1 col-xs-1 col-sm-1">-></li>
        </ul>
    </section>

    <!-- Footer -->
    <?php
      include('./partial/footer.php');
      ?>
      </div>
      <script src="./public/product.js"></script>
</body>
</html>