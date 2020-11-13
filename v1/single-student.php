<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow.Methods:POST");
header("Content-type: application/json; charset=UTF-8");

include_once("../config/database.php");
include_once("../classes/student.php");

$db = new Database();

$connection = $db->connect();


$student = new Student($connection);


if($_SERVER['REQUEST_METHOD']==="POST"){
  $param = json_decode(file_get_contents("php://input"));
  if(!empty($param->id)){
    $student->id =$param->id;
    $student_data=$student->list_single_student($student->id);
    // var_dump ($student_data);
    if(!empty($student_data)){
      http_response_code(200);
      echo json_encode(array(
        "status"=>1,
        "data"=>$student_data
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