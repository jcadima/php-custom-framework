<?php

namespace App\Controllers\Admin;

use \Core\View;
use App\Models\User_Model;

class Users {
	public function index() {

		$data['pagetitle'] = 'Dashboard - Users';
		$viewmodel = new User_Model();
		$data['users'] = $viewmodel->get_users() ;	// get list of posts

		View::renderTemplate($data, "../App/Views/admin/users/index.php") ;
	}
 
}