<?php

require_once 'Request.php';
require_once 'View.php';
require_once 'Model.php';

// Class which groups common services to the controllers
abstract class Controller
{

	// Action to realize
	private $action;

	// Received request
	protected $request;


    // Abstract method corresponding to default action
    // Forces derived classes to implement this action
    public abstract function index();

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

    //check whether a user is allowed to access a resource or not
    public function isUserAllowedToAccessResource($resource){
        return Model::isUserAllowedToAccessResource($resource);
    }

    //Executed right after executeAction()
    public function postExecution($request){}

    //Executed right before executeAction()
    public function preExecution($request){
        //the session is started only once
        if(!isset($_SESSION['zleft_session'])){
            session_start();
            $_SESSION['zleft_session'] = 1;
        }
    }

    // Displays the view $viewName with the data $dataView
    protected function redirect($resource)
    {
        header("Location: " . Configuration::get('root') . $resource);
        exit;
    }

    // Displays the view $viewName with the data $dataView
    protected function render($viewName, $dataView = array(), $ajax = false)
    {
        $view = new View($viewName);
        return $view->generateView($dataView, $ajax);
    }

	// Defines the received request
	public function setRequest(Request $request)
	{
		$this->request = $request;
	}

}

