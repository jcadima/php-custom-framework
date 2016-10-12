<?php

namespace Core;

class Messages{

/*====================================================
	SET MESSAGE
====================================================*/
	public static function setMsg($text, $type){
		$_SESSION['msgtype'] = $type;
		if( $type == 'error'){
			$_SESSION['errorMsg'] = $text; 
		} 

		else {
			$_SESSION['successMsg'] = $text;  
		}
	}

/*====================================================
	DISPLAY MESSAGE
====================================================*/
	public static function display(){
		if( isset($_SESSION['errorMsg']) ) {
			echo '<div class="alert alert-danger">' . $_SESSION['errorMsg'].'</div>';
			unset($_SESSION['errorMsg']);
		}

		if( isset($_SESSION['successMsg']) ) {
			echo '<div class="alert alert-' . $_SESSION['msgtype'] . '    ">' . $_SESSION['successMsg'].'</div>';
			unset($_SESSION['successMsg']);
		}
	}

/*====================================================
	IS USER LOGGED IN
====================================================*/
	public static function isLoggedIn()  {
	if( !isset($_SESSION['is_logged_in']) ) 
		header('Location: '.ROOT_URL.'authenticate/login');
	}

}