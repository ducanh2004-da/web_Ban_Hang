<?php
include ("config.php");
?>


<?php
class Database{
    public $host=DB_HOST;
    public $user=DB_USER;
    public $pass=DB_PASS;
    public $dbname=DB_NAME;

    public $link;
    public $error;
    public function __construct(){
        $this->connectDB();
    }
    private function connectDB(){
        $this->link = new mysqli($this->host,$this->user,$this->pass,$this->dbname);
        if(!$this->link){
            $this->error = "Connection fail".$this->link->connect_error;
            return false;
        }
    }
    //Select or read data
    public function select($query){
        $result = mysqli_query($this->link,$query) or die(mysqli_error($this->link));
        //  $num=mysqli_num_rows($query);
        if($result->num_rows > 0){
            return $result;
        }else{
            return false;
        }
    }
    //Insert data
    public function insert($query){
        $insert_row = mysqli_query($this->link,$query) or die(mysqli_error($this->link));
        if($insert_row){
            return $insert_row;
        }else{
            return false;
        }
    }

    //Update data

    public function update($query){
        $update_row = mysqli_query($this->link,$query) or die(mysqli_error($this->link));
        if($update_row){
            return $update_row;
        }else{
            return false;
        }
    }

    //Delete Data
    public function delete($query){
        $delete_row = mysqli_query($this->link,$query) or die(mysqli_error($this->link));
        if($delete_row){
            return $delete_row;
        }else{
            return false;
        }
    }
}
?>