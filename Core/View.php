<?php
namespace Core;

class View {

	
	public static function renderTemplate($viewData, $viewPath  ,$fullview) {
		// $viewData contains the data fetched from the models
		
		$view = $viewPath;
		
		if($fullview) {
			// echo $view;
			// $view is made available to the main template  'view/main.php' :
			/*
			[ views/main.php  ]
				require($view)   <-- this is the specific template coming from $viewPath
			[ views/main.php  ] 
			*/
			
			require('../App/Views/main.php');
		} 
		else {
			require($view);
		}
	}	
	
	
}


