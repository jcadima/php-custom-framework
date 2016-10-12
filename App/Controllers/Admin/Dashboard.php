<?php

namespace App\Controllers\Admin;

use \Core\View;
use App\Models\Post_Model;


class Dashboard extends \Core\Controller{

/*
Since we are extending the base Controller, we have access to:
public function __construct($action, $urlvalues)  
public function executeAction()
*/

	protected function main() {
		$data['pagetitle'] = 'Main Dashboard';
		$viewmodel = new Post_Model();
		$data['posts'] = $viewmodel->Index() ;	// get list of posts
		//$data['text'] = 'Some text';
		View::renderTemplate($data, "../App/Views/admin/main.php", true) ;

	}
 
}