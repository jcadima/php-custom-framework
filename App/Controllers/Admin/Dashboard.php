<?php

namespace App\Controllers\Admin;

use \Core\View;
use App\Models\Post_Model;

class Dashboard {

	public function main() {
		$data['pagetitle'] = 'Main Dashboard';
		$viewmodel = new Post_Model();
		$data['posts'] = $viewmodel->get_posts() ;	// get list of posts

		//$data['users'] = $viewmodel->all();

		View::renderTemplate($data, "../App/Views/admin/main.php") ;

	}
 
}