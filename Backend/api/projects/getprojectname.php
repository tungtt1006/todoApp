<?php 
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');

include "../../application/Connection.php"; 
include "../../models/ProjectModel.php";

//Tạo kết nối db
$db = new Connection();
$connect = $db->getInstance();

 $id = isset($_GET["project_id"]) ? $_GET["project_id"] : 0;

//Kết nối với model
$question = new ProjectModel($connect);
$project = $question->modelGetaProject($id);

print_r(json_encode($project));