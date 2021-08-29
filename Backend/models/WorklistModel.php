<?php 
class WorklistModel
{
	private $conn;

	/**
	 * Kết nối db
	 */ 
	public function __construct($db) 
	{
        $this->conn = $db;
	}

	/**
	 * Lấy tất cả các bản ghi (Read)
	 */		  
	public function modelGetworklist()
	{
		$query = $this->conn->query("SELECT * FROM worklist");
		return $query->fetchAll();
	}

	/**
	 * Lấy tất cả các bản ghi theo project_id
	 */		  
	public function modelGetworklist_Projectid($project_id)
	{
		$query = $this->conn->query("SELECT worklist.*, projects.name as project_name FROM worklist INNER JOIN projects ON worklist.project_id = projects.id WHERE project_id = $project_id ORDER BY status ASC, finish_time");
		return $query->fetchAll();
	}

	/**
	 * Lấy tất cả các bản ghi theo ngày hôm nay (Read today)
	 * Cùng với tên của project trong projects
	 */		  
	public function modelGetworklist_Day()
	{
		$query = $this->conn->query("SELECT worklist.*, projects.name as project_name FROM worklist INNER JOIN projects ON worklist.project_id = projects.id
WHERE YEAR(worklist.finish_time) = YEAR(CURRENT_DATE) AND MONTH(worklist.finish_time) = MONTH(CURRENT_DATE) AND DAY(worklist.finish_time) = DAY(CURRENT_DATE) 
ORDER BY worklist.status, worklist.finish_time");
		return $query->fetchAll();
	}

	/**
	 * Lấy 1 bản ghi theo id (Get)
	 */		  
	public function modelGetworklist_Id($id)
	{
		$query = $this->conn->query("SELECT * FROM worklist where id = $id");
		return $query->fetch();
	}

	/**
	 * Insert 1 task (Create)
	 */		  
	public function modelAddtask($name, $priority, $finish_time, $project_id)
	{
		$query = $this->conn->prepare("insert into worklist set name=:var_name, priority=:var_priority, finish_time=:var_finish_time, project_id=:var_project_id, status=0");
        $query->execute(["var_name"=>$name,"var_priority"=>$priority,"var_finish_time"=>$finish_time, "var_project_id"=>$project_id]);
	}

	/**
     * Update status
     */
    public function modelUpdatestatus($id)
    {
        $query = $this->conn->query("update worklist set status = !status where id = $id"); 	
    }

    /**
	 * Update 1 task
	 */
    public function modelUpdatetask($id, $name, $priority, $finish_time, $project_id) 
    {
        $query = $this->conn->prepare("update worklist set name=:var_name, priority=:var_priority, finish_time=:var_finish_time , project_id=:var_project_id where id=:var_id");
        $query->execute(["var_id"=>$id,"var_name"=>$name,"var_priority"=>$priority, "var_finish_time"=>$finish_time, "var_project_id"=>$project_id]);	
    }

    /**
     * Delete 1 task
     */
    public function modelDeletetask($id) 
    {
        $query = $this->conn->query("delete from worklist where id = $id"); 	
    }

    /**
     * Delete tasks theo project_id
     */
    public function modelDeletetask_Projectid($project_id) 
    {
        $query = $this->conn->query("delete from worklist where project_id = $project_id"); 	
    }
    

 //    /**
 //     * Tỉnh tổng số bản ghi theo ngày hôm nay
 //     */
	// public function modelTotalworklist() {
 //  		$conn = Connection::getInstance();
 //  		$query = $conn->query("select id from worklist WHERE YEAR(finish_time) = YEAR(CURRENT_DATE) AND MONTH(finish_time) = MONTH(CURRENT_DATE) AND DAY(finish_time) = DAY(CURRENT_DATE)");
 //  		return $query->rowCount();
	//     }
}
 ?>