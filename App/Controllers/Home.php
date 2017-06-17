<?php

namespace App\Controllers;

use \Core\View;

class Home extends \Core\Controller{

	public function index() {

		$data['pagetitle'] = 'Home page title';
		$data['text'] = 'Some text';
		
		View::renderTemplate($data, "../App/Views/home/index.php") ;
	}

} 