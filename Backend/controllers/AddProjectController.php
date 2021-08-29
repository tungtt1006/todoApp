<?php 
include "models/AddProjectModel.php";

class AddProjectController extends Controller
{
    use AddProjectModel;
	  
    /**
     * Gọi ra addprojectview
     */ 
	public function index()
    {
	    $this->loadView("addprojectview.php");
	}

    /**
     * Nhận thông tin từ form
     * insert vào bảng worklist
     * insert vào bảng project
     */ 
    public function addTask()
    {
        $project_name = isset($_POST["project_name"]) ? $_POST["project_name"] : "";
        $task = $_POST["task"];
        
        $project_id = $this->modelAddproject($project_name);

        foreach($task["name"] as $key => $n) 
        {
            $name = $n;
            $priority = $task["priority"][$key];
            $finish_time = date("Y-m-d H:i:s", strtotime($task["finish_time"][$key]));
            $this->modelAddtask($name, $priority, $finish_time, $project_id);
        }
        header("location:index.php?controller=AddProject");
    }
}
