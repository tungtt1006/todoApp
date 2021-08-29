<?php 
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');

include "../../application/Connection.php"; 
include "../../models/WorklistModel.php";

//Tạo kết nối db
$db = new Connection();
$connect = $db->getInstance();

 $id = isset($_GET["id"]) ? $_GET["id"] : '';

//Kết nối với model
$question = new WorklistModel($connect);
$question->modelUpdatestatus($id);


