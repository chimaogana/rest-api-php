<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow.Methods:DELETE");

include_once("../config/database.php");
include_once("../classes/student.php");

$db = new Database();

$connection = $db->connect();


$student = new Student($connection);


if($_SERVER['REQUEST_METHOD']==="DELETE"){
  $student_id= isset($_GET['id']) ? intval($_GET['id']) : "";

  if(!empty($student_id)){
    $student->id =$student_id;
    $student_data=$student->delete_data($student->id);
    // var_dump ($student_data);
    if(!empty($student_data)){
      http_response_code(200);
      echo json_encode(array(
        "status"=>1,
        "message"=>"student deleted successfully"
      ));
    }else{
      http_response_code(404);
      echo json_encode(array(
        "status"=>0,
        "message"=>"Student not found"
      ));
    }

  }else{
    http_response_code(503);
    echo json_encode(array(
        "status"=>0,
        "message"=>"Access Deniel"
      ));
    
  }
  // $data = $student->list_single_student();
  // var_dump($data);

    
  

}else{
  http_response_code(503);
  echo json_encode(array(
    "status" => 0,
    "message"=>"Access Denied"
  ));
}