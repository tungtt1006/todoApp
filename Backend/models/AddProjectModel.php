<?php 
	trait AddProjectModel
	{
		/**
		 * Add các task vào worklist
		 */		  
		public function modelAddtask($name, $priority, $finish_time, $project_id)
		{
			$conn = Connection::getInstance();
			$query = $conn->prepare("insert into worklist set name=:var_name, priority=:var_priority, finish_time=:var_finish_time, project_id=:var_project_id, status=0");
	        $query->execute(["var_name"=>$name,"var_priority"=>$priority,"var_finish_time"=>$finish_time, "var_project_id"=>$project_id]);
		}
		/**
		 * Add project vào projects
		 */	
		public function modelAddproject($project_name)
		{
            $conn = Connection::getInstance();
			$query = $conn->prepare("insert into projects set name=:var_name");
	        $query->execute(["var_name"=>$project_name]);
	        return $conn->lastInsertId();
		}
	}
 ?>