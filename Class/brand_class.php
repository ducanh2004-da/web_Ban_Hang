<?php
require_once 'db.php';

?>
<?php
class Brand{
    private $db;
    public function __construct() {
        $this->db = new Database();
    }
    public function showCatagory(){
        $query= "SELECT * FROM tbl_catagory ORDER BY catagory_id DESC";
        $result = $this->db->select($query);
        return $result;
    }
    public function getBrand($catagory_id){
        $query= "SELECT * FROM tbl_brand Where catagory_id = '$catagory_id'";
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
}
?>