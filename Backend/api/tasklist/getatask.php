<?php 
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');
date_default_timezone_set('Asia/Ho_Chi_Minh');

include "../../application/Connection.php"; 
include "../../models/WorklistModel.php";

//Tạo kết nối db
$db = new Connection();
$connect = $db->getInstance();

 $id = isset($_GET["id"]) ? $_GET["id"] : '';

//Kết nối với model
$question = new WorklistModel($connect);
$show = $question->modelGetworklist_Id($id);

$show->finish_time = date("Y-m-d\TH:i:s", strtotime($show->finish_time));

print_r(json_encode($show));
