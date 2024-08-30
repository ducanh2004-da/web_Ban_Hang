<?php
include ("./class/catagory_class.php");
?>
<?php
$catagory = new catagory();
?>
<?php
if(!isset($_GET["catagory_id"]) || $_GET['catagory_id'] == NULL){
    echo "<script>window.location = 'catagorylist_add.php'</script>";
}
else{
    $catagory_id = $_GET["catagory_id"];
}
$delete_catagory = $catagory -> deleteCatagory($catagory_id);

?>