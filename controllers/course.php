<?php
class course extends controller{

    function __construct() {
        parent::__construct();
        
    }
    public function trading($id){
		$this->view->course = $this->model->getCourse($id);
    $this->view->lessons = $this->model->getLessons($id);
    $this->view->render('courses/student-course');
    }
    
}
