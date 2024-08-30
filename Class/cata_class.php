<?php
require_once 'db.php';
?>
<?php
class Catagory{
    private $db;
    public function __construct() {
        $this->db = new Database();
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
}
?>