<?php
include("header.php");
include("slider.php");
include("format.php");
include ("./class/product_class.php");
?>
<?php
$product = new Product();
$text_input = new Format();
?>
<?php
if(!isset($_GET["product_id"]) || $_GET['product_id'] == NULL){
    echo "<script>window.location = 'product_list.php'</script>";
}
else{
    $product_id = $_GET["product_id"];
}
$get_product = $product -> getProduct($product_id);
if($get_product){
    $result = $get_product -> fetch_assoc();
}
?>
<?php
if(isset($_POST["subdm"])){
    $product_name = $text_input ->validation($_POST["product_name"]);
    $product_price = $text_input ->validation($_POST["product_price"]);
    $product_color = $text_input ->validation($_POST["product_color"]);
    $product_detail = $text_input ->validation($_POST["product_detail"]);
    $product_maintain = $text_input ->validation($_POST["product_maintain"]);
    $product_consult = $text_input ->validation($_POST["product_consult"]);
    $update_product = $product -> updateProduct($product_name,$product_price,$product_color,$product_detail,$product_maintain,$product_consult,$product_id);
}
?>

<div class="admin-content-right">
            <div class="admin-content-right-catagory">
                <h2>Thêm Danh mục</h2>
                <form class="form-add-dm" action="" method="post">
                    <input required name="product_name" type="text" 
                    placeholder="Thêm Danh mục" value="<?php echo $result['product_name'] ?>">
                    <input required name="product_price" type="text" 
                    placeholder="Thêm Danh mục" value="<?php echo $result['product_price'] ?>">
                    <input required name="product_color" type="text" 
                    placeholder="Thêm Danh mục" value="<?php echo $result['product_color'] ?>">
                    <input required name="product_detail" type="text" 
                    placeholder="Thêm Danh mục" value="<?php echo $result['product_detail'] ?>">
                    <input required name="product_maintain" type="text" 
                    placeholder="Thêm Danh mục" value="<?php echo $result['product_maintain'] ?>">
                    <input required name="product_consult" type="text" 
                    placeholder="Thêm Danh mục" value="<?php echo $result['product_consult'] ?>">
                    <button name="subdm" type="submit">Sửa</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>