<?php
namespace Core;

class View {

	public static function renderTemplate($viewData, $viewPath ) {
		extract($viewData) ;		
		require('../App/Views/main.php');
	}	
	
}


