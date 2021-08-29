<?php 
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');

date_default_timezone_set('Asia/Ho_Chi_Minh');

include "../models/WorklistModel.php";

class WorklistController
{
    use WorklistModel;
	  
    /**
     * Read
     */ 
	public function read()
    {
        $tasklist = $this->modelGetworklist();
	    echo json_encode($tasklist);
	}

    /**
     * Gọi ra updatetaskview
     * Lấy ra 1 bản ghi trong worklist
     * Lấy ra tất cả các bản ghi trong projects
     */ 
    public function show()
    {
        $id = isset($_GET["id"]) ? $_GET["id"] : 0;
        $task = $this->modelGetaTask($id);
        $project = $this->modelGetproject();
        $this->loadView("updatetaskview.php", ["task" => $task, "project" => $project]);
    }

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
    //  * Gọi ra updatetaskview
    //  * Lấy ra 1 bản ghi trong worklist
    //  * Lấy ra tất cả các bản ghi trong projects
    //  */ 
    // public function update()
    // {
    //     $id = isset($_GET["id"]) ? $_GET["id"] : 0;
    //     $task = $this->modelGetaTask($id);
    //     $project = $this->modelGetproject();
    //     $this->loadView("updatetaskview.php", ["task" => $task, "project" => $project]);
    // }

    // /**
    //  * Nhận thông tin từ form
    //  * insert vào bảng worklist
    //  */ 
    // public function addTask()
    // {
    //     $task = $_POST["task"];

    //     foreach($task["name"] as $key => $n) 
    //     {
    //         $name = $n;
    //         $priority = $task["priority"][$key];
    //         $finish_time = date("Y-m-d H:i:s", strtotime($task["finish_time"][$key]));
    //         $project_id = isset($task["project"][$key]) ? $task["project"][$key] : ''; 
    //         $this->modelAddtask($name, $priority, $finish_time, $project_id);
    //     }
    //     // header("location:index.php");

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

    // /**
    //  * thực hiện update status
    //  */ 
    // public function updateStatus()
    // {
    //     $worklist = $this->modelGetworklist();
    //     $k = array();
        
    //     foreach ($worklist as $rows) 
    //     {
    //         $this->modelUpdatestatus1($rows->id);
    //     }
    //     if (isset($_POST['status'])) {
    //         foreach ($_POST['status'] as $value) 
    //         {
    //             $k[] = $value;
    //             $this->modelUpdatestatus($value);
    //         } 
    //     } else {
    //         header("location:index.php"); 
    //     }

    //     header("location:index.php");
    // }
}
