<?php

require_once 'core/Request.php';
require_once 'core/View.php';
require_once 'core/Controller.php';

class Router
{

	// Routes an incoming request : execute corresponding action
	public function routeRequest()
	{
		try {
			//Fusion of the GET and POST parameters of the request
			$request = new Request(array_merge($_GET, $_POST));
			$controller = $this->createController($request);
			$action = $this->createAction($request);
			$controller->executeAction($action);
		}
		catch (Exception $e) {
			$this->manageError($e, $request);
		}
	}


	// Creates appropriate controller depending on the received request
	private function createController(Request $request)
	{
		$controller = 'Index';  // default
		if ($request->isSetParameter('ctrl')) {
			$controller = $request->getParameter('ctrl');
			$controller = ucfirst($controller);
		}
		// Controller's file name
		$classController = $controller . 'Controller';
		$fileController = 'controllers/' . $classController . '.php';

		if (file_exists($fileController)) {
			// Implementation of the request's controller
			require($fileController);
			$controller = new $classController();
			$controller->setRequest($request);
			return $controller;
		}
		else
			throw new Exception("File '$fileController' not found");
	}


	// Chooses the action to be executed depending on the received request
	private function createAction(Request $request) {
		$action = 'index';
		if ($request->isSetParameter('action'))
			$action = $request->getParameter('action');
		return $action;
	}


	// Manages an error due to an exception
	private function manageError(Exception $exception, Request $request) {
        require 'controllers/Error404Controller.php';
        $error404Controller = new Error404Controller();
        $error404Controller->setRequest($request);
        if(Configuration::get('displayExceptions')){
            $error404Controller->index($exception);
        }else{
            $error404Controller->index();
        }
	}

}

