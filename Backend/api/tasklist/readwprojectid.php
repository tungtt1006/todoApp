<?php 
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');

include "../../application/Connection.php"; 
include "../../models/WorklistModel.php";

//Tạo kết nối db
$db = new Connection();
$connect = $db->getInstance();

$project_id = isset($_GET["project_id"]) ? $_GET["project_id"] : 0;

//Kết nối với model
$question = new WorklistModel($connect);
$readwprojectid = $question->modelGetworklist_Projectid($project_id);

echo json_encode($readwprojectid);
