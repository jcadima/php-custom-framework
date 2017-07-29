<?php

namespace App\Controllers\Admin;

use \Core\View;
use App\Models\Post_Model;

<<<<<<< HEAD
class Posts{
=======
class Posts extends \Core\Controller{
>>>>>>> 4b36f592e880f1e61cd21d360a6dbac592be844f

	public function index() {
		$data['pagetitle'] = 'Dashboard - Posts';
		$viewmodel = new Post_Model();
		$data['posts'] = $viewmodel->get_posts() ;	// get list of posts

		View::renderTemplate($data, "../App/Views/admin/posts/index.php") ;
		
	}
	
	public function edit() {
		$data['pagetitle'] = 'Dashboard - Edit Posts';

		$data['postid'] = $viewmodel->getPostById($postid['id'] );
		View::renderTemplate($data, "../App/Views/admin/edit/index.php") ;
	}

}