<?php 
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');

include "../../application/Connection.php"; 
include "../../models/ProjectModel.php";

//Tạo kết nối db
$db = new Connection();
$connect = $db->getInstance();

//Kết nối với model
$question = new ProjectModel($connect);
$lastId = $question->getLastid() ;

print_r(json_encode($lastId));