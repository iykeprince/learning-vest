<?php
class course_model extends model{

	public function __construct(){
		parent::__construct(); 
	}

	public function getCourse($id){
		$query = "SELECT * FROM courses INNER JOIN teachers ON courses.teacher_id=teachers.id WHERE courses.course_id='$id'";
		$result = $this->db->getItem($query);
		return $result;
	}

    public function getLessons($id){
		$query = "SELECT * FROM videos 
                INNER JOIN courses ON courses.id=videos.course_id 
                INNER JOIN teachers ON teachers.id=courses.teacher_id
                WHERE courses.course_id='$id' ";
		$result = $this->db->getAssoc($query);
		return $result;
	}
}