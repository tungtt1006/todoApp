<?php 
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');
date_default_timezone_set('Asia/Ho_Chi_Minh');

include "../../application/Connection.php"; 
include "../../models/WorklistModel.php";

//Tạo kết nối db
$db = new Connection();
$connect = $db->getInstance();

//Kết nối với model
$question = new WorklistModel($connect);

$data = json_decode(file_get_contents("php://input"));

$x = date("Y-m-d H:i:s", strtotime($data->finish_time));

$question->modelAddtask($data->name, $data->priority, $x, $data->project_id);

