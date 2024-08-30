<?php
include ("./class/product_class.php");
?>
<?php
$product = new Product();
?>
<?php
if(!isset($_GET["product_id"]) || $_GET['product_id'] == NULL){
    echo "<script>window.location = 'product_list.php'</script>";
}
else{
    $product_id = $_GET["product_id"];
}
$delete_product = $product -> deleteProduct($product_id);

?>