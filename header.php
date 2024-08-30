<!DOCTYPE html>
<html lang="en">
<?php
include("format.php");
// include("db.php");
include ("./Class/user_class.php");
include ("./Class/cata_class.php");
include ("./Class/brand_class.php");
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Web bán hàng</title>
</head>

<?php

$user = new User();
$text_input = new Format();

if (isset($_POST["btnReg"])) {
    $name = $text_input->validation($_POST["nameReg"]); 
    $email = $text_input->validation($_POST["emailReg"]);  
    $password = $text_input->validation($_POST["passReg"]);
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $account = $text_input->validation($_POST["userReg"]);
    $result = $user->insertUser($name, $email, $account, $hash);

    if ($result) {
        echo "Registration successful!";
    } else {
        echo "Registration failed!";
    }
}

if (isset($_POST["btnLog"])) {
    $accountLog = $text_input->validation($_POST["userLog"]);
    $passLog = $text_input->validation($_POST["passLog"]);
    $get_account = $user->selectUser(); // Assuming you have this method

    if ($get_account && mysqli_num_rows($get_account) > 0) {
        while ($row = $get_account->fetch_assoc()) {
            if ($row["user_account"] == $accountLog && password_verify($passLog, $row["user_password"])) {
                header("Location:catagory.php");
                exit();
            } else {
                echo "Invalid username or password.";
            }
        }
    } else {
        echo "User not found.";
    }
}
?>
<?php
$catagory = new Catagory();
$brand = new Brand();
$show_catagory = $catagory->showCatagory();
?>

<body>
  <!-- header -->
    <header>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
              <div class="navbar-header">
                <a href="./index.php"><img src="./img/logo.png" class="navbar-brand"></a>
              </div>
              <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php">Home</a></li>
                    <?php
                    if ($show_catagory) {
                        while ($row = mysqli_fetch_assoc($show_catagory)) {
                            ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $row['catagory_name']; ?>
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-header"><b>New Arrival</b></li>
                                    <li class="dropdown-header"><b>Áo</b></li>
                                    <?php
                                    $get_brand = $brand->getBrand($row['catagory_id']);
                                    if ($get_brand) {
                                        while ($rows = mysqli_fetch_assoc($get_brand)) {
                                            ?>
                                            <li><a href="product.php?brand_id=<?php echo $rows['brand_id'] ?>"><?php echo $rows['brand_name']; ?></a></li>
                                            <?php
                                        }
                                    }
                                    ?>
                        
                        </ul>
                </li>
               
                <?php
                         
                    }
                  }
                ?>
              </ul>
              <form class="navbar-form navbar-left" action="/action_page.php">
                <div class="input-group">
                    <div class="row">
                     <input type="text"class="col-lg-10 form-controls" placeholder="Tìm kiếm sản phẩm" name="search">     
                      <i class="col-lg-2 fa fa-search"></i>
                    </div>
                </div>
              </form>
              <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><i class="fa fa-paw"></i></a></li>
                <li><a href="#"><i class="fa fa-user text-center"> <br>Đăng nhập</i></a></li>
                <li><a href="./catagory.php"><i class="fa fa-shopping-bag"></i></a></li>
              </ul>
            </div>
          </nav>

          <!-------------- RESPONSIVE ---------->
          <?php
$catagory = new Catagory();
$brand = new Brand();
$show_catagory = $catagory->showCatagory();
?>

          <input type="checkbox" id="check">
    <label for="check" class="nav-bar-btn">
        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50">
            <path d="M 0 9 L 0 11 L 50 11 L 50 9 Z M 0 24 L 0 26 L 50 26 L 50 24 Z M 0 39 L 0 41 L 50 41 L 50 39 Z"></path>
        </svg>
    </label>
    <label for="check" class="close-bar-btn">
        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50">
            <path d="M 7.71875 6.28125 L 6.28125 7.71875 L 23.5625 25 L 6.28125 42.28125 L 7.71875 43.71875 L 25 26.4375 L 42.28125 43.71875 L 43.71875 42.28125 L 26.4375 25 L 43.71875 7.71875 L 42.28125 6.28125 L 25 23.5625 Z"></path>
        </svg>
    </label>
    <label class="overlay" for="check"></label>
    <nav class="nav-mobile">
        <ul class="nav-list">
            <?php
            if ($show_catagory) {
                while ($row = mysqli_fetch_assoc($show_catagory)) {
                    ?>
                    <li class="list-item-mobile">
                        <div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" data-toggle="dropdown"><?php echo $row['catagory_name']; ?></button>
                            <ul class="dropdown-menu">
                                <!-- <li><a href="#">Hàng mới về</a></li>
                                <li><a href="#">Tom & Jerry Collection</a></li> -->
                                <li class="dropdown-header"><b>Áo</b></li>
                                <?php
                                $get_brand = $brand->getBrand($row['catagory_id']);
                                if ($get_brand) {
                                    while ($rows = mysqli_fetch_assoc($get_brand)) {
                                        ?>
                                        <li><a href="product.php?brand_id=<?php echo $rows['brand_id']; ?>"><?php echo $rows['brand_name']; ?></a></li>
                                        <?php
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                    </li>
              
              <?php
                        }
                    }
              ?>
              <li class="list-item-mobile text-danger fa-user">Đăng nhập</li>
            </ul>
          </nav>
    </header>