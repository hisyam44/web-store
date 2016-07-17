<?php
	//$db = new mysqli('localhost','root','','ecommerce');
	class Database extends mysqli{
		private $host;
		private $username;
		private $password;
		private $database;

		public function __construct(){
			$this->host = "localhost";
			$this->username = "root";
			$this->password = "";
			$this->database = "ecommerce";
			parent::__construct($this->host,$this->username,$this->password,$this->database);
		}

		public function select($rows,$table,$orderby = null,$limit = null,$where = null){
			$q = "select ".$rows." from ".$table;
			if($where != null){
				$q .= " where ".$where;
			}
			if($orderby != null){
				$q .= " order by ".$orderby;
			}
			if($limit != null){
				$q .= " limit ".$limit;
			}
			//echo $q;
			$result = parent::query($q);
			$final_result = [];
			while($array = $result->fetch_assoc()) {
				$final_result[] = $array;
			}	
			return $final_result;
		}

		public function insert($data,$table){
			$rows = "";
			$values = "";
			foreach ($data as $key => $value) {
				$rows .= ",".$key;
				$values .= ",'".$value."'";
			}
			$rows = "(".substr($rows,1).")";
			$values = " values(".substr($values,1).")";
			$q = "insert into ".$table.$rows.$values;
			$result = parent::query($q);
			echo $q;
		}
	}
?>