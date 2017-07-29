<?php
namespace Core;
abstract class Controller{
	protected $urlvalues;
	protected $action;
	protected $view;
	public function __construct($action, $urlvalues){
		$this->action = $action;  
		$this->urlvalues = $urlvalues;
	}
/*====================================================
	EXECUTE ACTION
====================================================*/
	public function executeAction() {

		return $this->{$this->action}();
	}
}