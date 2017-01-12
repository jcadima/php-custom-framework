<?php
namespace Core;

class View {

	
	public static function renderTemplate($viewData, $viewPath  ,$fullview) {
		// $viewData contains the data fetched from the models/variables
		
		extract($viewData) ;
		
		if($fullview) {
			/*
			[ views/main.php  ]
				require($viewPath)   <-- this is the specific template coming from $viewPath
			[ views/main.php  ] 
			*/
			
			require('../App/Views/main.php');
		} 
		else {
			require($viewPath);
		}
	}	
	
	
}


