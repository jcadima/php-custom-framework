<?php

namespace App\Controllers;

use \Core\View;

class Home extends \Core\Controller{

	protected function index() {
		// $viewmodel = new Home_Model();
		// true = full view which calls main.php , and this main.php includes index.php
		// false = only index.php will be rendered
		$data['pagetitle'] = 'Home page title';
		$data['text'] = 'Some text';
		
		View::renderTemplate($data, "../App/Views/home/index.php", true) ;
	}

} 