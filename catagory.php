<?php
include('header.php');
include ("./Class/product_class.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./catagory.css">
  <title>Document</title>
</head>
<?php
$product = new Product();
$show_product = $product->showProduct();
?>

    <!--------------------- Content ----------------->
    <div class="container">
    <section id="top-cartegory">
        <ul class="getbackbtn">
          <li><a class="backbtn active" href="#">Trang chủ</a><span>-></span></li>
          <li><a class="backbtn" href="#">danh sách mặt hàng</a></li>
        </ul>
    </section>
    <section id="content-cartegory">
        <ul class="list-type">
          <li>
            <div class="dropdown">
              <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">Nữ</button>
              <ul class="dropdown-menu">
                <li><a href="#">Jean</a></li>
                <li><a href="#">Vest</a></li>
                <li><a href="#">Giày</a></li>
                <li><a href="#">sandal</a></li>
                <li><a href="#">Váy</a></li>
              </ul>
            </div>
          </li>
          <li>
            <div class="dropdown">
              <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">Nam</button>
              <ul class="dropdown-menu">
                <li><a href="#">Quần tây</a></li>
                <li><a href="#">Giầy tây</a></li>
                <li><a href="#">Áo sơ mi</a></li>
                <li><a href="#">sandal</a></li>
                <li><a href="#">Túi</a></li>
              </ul>
            </div>
          </li>
          <li>
            <div class="dropdown">
              <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">Trẻ em</button>
              <ul class="dropdown-menu">
                <li><a href="#">Áo</a></li>
                <li><a href="#">Quần</a></li>
                <li><a href="#">Áo khoác</a></li>
              </ul>
            </div>
          </li>
          <li>
            <div class="dropdown">
              <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">FLASH SALE TỪ 20 -23H</button>
              <ul class="dropdown-menu">
                <li><a href="#">Áo</a></li>
                <li><a href="#">Quần</a></li>
                <li><a href="#">Áo khoác</a></li>
              </ul>
            </div>
          </li>
        </ul>
        <div class="list-sp">
          <div class="list-head">
            <h3>Danh sách mặt hàng</h3>
            <div class="dropdown-item">
            <div class="dropdown">
              <button id="btn-boloc" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Bộ lọc
                <span class="caret"></span>
              </button>
              <div class="dropdown-menu row menu-boloc">
                <div class="col-lg-5 size">
                  <h3>Size</h3>
                  <div class="list-size">
                    <button>S</button>
                    <button>M</button>
                    <button>L</button>
                    <button>XL</button>
                    <button>XXL</button>
                  </div>
                  <div class="btnloc">
                  <button class="xoaloc">Xóa</button>
                  <button class="locloc">Lọc</button>
                </div>
                </div>
                <div class="col-lg-4 color">
                  <h3>Màu</h3>
                <div class="bang-mau">
                  <div class="mau bg-danger"></div>
                  <div class="mau bg-primary"></div>
                  <div class="mau bg-success"></div>
                  <div class="mau bg-warining"></div>
                </div>
                </div>
                <div class="col-lg-3 available">
                  <h3>Còn hàng</h3>
                  <input type="checkbox">
                </div>
              </div>
            </div>
            <div class="dropdown">
              <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">Sắp xếp
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu">
                <li><a href="#">Sắp xếp</a></li>
                <li><a href="#">Giá cao đến thấp</a></li>
                <li><a href="#">Giá thấp đến cao</a></li>
              </ul>
            </div>
          </div>
          </div>
          <div class="list-body">
            <?php
            
            ?>
            <div class="rowss tab-content">
              <?php
              $ids=0;
              if($show_product){
                while($row=mysqli_fetch_assoc($show_product)){
                  $ids++;
                  if($ids <= 6){
                    
              ?>
              <br><br><br>
              <div id="page1" style="display:flex;" class="tab-pane fade in active rowss">
              <?php
                  
              ?>
            <div class="sp SP<?php echo $id; ?>">
              <a href="product.php?brand_id=<?php echo $row['brand_id'] ?>">
            <img src="img/<?php echo htmlspecialchars($row['product_img']); ?>" width="200" alt="Product Image" class="img-responsive">
            </a>
              <div class="tt-anh">
              <?php echo $row['product_name']; ?>
              </div>
              <div class="price">
              <?php echo $row['product_price']; ?>đ <small style="text-decoration-line: line-through;">500.000đ</small>
              </div>
            </div>
            </div>
            <?php
                  }
                else{
              ?>
              <div id="page2" style="display:block;" class="tab-pane fade rowss">
              <div class="sp SP<?php echo $id; ?>">
            <img src="img/<?php echo htmlspecialchars($row['product_img']); ?>" width="200" alt="Product Image" class="img-responsive">
              <div class="tt-anh">
              <?php echo $row['product_name']; ?>
              </div>
              <div class="price">
              <?php echo $row['product_price']; ?>đ <small style="text-decoration-line: line-through;">500.000đ</small>
              </div>
              
            </div>
            </div>
              <?php
                }
              }
              }
            ?>
          </div>
          
          </div>
          <div class="list-bottom">
            <p>Hiện thị <span>2|4</span> sản phẩm</p>
            <ul class="page">
              <li class="previous page-item"><a href="#">Prev</a></li>
              <li class="page-item active"><a data-toggle="tab" href="#page1">1</a></li>
              <li class="page-item"><a data-toggle="tab" href="#page2">2</a></li>
              <li class="page-item"><a data-toggle="tab" href="#page3">3</a></li>
              <li class="page-item"><a data-toggle="tab" href="#">4</a></li>
              <li class="next page-item"><a href="#">Next</a></li>
            </ul>
          </div>
        </div>
    </section>

    <!----------------------- Footer ------------------->
    <?php
      include('footer.php');
      ?>
      </div>
      <script>
        $('.menu-boloc').hide();
        $('#btn-boloc').click(()=>{
          $('.menu-boloc').toggle();
        })
      </script>
</body>
</html>