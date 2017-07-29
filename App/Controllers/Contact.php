<?php

namespace App\Controllers;

use \Core\View;

class Contact{	

	public function index() {
<<<<<<< HEAD
=======

>>>>>>> 4b36f592e880f1e61cd21d360a6dbac592be844f
		$data['pagetitle'] = 'Contact page title';
		$data['text'] = 'Some text';
		
		View::renderTemplate($data, "../App/Views/contact/index.php") ;
	}

} 