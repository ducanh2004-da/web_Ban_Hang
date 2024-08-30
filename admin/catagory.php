<?php
include("header.php");
include("slider.php");
include("format.php");
include ("./class/catagory_class.php");
?>
<?php
$catagory = new catagory();
$text_input = new Format();
if(isset($_POST["subdm"])){
    $catagory_name = $text_input ->validation($_POST["catagory_name"]);
    $insert_catagory = $catagory -> insertCatagory($catagory_name);
}
?>

<div class="admin-content-right">
            <div class="admin-content-right-catagory">
                <h2>Thêm Danh mục</h2>
                <form class="form-add-dm" action="" method="post">
                    <input required name="catagory_name" type="text" placeholder="Thêm Danh mục">
                    <button name="subdm" type="submit">Thêm</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>