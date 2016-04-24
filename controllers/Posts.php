<?php

class Posts extends Controller{

/*====================================================
	INDEX
====================================================*/
	protected function index() {
		$viewmodel = new Post_Model();

		// we can pass as many arrays as we want based on their key:
		$data['posts'] = $viewmodel->Index() ;
		// $data['posts'] = $viewmodel->Index2() ;
	    $this->returnView($data, true);
	}


/*====================================================
	ADD
====================================================*/
	protected function add() {
		// redirect to  /posts if its not logged in
		if(!isset($_SESSION['is_logged_in'])){
			header('Location: ' . ROOT_URL . 'posts');
		}

		$viewmodel = new Post_Model();
		$this->returnView($viewmodel->add(), true);
	}
}