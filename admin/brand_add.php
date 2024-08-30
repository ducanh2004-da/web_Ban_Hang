<?php
include("header.php");
include("slider.php");
include ("./class/brand_class.php");
?>
<?php
$brand = new Brand();
$show_catagory = $brand ->showCatagory();
if(isset($_POST["subdm"])){
    $catagory_id = $_POST["catagory_id"];
    $brand_name = $_POST["brand_name"];
    $insert_brand = $brand -> insertBrand($catagory_id, $brand_name);
}
?>

<style>
    select{
        height:30px;
        width:200px;
        display:block;
    }
</style>

<div class="admin-content-right">
            <div class="admin-content-right-catagory">
                <h2>Thêm Danh mục</h2>
                <form class="form-add-dm" action="" method="post">
                    <select name="catagory_id" id="">
                        <option value="#">---Chọn danh mục</option>
                        <?php
                        
                        if($show_catagory){
                            $i=0;
                            while($row = mysqli_fetch_assoc($show_catagory)) {
                                $i++;
                        ?>
                        <option value="<?php echo $row['catagory_id'] ?>"><?php echo $row['catagory_name'] ?></option>
                        <?php
                        }}else{echo "Lỗi hiện thị";}
                        ?>
                        <option value="">-------</option>
                    </select>
                    <input required name="brand_name" type="text" placeholder="Thêm Danh mục">
                    <button name="subdm" type="submit">Thêm</button>
                </form>
            </div>  
        </div>
    </section>
</body>
</html>