<?php 
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');

include "models/ProjectModel.php";
include "models/WorklistModel.php";

class ProjectController extends Controller
{
    use ProjectModel;
    use WorklistModel;
	  
    /**
     * Gọi ra projectview
     * Lấy các bản ghi trong bảng worklist, 1 bản ghi trong projects
     */ 
	public function index()
    {
        $project_id = isset($_GET["id"]) ? $_GET["id"] : 0;
        $worklist = $this->modelGetworklistProject_Id($project_id);
        $project = $this->modelGetaProject($project_id);
	    $this->loadView("projectview.php", ["worklist" => $worklist, "project" => $project]);
	}

    // /**
    //  * Gọi ra updatetaskview
    //  * Lấy ra 1 bản ghi trong worklist
    //  * Lấy tất cả bản ghi trong project
    //  */ 
    // public function update()
    // {
    //     $id = isset($_GET["id"]) ? $_GET["id"] : 0;
    //     $task = $this->modelGetaTask($id);
    //     $project = $this->modelGetproject();
    //     $this->loadView("updatetaskview.php", ["task" => $task, "project" => $project]);
    // }

    // /**
    //  * thực hiện update 1 task
    //  */ 
    // public function updatePost()
    // {
    //     $id = isset($_GET["id"]) ? $_GET["id"] : 0;
    //     $name = isset($_POST["name"]) ? $_POST["name"] : '';
    //     $priority = isset($_POST["priority"]) ? $_POST["priority"] : 0;
    //     $finish_time = isset($_POST["finish_time"]) ? $_POST["finish_time"] : '';
    //     $project_id = isset($_POST["project_id"]) ? $_POST["project_id"] : '';
    //     $status = isset($_POST["status"]) ? $_POST["status"] : 0;

    //     $task = $this->modelUpdatetask($id, $name, $priority, $finish_time, $project_id, $status);
    //     header("location:index.php");
    // }

    // /**
    //  * thực hiện delete 1 task
    //  */ 
    // public function delete()
    // {
    //     $id = isset($_GET["id"]) ? $_GET["id"] : 0;

    //     $task = $this->modelDeletetask($id);
    //     header("location:index.php");
    // }
}
