<?php
namespace App\Controllers;

use \Core\View;
use App\Models\Post_Model;

class Blog{

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
	public function view ( $id ) {
		$viewmodel = new Post_Model();
		$data['postid'] = $viewmodel->getPostById($id );
		$data['pagetitle'] = $data['postid']['title'] ;

		View::renderTemplate($data, "../App/Views/blog/view.php") ;
	}

}