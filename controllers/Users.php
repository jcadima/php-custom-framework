<?php

class Users extends Controller{

/*====================================================
	REGISTER
====================================================*/
	protected function register() {
		$viewmodel = new User_Model();
		$this->view->output($viewmodel->register(), true);
	}


/*====================================================
	LOGIN
====================================================*/
	protected function login() {
		$viewmodel = new User_Model();

		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		$password = md5($post['password'] );

		if($post['submit']) {
			$email = $post['email'] ;
			$password = $post['password'] ;
			// Compare Login
			$user_id = $viewmodel->login($email, $password) ;

			if($user_id) {
				$_SESSION['is_logged_in'] = true;
				$_SESSION['user_data'] = array(
					"id"	=> $row['id'],
					"name"	=> $row['name'],
					"email"	=> $row['email']
				);
				Messages::setMsg('You can now add posts', 'success');
				header('Location: '.ROOT_URL . 'posts');
			} 
			else {
				Messages::setMsg('Incorrect Login', 'error');
				header('Location: '.ROOT_URL.'users/login');
			}
		}
		else {
			// login index ;
			$this->view->output($viewmodel->index(), true ) ;
		}



	}


/*====================================================
	LOGOUT
====================================================*/
	protected function logout() {
		unset($_SESSION['is_logged_in']);
		unset($_SESSION['user_data']);
		session_destroy();
		Messages::setMsg('You successfully logged out', 'success');
		// Redirect
		header('Location: '.ROOT_URL . 'users/login');
	}
}