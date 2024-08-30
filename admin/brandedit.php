<?php
include("header.php");
include("slider.php");
include("format.php");
include ("./class/brand_class.php");
?>
<?php
$brand = new Brand();
$text_input = new Format();
?>
<?php
if(!isset($_GET["brand_id"]) || $_GET['brand_id'] == NULL){
    echo "<script>window.location = 'brand_list.php'</script>";
}
else{
    $brand_id = $_GET["brand_id"];
}
$get_brand = $brand -> getBrand($brand_id);
if($get_brand){
    $result = $get_brand -> fetch_assoc();
}
?>
<?php
if(isset($_POST["subdm"])){
    $brand_name = $text_input ->validation($_POST["brand_name"]);
    $update_brand = $brand -> updateBrand($brand_name,$brand_id);
}
?>

<div class="admin-content-right">
            <div class="admin-content-right-catagory">
                <h2>Thêm Danh mục</h2>
                <form class="form-add-dm" action="" method="post">
                    <input required name="brand_name" type="text" 
                    placeholder="Thêm Danh mục" value="<?php echo $result['brand_name'] ?>">
                    <button name="subdm" type="submit">Sửa</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>