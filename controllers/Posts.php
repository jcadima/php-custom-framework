<?php

class Posts extends Controller{




/*====================================================
	INDEX
====================================================*/
	protected function index() {
		$viewmodel = new Post_Model();

		// we can pass as many arrays as we want based on a key
		// this  data array with $data['posts'] thats being passed to the view
		// the variable in the View is called $viewData
		// so $viewData['posts'] will be the array that contains the data
		// and that will need to be looped in a foreach
		$data['posts'] = $viewmodel->Index() ;	
	    $this->view->output($data, true) ;
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

		$data['add'] = $viewmodel->add() ;

		$this->view->output($data, true ) ;
	}


/*====================================================
	SHOW POST BY ID
====================================================*/
	protected function view () {
		$data = [] ;
		$postid = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
		$viewmodel = new Post_Model();
		$data = $viewmodel->getPostById($postid['id'] );

		$this->view->output($data, true ) ;
	}

}