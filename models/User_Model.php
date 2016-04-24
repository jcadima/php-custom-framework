<?php

class User_Model extends Model{



	public function Index() {
		return;
	}		


/*====================================================
		REGISTER
====================================================*/	
	public function register() {
		// Sanitize POST
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		$password = md5($post['password']);

		if( $post['submit'] ) {
			if($post['name'] == '' || $post['email'] == '' || $post['password'] == '') {
				Messages::setMsg('Please Fill In All Fields', 'error');
				return;
			}

			// Insert into MySQL
			$this->query('INSERT INTO users (name, email, password) 
						  VALUES(:name, :email, :password)');
			$this->bind(':name', $post['name']);
			$this->bind(':email', $post['email']);
			$this->bind(':password', $password);
			$this->execute();
			// Verify
			if( $this->lastInsertId() ) {
				// Redirect
				header('Location: '.ROOT_URL.'users/login');
			}
		}
		return;
	}


/*====================================================
	LOGIN
====================================================*/
	public function login($email , $password) {
		// Sanitize POST

			$password = md5($password );

			// Compare Login
			$this->query('SELECT * FROM users 
				WHERE email = :email 
				AND password = :password');
			$this->bind(':email', $email);
			$this->bind(':password', $password);
			
			$row = $this->single();

			if($row) {
				return $row;
			} 
			else {
				return false;
			}

	}


}