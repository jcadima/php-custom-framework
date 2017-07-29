<?php
namespace Core;

class View {
<<<<<<< HEAD

	public static function renderTemplate($viewData, $viewPath ) {
		extract($viewData) ;		
		require('../App/Views/main.php');
	}	
	
=======
	
	public static function renderTemplate($viewData, $viewPath ) {
		// $viewData contains the data fetched from the models/variables
		extract($viewData) ;
			
			require('../App/Views/main.php');
	}	
>>>>>>> 4b36f592e880f1e61cd21d360a6dbac592be844f
}


