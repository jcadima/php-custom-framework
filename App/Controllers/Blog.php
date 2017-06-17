<?php
namespace App\Controllers;

use \Core\View;
use App\Models\Post_Model;

class Blog extends \Core\Controller{

/*====================================================
	INDEX
====================================================*/
	public function index() {
		$viewmodel = new Post_Model();

		$data['pagetitle'] = 'Posts page title';
		$data['text'] = 'Some text For Posts Index';		
		$data['posts'] = $viewmodel->Index() ;	
	    
	    View::renderTemplate($data, "../App/Views/blog/index.php") ;
	}
   

/*====================================================
	ADD
====================================================*/
	public function add() {
		// redirect to  /posts if its not logged in
		if(!isset($_SESSION['is_logged_in'])){
			header('Location: ' . ROOT_URL . 'blog');
		}

		$viewmodel = new Post_Model();
		$data['pagetitle'] = 'Add a New Post';
		$data['add'] = $viewmodel->add() ;

		View::renderTemplate($data, "../App/Views/blog/add.php") ;
	}


/*====================================================
	SHOW POST BY ID
====================================================*/
	protected function view () {
		$data = [] ;
		$postid = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
		$viewmodel = new Post_Model();
		$data['postid'] = $viewmodel->getPostById($postid['id'] );
		$data['pagetitle'] = $data['postid']['title'] ;
		View::renderTemplate($data, "../App/Views/blog/view.php") ;
	}


}