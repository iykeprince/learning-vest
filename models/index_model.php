<?php
class index_model extends model{

	public function __construct(){
		parent::__construct(); 
	}

	public function getCourses(){
		$query = "SELECT * FROM courses INNER JOIN teachers ON courses.teacher_id=teachers.id";
		$result = $this->db->getAssoc($query);
		return $result;
	}
}