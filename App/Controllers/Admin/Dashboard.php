<?php

namespace App\Controllers\Admin;

use \Core\View;
use App\Models\Post_Model;

class Dashboard {

<<<<<<< HEAD
	public function main() {
		$data['pagetitle'] = 'Main Dashboard';
		$viewmodel = new Post_Model();
		$data['posts'] = $viewmodel->get_posts() ;	// get list of posts

		//$data['users'] = $viewmodel->all();

=======
class Dashboard extends \Core\Controller{

	public function main() {
		$data['pagetitle'] = 'Main Dashboard';
		$viewmodel = new Post_Model();
		$data['posts'] = $viewmodel->Index() ;	// get list of posts
		//$data['text'] = 'Some text';
>>>>>>> 4b36f592e880f1e61cd21d360a6dbac592be844f
		View::renderTemplate($data, "../App/Views/admin/main.php") ;

	}
 
}