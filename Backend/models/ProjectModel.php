<?php 
	class ProjectModel
	{
		/**
		 * Kết nối db
		 */ 
		public function __construct($db) 
		{
	        $this->conn = $db;
		}

		/**
		 * Lấy 1 bản ghi trong project
		 */		  
		public function modelGetaProject($id)
		{
			$query = $this->conn->query("select * from projects where id = $id");
			return $query->fetch();
		}

		/**
		 * Lấy tất cả bản ghi trong project
		 */		  
		public function modelGetproject()
		{
			$query = $this->conn->query("select * from projects");
			return $query->fetchAll();
		}

		/**
		 * Hàm update 1 project
		 */
        public function modelUpdateproject($id, $name) 
        {
            $query = $this->conn->prepare("update projects set name=:var_name where id=:var_id");
	        $query->execute(["var_id"=>$id,"var_name"=>$name]);	
        }

        /**
         * Hàm delete 1 project
         */
        public function modelDeleteproject($id) 
        {
            $query = $this->conn->query("delete from projects where id = $id"); 	
        }

        /**
		 * Insert 1 project
		 */		  
		public function modelAddproject($name)
		{
			$query = $this->conn->prepare("insert into projects set name=:var_name");
	        $query->execute(["var_name"=>$name]);
	        return $this->conn->lastInsertId();
		}

		/**
		 * Lấy id bản ghi cuối cùng
		 */
		public function getLastid() 
		{
			$query = $this->conn->query("select id from projects order by id desc limit 0,1");
			return $query->fetch();
		}
	}
