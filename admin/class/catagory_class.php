<?php
include("db.php");

?>
<?php
class catagory{
    private $db;
    public function __construct() {
        $this->db = new Database();
    }
    public function insertCatagory($catagory_name){
        $query="INSERT INTO tbl_catagory(catagory_name) 
                VALUES ('$catagory_name')";
        $result = $this->db->insert($query);
        header("Location:catagorylist_add.php");
        return $result;
    }
    public function showCatagory(){
        $query= "SELECT * FROM tbl_catagory ORDER BY catagory_id DESC";
        $result = $this->db->select($query);
        return $result;
    }
    public function getCatagory($catagory_id){
        $query= "SELECT * FROM tbl_catagory Where catagory_id = '$catagory_id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function updateCatagory($catagory_name,$catagory_id){
        $query= "UPDATE tbl_catagory SET catagory_name = '$catagory_name' WHERE catagory_id = '$catagory_id'";
        $result = $this->db->update($query);
        header("Location:catagorylist_add.php");
        return $result;
    }
    public function deleteCatagory($catagory_id){
        $query= "DELETE FROM tbl_catagory WHERE catagory_id = '$catagory_id'";
        $result = $this->db->delete($query);
        header("Location:catagorylist_add.php");
        return $result;
    }
}
?>