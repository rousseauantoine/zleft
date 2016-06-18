<?php

require_once 'Request.php';
require_once 'View.php';

// Class which groups common services to the controllers
abstract class Controller
{

	// Action to realize
	private $action;

	// Received request
	protected $request;


	// Defines the received request
	public function setRequest(Request $request)
	{
		$this->request = $request;
	}


	// Executes the action
	public function executeAction($action)
	{
		if (method_exists($this, $action)) {
			$this->action = $action;
			$this->{$this->action}();
		}
		else {
			throw new Exception("Action '$action' not defined in class ". get_class($this));
		}
	}


	// Abstract method corresponding to default action
	// Forces derived classes to implement this action
	public abstract function index();


	// Displays the view $viewName with the data $dataView
	protected function render($viewName, $dataView = array(), $ajax = false)
	{
		$view = new View($viewName);
		return $view->generateView($dataView, $ajax);
	}

}

