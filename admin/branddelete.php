<?php
include ("./class/brand_class.php");
?>
<?php
$brand = new Brand();
?>
<?php
if(!isset($_GET["brand_id"]) || $_GET['brand_id'] == NULL){
    echo "<script>window.location = 'brand_list.php'</script>";
}
else{
    $brand_id = $_GET["brand_id"];
}
$delete_brand = $brand -> deleteBrand($brand_id);

?>