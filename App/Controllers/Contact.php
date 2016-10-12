<?php

namespace App\Controllers;

use \Core\View;

class Contact extends \Core\Controller{

	protected function index() {
		// $viewmodel = new Home_Model();
		// true = full view which calls main.php , and this main.php includes index.php
		// false = only index.php will be rendered
		$data['pagetitle'] = 'Contact page title';
		$data['text'] = 'Some text';
		
		View::renderTemplate($data, "../App/Views/contact/index.php", true) ;
	}

} 