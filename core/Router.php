<?php

require_once 'core/Request.php';
require_once 'core/View.php';
require_once 'core/Controller.php';
require_once 'controllers/MasterController.php';

class Router
{

	// Routes an incoming request : execute corresponding action
	public function routeRequest()
	{
		try {
			//Fusion of the GET and POST parameters of the request
            //todo: how array_merge will react if i put ctrl and action in url ?
			$request = new Request(array_merge($_GET, $_POST));
			$controller = $this->createController($request);
			$actionName = $this->createActionName($request);
            $controller->preExecution($request);
            $return = $controller->executeAction($actionName);
			if($return == null){
                $controller->render($request->getParameter('ctrl'));
            }else{
                echo $return;
            }
            $controller->postExecution($request);
		}
		catch (Exception $e) {
			$this->manageError($e, $request);
		}
	}


	// Creates appropriate controller depending on the received request
	private function createController(Request $request)
	{
		$controllerName = 'Index';  // default
		if ($request->isSetParameter('ctrl')) {
            $controllerName = ucfirst($request->getParameter('ctrl'));
		}
		// Controller's file name
		$controllerClass = $controllerName . 'Controller';
		$controllerFile = 'controllers/' . $controllerClass . '.php';

		if (file_exists($controllerFile)) {
			require($controllerFile);
			$controller = new $controllerClass();
			$controller->setRequest($request);
			return $controller;
		}
		else
			throw new Exception("File '$controllerFile' not found");
	}


	// Chooses the action to be executed depending on the received request
	private function createActionName(Request $request) {
		$actionName = 'index';
		if ($request->isSetParameter('action'))
            $actionName = $request->getParameter('action');
		return $actionName;
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

