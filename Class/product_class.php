<?php
require_once 'db.php';

?>
<?php
class Product{
    private $db;
    public function __construct() {
        $this->db = new Database();
    }
    public function insertProduct($brand_id,$product_name,$product_price,$product_color,$product_detail,$product_maintain,$product_consult,$product_img){
        $query="INSERT INTO tbl_product(brand_id,product_name,product_price,product_color,product_detail,product_maintain,product_consult,product_img) 
                VALUES ('$brand_id','$product_name','$product_price','$product_color','$product_detail','$product_maintain','$product_consult','$product_img')";
        $result = $this->db->insert($query);
        header('Location:product_list.php');
        return $result;
    }
    public function showBrand(){
        $query= "SELECT * FROM tbl_brand
                     INNER JOIN tbl_catagory ON tbl_brand.catagory_id= tbl_catagory.catagory_id
                     ORDER BY tbl_brand.brand_id DESC";
            $result = $this->db->select($query);
            return $result;
    }
    public function getProduct($brand_id){
        // $query= "SELECT * FROM tbl_product Where brand_id = '$brand_id'";
        $query= "SELECT * 
                 FROM tbl_product
                 INNER JOIN tbl_brand ON tbl_brand.brand_id = tbl_product.brand_id
                 WHERE tbl_product.brand_id = '$brand_id'
                 ORDER BY tbl_product.product_id DESC";
        $result = $this->db->select($query);
        return $result;
    }
    public function showProduct(){
            $query= "SELECT * FROM tbl_product
                     INNER JOIN tbl_brand ON tbl_brand.brand_id= tbl_product.brand_id
                     ORDER BY tbl_product.product_id DESC";
            $result = $this->db->select($query);
            return $result;
    }
    public function updateProduct($product_name,$product_price,$product_color,$product_detail,$product_maintain,$product_consult,$product_id){
        $query= "UPDATE tbl_product SET product_name = '$product_name', product_price = '$product_price', product_color = '$product_color', product_detail = '$product_detail', product_maintain = '$product_maintain', product_consult = '$product_consult' WHERE product_id = '$product_id'";
        $result = $this->db->update($query);
        header('Location:product_list.php');
        return $result;
    }
    public function deleteProduct($product_id){
        $query= "DELETE FROM tbl_product WHERE product_id = '$product_id'";
        $result = $this->db->delete($query);
        header('Location:product_list.php');
        return $result;
    }
}
?>