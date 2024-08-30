<?php
include("header.php");
include("slider.php");
// include ("config.php");
include ("./class/catagory_class.php");
// include ("db.php");
?>
<?php
$catagory = new Catagory();
$select_catagory = $catagory->showCatagory();
// function selectTT(){
//     $db = new Database();
//     $sql="SELECT * FROM tbl_catagory";
//     $query=mysqli_query($db->link,$sql);
//     $num=mysqli_num_rows($query);

// $catagory = new catagory();
// $show_catagory = $catagory->showCatagory();
// $result=$catagory->showCatagory();
?>

<div class="admin-content-right">
            <div class="admin-content-right-catagory">
                <h2>Danh sách danh mục</h2>
                <table>
                    <tr>
                        <th>STT</th>
                        <th>ID</th>
                        <th>Danh mục</th>
                        <th>Tùy biến</th>
                    </tr><br>
                 <?php
                //  if ($show_catagory) {
                //     $i=0;
                //      while($result = $show_catagory->fetch_assoc()) {
                //         $i++;
                if($select_catagory){
                    $i=0;
                    while($row = mysqli_fetch_assoc($select_catagory)) {
                        $i++;
                // if($show_catagory){
                //     $i=0;
                //     while($row=$show_catagory->fetch_assoc()){
                ?>
                    
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $row['catagory_id'] ?></td>
                        <td><?php echo $row['catagory_name'] ?></td>
                        <td><a href="catagoryedit.php?catagory_id=<?php echo $row['catagory_id'] ?>">Sửa</a>|<a href="catagorydelete.php?catagory_id=<?php echo $row['catagory_id'] ?>">Xóa</a></td>
                    </tr><br>
                    <?php
                     }
                } else { echo"không hợp lệ";}
            // }
            // selectTT();
                    ?>
                </table>
            </div>
        </div>
    </section>
</body>
</html>