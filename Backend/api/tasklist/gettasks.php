<?php 
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');

include "../../application/Connection.php"; 
include "../../models/WorklistModel.php";

//Tạo kết nối db
$db = new Connection();
$connect = $db->getInstance();


//Kết nối với model
$question = new WorklistModel($connect);
$show = $question->modelGetworklist();


print_r(json_encode($show));
