<?php
include("header.php");
include("slider.php");
include("format.php");
include ("./class/catagory_class.php");
?>
<?php
$catagory = new catagory();
$text_input = new Format();
?>
<?php
if(!isset($_GET["catagory_id"]) || $_GET['catagory_id'] == NULL){
    echo "<script>window.location = 'catagorylist_add.php'</script>";
}
else{
    $catagory_id = $_GET["catagory_id"];
}
$get_catagory = $catagory -> getCatagory($catagory_id);
if($get_catagory){
    $result = $get_catagory -> fetch_assoc();
}
?>
<?php
if(isset($_POST["subdm"])){
    $catagory_name = $text_input ->validation($_POST["catagory_name"]);
    $update_catagory = $catagory -> updateCatagory($catagory_name,$catagory_id);
}
?>

<div class="admin-content-right">
            <div class="admin-content-right-catagory">
                <h2>Thêm Danh mục</h2>
                <form class="form-add-dm" action="" method="post">
                    <input required name="catagory_name" type="text" 
                    placeholder="Thêm Danh mục" value="<?php echo $result['catagory_name'] ?>">
                    <button name="subdm" type="submit">Sửa</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>