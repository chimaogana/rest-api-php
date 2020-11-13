<?php
include_once("../config/database.php");

class Student{
   public $name;
   public $email;
   public $mobile;
   public $id;
   private $conn;
  //  private $table_name;

   public function __construct($db){

    $this->conn=$db;
    // $this->table_name="tbl_students";


   }

  public function create_data(){
    $this->name = htmlspecialchars(strip_tags($this->name));
    $this->email = htmlspecialchars(strip_tags($this->email));
    $this->mobile = htmlspecialchars(strip_tags($this->mobile));
    $query = "INSERT INTO tbl_students(name,email,mobile) VALUES ('$this->name','$this->email','$this->mobile')";
    //prepare the sql

    $obj = mysqli_query($this->conn,$query);
   
    // if($obj->execute()){
    //   return true;
    // }else{
    //   return false;
   return $obj;  
  }
  public function list_all(){
    $query = "SELECT * FROM tbl_students";
    $sql = mysqli_query($this->conn,$query);  
    // $list =;
    return $sql;
  }
  public function list_single_student($id){
    $this->id = $id;
    $query = "SELECT * FROM tbl_students WHERE id=".$this->id;
    $ssql = mysqli_query($this->conn,$query); 
    $sssql = $ssql->fetch_assoc(); 
    // $list =;
    // $obj = $this->conn->prepare($query);
    // $obj->bind_param('i',$this->id);
    // $obj->execute();
    // $data = $obj->get_result();

    return $sssql;
  }

  public function update_data(){
    $this->name = htmlspecialchars(strip_tags($this->name));
    $this->email = htmlspecialchars(strip_tags($this->email));
    $this->mobile = htmlspecialchars(strip_tags($this->mobile));
    $this->id = htmlspecialchars(strip_tags($this->id));
    $query = "UPDATE tbl_students SET name='$this->name',email='$this->email',mobile='$this->mobile' WHERE id=$this->id";
    

    $obj = mysqli_query($this->conn,$query);
   
    // if($obj->execute()){
    //   return true;
    // }else{
    //   return false;
   return $obj;  
  }

  public function delete_data(){
    
    $this->id = htmlspecialchars(strip_tags($this->id));
    $query = "DELETE from tbl_students  WHERE id=$this->id";
    

    $obj = mysqli_query($this->conn,$query);
   
    // if($obj->execute()){
    //   return true;
    // }else{
    //   return false;
   return $obj;  
  }

}










?>