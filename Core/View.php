<?php
namespace Core;

class View {
	
	public static function renderTemplate($viewData, $viewPath ) {
		// $viewData contains the data fetched from the models/variables
		extract($viewData) ;
			
			require('../App/Views/main.php');
	}	
}


