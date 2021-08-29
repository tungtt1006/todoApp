<?php 
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include "../../application/Connection.php"; 
include "../../models/WorklistModel.php";

//Tạo kết nối db
$db = new Connection();
$connect = $db->getInstance();

//Kết nối với model
$question = new WorklistModel($connect);


$id = isset($_GET["id"]) ? $_GET["id"] : '';
$question->modelDeletetask($id);

