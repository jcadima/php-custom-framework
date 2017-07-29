<?php

namespace App\Controllers\Admin;

use \Core\View;
use \Core\Messages;
use App\Models\User_Model;

class Authenticate {

/*====================================================
	LOGIN
====================================================*/
	public function login() {
		$viewmodel = new User_Model();
		
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		$password = md5($post['password'] );

		$data['pagetitle'] = "Login Page Title" ;

		if($post['submit']) {
			$email = $post['email'] ;
			$password = $post['password'] ;
			// Compare Login
			$user_id = $viewmodel->login($email, $password) ;
			
			if($user_id) {
				$_SESSION['is_logged_in'] = true;
				$_SESSION['user_data'] = array(
					"id"	=> $user_id['id'],
					"name"	=> $user_id['name'],
					"email"	=> $user_id['email']
				);
				Messages::setMsg('You can now add posts', 'success');
				// Redirect to Posts
				header('Location: '.ROOT_URL . 'dashboard/main');
			} 
			else {
				Messages::setMsg('Incorrect Login', 'error');
				// Redirect to Login Page
				header('Location: '.ROOT_URL.'authenticate/login');
			}
		}
		else {
			// login index ;
			View::renderTemplate($data, "../App/Views/admin/login.php") ;
		}

	}

/*====================================================
	LOGOUT
====================================================*/
	public function logout() {
		unset($_SESSION['is_logged_in']);
		unset($_SESSION['user_data']);
		session_destroy();
		Messages::setMsg('You successfully logged out', 'success');
		// Redirect
		header('Location: '.ROOT_URL . 'authenticate/login');
	}

/*====================================================
	REGISTER
====================================================*/
	public function register() {
		$viewmodel = new User_Model();
		$data['loginIndex'] =  $viewmodel->register() ;
		$data['pagetitle'] = "Register Page Title" ;
		View::renderTemplate($data, "../App/Views/admin/register.php") ;
	}

 
}