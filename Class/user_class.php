<?php
require_once 'db.php';
?>
<?php
Class User{
    private $db;
    public function __construct(){
        $this->db = new Database();
    }
    public function insertUser($name, $email,$account, $password){
        $sql = "INSERT INTO tbl_user(user_name,user_email,user_account,user_password) VALUES ('$name','$email','$account','$password')";
        $result = $this ->db->insert($sql);
        // header("Location:index.php");
        return $result;
    }
    public function selectUser(){
        $sql = "SELECT * FROM tbl_user ORDER BY ID DESC";
        $result = $this ->db->select($sql);
        return $result;
    }
}
?>