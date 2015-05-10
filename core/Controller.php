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
			$classController = get_class($this);
			throw new Exception("Action '$action' not defined in class $classController");
		}
	}


	// Abstract method corresponding to default action
	// Forces derived classes to implement this action by default
	public abstract function index();


	// Displays the view $viewName with the data $dataView
	protected function render($viewName, $dataView = array())
	{
		$view = new View($viewName);
		$view->generateView($dataView);
	}


    // Returns the view $viewName with the data $dataView
    protected function renderAjax($viewName, $dataView = array())
    {
        $view = new View($viewName);
        return $view->generateAjaxView($dataView);
    }

}

