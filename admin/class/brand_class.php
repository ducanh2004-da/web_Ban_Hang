<?php
include("db.php");

?>
<?php
class Brand{
    private $db;
    public function __construct() {
        $this->db = new Database();
    }
    public function insertBrand($catagory_id,$brand_name){
        $query="INSERT INTO tbl_brand(catagory_id,brand_name) 
                VALUES ('$catagory_id','$brand_name')";
        $result = $this->db->insert($query);
        header('Location:brand_list.php');
        return $result;
    }
    public function showCatagory(){
        $query= "SELECT * FROM tbl_catagory ORDER BY catagory_id DESC";
        $result = $this->db->select($query);
        return $result;
    }
    public function getBrand($brand_id){
        $query= "SELECT * FROM tbl_brand Where brand_id = '$brand_id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function showBrand(){
            $query= "SELECT * FROM tbl_brand
                     INNER JOIN tbl_catagory ON tbl_brand.catagory_id= tbl_catagory.catagory_id
                     ORDER BY tbl_brand.brand_id DESC";
            $result = $this->db->select($query);
            return $result;
    }
    public function updateBrand($brand_name,$brand_id){
        $query= "UPDATE tbl_brand SET brand_name = '$brand_name' WHERE brand_id = '$brand_id'";
        $result = $this->db->update($query);
        header('Location:brand_list.php');
        return $result;
    }
    public function deleteBrand($brand_id){
        $query= "DELETE FROM tbl_brand WHERE brand_id = '$brand_id'";
        $result = $this->db->delete($query);
        header('Location:brand_list.php');
        return $result;
    }
}
?>