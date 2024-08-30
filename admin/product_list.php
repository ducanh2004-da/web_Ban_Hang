<?php
include("header.php");
include("slider.php");
include ("./class/product_class.php");

$product = new Product();
$select_product = $product->showProduct();
$show_brand = $product->showBrand();
?>

<div class="admin-content-right">
    <div class="admin-content-right-catagory">
        <h2>Danh sách sản phẩm</h2>
        <table>
            <tr>
                <th>STT</th>
                <th>ID</th>
                <th>Brand_ID</th>
                <th>Loại sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Giá cả</th>
                <th>Màu sắc</th>
                <th>Chi tiết</th>
                <th>Bảo quản</th>
                <th>Tham khảo</th>
                <th>Hình Ảnh</th>
                <th>Tùy biến</th>
            </tr>
            <br>
            <?php
            if ($select_product) {
                $i = 0;
                while ($row = mysqli_fetch_assoc($select_product)) {
                    $i++;
                    $brand_name = '';
                    if ($show_brand) {
                        foreach ($show_brand as $brand) {
                            if ($brand['brand_id'] == $row['brand_id']) {
                                $brand_name = $brand['brand_name'];
                                break;
                            }
                        }
                    }
            ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo htmlspecialchars($row['product_id']); ?></td>
                    <td><?php echo htmlspecialchars($row['brand_id']); ?></td>
                    <td><?php echo htmlspecialchars($brand_name); ?></td>
                    <td><?php echo htmlspecialchars($row['product_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['product_price']); ?><sup>đ</sup></td>
                    <td><?php echo htmlspecialchars($row['product_color']); ?></td>
                    <td><?php echo htmlspecialchars($row['product_detail']); ?></td>
                    <td><?php echo htmlspecialchars($row['product_maintain']); ?></td>
                    <td><?php echo htmlspecialchars($row['product_consult']); ?></td>
                    <td><img src="img/<?php echo htmlspecialchars($row['product_img']); ?>" width="200" alt="Product Image"></td>
                    <td>
                        <a href="productedit.php?product_id=<?php echo htmlspecialchars($row['product_id']); ?>">Sửa</a> |
                        <a href="productdelete.php?product_id=<?php echo htmlspecialchars($row['product_id']); ?>">Xóa</a>
                    </td>
                </tr>
                <br>
            <?php
                }
            } else {
                echo "Không có sản phẩm nào.";
            }
            ?>
            
        </table>
    </div>
</div>
</section>
</body>
</html>