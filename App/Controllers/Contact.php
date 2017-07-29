<?php

namespace App\Controllers;

use \Core\View;

class Contact{	

	public function index() {
		$data['pagetitle'] = 'Contact page title';
		$data['text'] = 'Some text';
		
		View::renderTemplate($data, "../App/Views/contact/index.php") ;
	}

} 