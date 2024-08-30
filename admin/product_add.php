<?php
include("header.php");
include("slider.php");
include("format.php");
include ("./class/product_class.php");

$product = new Product();
$text_input = new Format();

if (isset($_POST["subdm"])) {
    // Validate and sanitize input data
    $brand_id = $text_input->validation($_POST["brand_id"]);
    $product_name = $text_input->validation($_POST["product_name"]);
    $product_price = $text_input->validation($_POST["product_price"]);
    $product_color = $text_input->validation($_POST["product_color"]);
    $product_detail = $text_input->validation($_POST["product_detail"]);
    $product_maintain = $text_input->validation($_POST["product_maintain"]);
    $product_consult = $text_input->validation($_POST["product_consult"]);

    // Check if an image file was uploaded
    if ($_FILES["product_img"]["error"] === UPLOAD_ERR_NO_FILE) {
        echo "<script>alert('Image does not exist');</script>";
    } else {
        $fileName = $_FILES["product_img"]["name"];
        $fileSize = $_FILES["product_img"]["size"];
        $tmpName = $_FILES["product_img"]["tmp_name"];
        $validImgExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        if (!in_array($imageExtension, $validImgExtension)) {
            echo "<script>alert('Invalid Image');</script>";
        } elseif ($fileSize > 1000000) {
            echo "<script>alert('Image too large');</script>";
        } else {
            $newImageName = uniqid() . '.' . $imageExtension;
            move_uploaded_file($tmpName, 'img/' . $newImageName);

            // Insert product into the database
            $insert_product = $product->insertProduct(
                $brand_id, $product_name, $product_price, $product_color,
                $product_detail, $product_maintain, $product_consult, $newImageName
            );

            if ($insert_product) {
                echo "<script>alert('Product added successfully');</script>";
            } else {
                echo "<script>alert('Error adding product to the database');</script>";
            }
        }
    }
}

$show_brand = $product->showBrand();
?>

<div class="admin-content-right">
    <div class="admin-content-right-catagory">
        <h2>Thêm Sản Phẩm</h2>
        <form class="form-add-dm" action="product_add.php" method="post" autocomplete="off" enctype="multipart/form-data">
            <select name="brand_id" id="">
                <option value="#">---Chọn danh mục</option>
                <?php
                if($show_brand) {
                    while($row = mysqli_fetch_assoc($show_brand)) {
                ?>
                <option value="<?php echo $row['brand_id'] ?>"><?php echo $row['brand_name'] ?>(Danh mục: <?php echo $row['catagory_name'] ?>)</option>
                <?php
                    }
                } else {
                    echo "<option value=''>Lỗi hiển thị</option>";
                }
                ?>
                <option value="">-------</option>
            </select>
            <br>
            <input required name="product_name" type="text" placeholder="Nhập tên sản phẩm">
            <input required name="product_price" type="text" placeholder="Nhập giá sản phẩm">
            <input required name="product_color" type="text" placeholder="Nhập màu sắc sản phẩm">
            <input required name="product_detail" type="text" placeholder="Nhập chi tiết sản phẩm">
            <input required name="product_maintain" type="text" placeholder="Nhập phần bảo quản">
            <input required name="product_consult" type="text" placeholder="Nhập phần tham khảo">
            <br>
            <label>Chọn file hình ảnh sản phẩm:</label>
            <br><br>
            <input name="product_img" type="file" id="main-upload" accept=".jpg, .jpeg, .png" required />
            <br><br>
            <button style="margin:0 auto;" name="subdm" type="submit">Thêm</button>
        </form>
    </div>
</div>
</section>
</body>
</html>