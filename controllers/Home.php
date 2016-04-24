<?php

class Home extends Controller{

	protected function index() {
		$viewmodel = new Home_Model();
		// true = full view which calls main.php , and this main.php includes index.php
		// false = only index.php will be rendered
		$this->returnView($viewmodel->Index(), true);
	}

} 