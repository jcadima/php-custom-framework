<?php

namespace App\Controllers;

use \Core\View;

class Home{	

	public function index() {

<<<<<<< HEAD
=======
	public function index() {

>>>>>>> 4b36f592e880f1e61cd21d360a6dbac592be844f
		$data['pagetitle'] = 'Home page title';
		$data['text'] = 'Some text';
		
		View::renderTemplate($data, "../App/Views/home/index.php") ;
	}

} 