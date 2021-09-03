<?php
class index extends controller{

    function __construct() {
        parent::__construct();
        
    }
    public function index(){
		$this->view->courses = $this->model->getCourses();
       $this->view->render('home/index');
    }
    
}

