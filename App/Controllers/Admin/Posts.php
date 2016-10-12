<?php

namespace App\Controllers\Admin;

use \Core\View;
use App\Models\Post_Model;


class Posts extends \Core\Controller{


	protected function index() {
		$data['pagetitle'] = 'Dashboard - Posts';
		$viewmodel = new Post_Model();
		$data['posts'] = $viewmodel->Index() ;	// get list of posts

		View::renderTemplate($data, "../App/Views/admin/posts/index.php", true) ;
		
	}

}