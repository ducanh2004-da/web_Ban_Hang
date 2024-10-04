<?php
include('./partial/header.php');
?>
    <!-- Slider -->
    <section id="slider">
        <div class="silder-container">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">

      <div class="item active">
        <img src="./img/background_image04.jpg" alt="Los Angeles" style="width:100%; height:80vh;">
        <div class="carousel-caption">
            <h1>New Arrivals</h1>
            <p>Vest nữ</p>
            <a style="z-index: 5;" href="./catagory.php"><button style="color:black;" class="btn">View On Web</button></a>
          </div>
      </div>

      <div class="item">
        <img src="./img/background_image02.png" alt="Chicago" style="width:100%; height:80vh;">
        <div class="carousel-caption">
          <h1>New Arrivals</h1>
          <p>Fall Winter 2020</p>
          <a style="z-index: 5;" href="./catagory.php"><button style="color:black;" class="btn">New On Web</button></a>
        </div>
      </div>
    
      <div class="item">
        <img src="./img/background_image03.png" alt="New York" style="width:100%; height:80vh;">
        <div class="carousel-caption">
            <h1>New Arrivals</h1>
            <p>Phong cách nhật bản</p>
            <a style="z-index: 5;" href="./catagory.php"><button style="color:black;" class="btn">View On Web</button></a>
        </div>
      </div>
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
        </div>
    </section>
    <section id="LogRegis">
        <div class="btn-group">
            <button type="button" id="btn-dn" class="btn btn-success">Đăng nhập</button>
            <button type="button" id="btn-dk" class="btn btn-primary">Đăng ký</button>
        </div>
        <div class="regis">
            <h3 class="text-center"><b>ĐĂNG KÝ</b></h3>            
            <form action="./index.php" method="post">
        <div class="set setname">
            <i class="fa fa-user"></i>
            <input type="text" name="nameReg" class="nameReg" placeholder="Input Name">
        </div>
        <div class="set setemail">
            <i class="fa fa-envelope"></i>
            <input type="email" name="emailReg" class="emailReg" placeholder="Input Email">
        </div>
        <div class="set setaccount">
            <i class="fa fa-key"></i>
            <input type="text" name="userReg" class="userReg" placeholder="Input new account">
        </div>
        <div class="set setpass">
            <i class="fa fa-expeditedssl"></i>
            <input type="password" name="passReg" class="passReg" placeholder="Input new password">
        </div>
        <button name="btnReg" type="submit" class="btn btn-info">Đăng Ký</button>
    </form>
        </div>
        <div class="login">
            <h3 class="text-center"><b>ĐĂNG NHẬP</b></h3>            
            <form action="./index.php" method="post">
        <div class="set setaccount">
            <i class="fa fa-key"></i>
            <input type="text" name="userLog" class="userLog" placeholder="Input account">
        </div>
        <div class="set setpass">
            <i class="fa fa-expeditedssl"></i>
            <input type="password" name="passLog" class="passLog" placeholder="Input password">
        </div>
        <div style="display:flex; justify-content:center;" class="set_user_type">
        <div style="margin-right:20px;" class="radio-item">
          <input type="radio" id="admin" name="role" value="Normal User">User
        </div>
        <div style="margin-left:20px;" class="radio-item">
           <input style="margin-left:20px;" type="radio" id="admin" name="role" value="Admin">Admin
        </div>
        </div>
        <div class="forget-pass">
            <input type="checkbox" name="rememberMe">Remember me
        </div>
        <button name="btnLog" type="submit" class="btn btn-info">Đăng Nhập</button>
    </form>
        </div>
    </section>

    <div class="container">
      <section id="newarrival">
        <h2 style="padding-bottom: 10px;" class="text-center">NEW ARRIVAL</h2>
        <div class="style">
          <ul class="styleul">
            <li class="liststyle active">IVY moda</li>
            <li class="liststyle">IVY men</li>
            <li class="liststyle">IVY kids</li>
          </ul>
        </div>
        <div class="arriSP">
          <div class="sp SP1">
            <img src="./img/NewArrive1.jpg">
            <div class="tt-anh">
              Bliss Dress - Đầm Xòe
            </div>
            <div class="price">
              1.423.500đ <small style="text-decoration-line: line-through;">2.190.000</small>
            </div>
          </div>
          <div class="sp SP2">
            <img src="./img/NewArrive2.jpg">
            <div class="tt-anh">
              Bliss Dress - Đầm Xòe
            </div>
            <div class="price">
              1.423.500đ <small style="text-decoration-line: line-through;">2.190.000</small>
            </div>
          </div>
          <div class="sp SP3">
            <img src="./img/NewArrive3.jpg">
            <div class="tt-anh">
              Bliss Dress - Đầm Xòe
            </div>
            <div class="price">
              1.423.500đ <small style="text-decoration-line: line-through;">2.190.000</small>
            </div>
          </div>
          <div class="sp SP4">
            <img src="./img/NewArrive4.jpg">
            <div class="tt-anh">
              Bliss Dress - Đầm Xòe
            </div>
            <div class="price">
              1.423.500đ <small style="text-decoration-line: line-through;">2.190.000</small>
            </div>
          </div>
        </div>
        <a href="./catagory.php"><button id="xemarrival" class="btn">Xem tất cả</button></a>
        <br> <br> <br> <br>
        <hr color="black"/>
      </section>

      <?php
      include('./partial/footer.php');
      ?>
  </div>
    <script src="./public/main.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
      var listyle = document.querySelectorAll('.liststyle');
listyle.forEach((val,key)=>{
    val.addEventListener('click',()=>{
        val.classList.add('active');
            listyle[key-1].classList.remove('active');
            listyle[key+1].classList.remove('active');
            listyle[key+2].classList.remove('active');
            listyle[key-2].classList.remove('active');

    })
})

    </script>
</body>
</html>