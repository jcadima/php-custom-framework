<?php

namespace App\Controllers\Admin;

use \Core\View;
use App\Models\User_Model;

<<<<<<< HEAD
class Users {
=======
class Users extends \Core\Controller{

>>>>>>> 4b36f592e880f1e61cd21d360a6dbac592be844f
	public function index() {

		$data['pagetitle'] = 'Dashboard - Users';
		$viewmodel = new User_Model();
		$data['users'] = $viewmodel->get_users() ;	// get list of posts

		View::renderTemplate($data, "../App/Views/admin/users/index.php") ;
	}
 
}